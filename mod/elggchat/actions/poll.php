<?php 
	/**
	* ElggChat - Pure Elgg-based chat/IM
	* 
	* Action to get all the information to form the ElggChat Toolbar
	* 
	* @package elggchat
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	* @version 0.4
	*/

if($user = get_loggedin_user()){
	$chat_sessions_count = get_entities_from_relationship(ELGGCHAT_MEMBER, $user->getGUID(), true, "", "", "", "time_created desc", null, null, true);
	$result = array();
	
	if($chat_sessions_count > 0){
		// Generate sessions
		$chat_sessions = $user->getEntitiesFromRelationship(ELGGCHAT_MEMBER, true);
		krsort($chat_sessions);
		
		$result["sessions"] = array();
		foreach($chat_sessions as $session){
			$check_enable = $session->description;
			
			if( $check_enable[ $user->guid ] == CHAT_DISABLE ) {
				//$result["sessions"][$session->guid]["show"] = 0;
				continue 1;
			} //else {
				//$result["sessions"][$session->guid]["show"] = 1;
			//}
			
			// Dont show session if not mine and no (non system) messages
			if(!(($session->owner_guid != $user->guid) && ($session->countAnnotations(ELGGCHAT_MESSAGE) == 0))){
				$result["sessions"][$session->guid] = array();
				
				// List all the Members of the chat session
				$members = $session->getEntitiesFromRelationship(ELGGCHAT_MEMBER);
				if(is_array($members) && count($members) > 1){
					
					$result["sessions"][$session->guid]["members"] = array();
					
					$firstMember = true;
					
					foreach($members as $member){
						if($member->guid != $user->guid){
							if($firstMember){
								if(count($members) > 2){
									$result["sessions"][$session->guid]["name"] = $member->name . " [" . (count($members) - 2) . "]";
								} else {
									$result["sessions"][$session->guid]["name"] = $member->name;
								}
								$firstMember = false;
							}
							$result["sessions"][$session->guid]["members"][] = elgg_view("elggchat/user", array("chatuser" => $member,"view" => "chat"));
						}
					}
				} else {
					$result["sessions"][$session->guid]["name"] = sprintf(elgg_echo("elggchat:session:name:default"), $session->guid);
				}
				
				// List all the messages in the session
				$msg_count = $session->countAnnotations();
				$result["sessions"][$session->guid]["message_count"] = $msg_count;
				
				if($msg_count > 0){
					$annotations = $session->getAnnotations("", $msg_count);
					$result["sessions"][$session->guid]["messages"] = array();
					
					foreach($annotations as $msg){
						$result["sessions"][$session->guid]["messages"][$msg->id] = elgg_view("elggchat/message", array("message" => $msg, "message_owner" => get_user($msg->owner_guid), "offset" => $msg->id)); 
					}
				}
			}
		}
	}
	
	// Add friends information
	$friends = $user->getEntitiesFromRelationship("friend");
	if(is_array($friends) && count($friends) > 0){
		if(count($friends) == 50){
			$friends_count = $user->countEntitiesFromRelationship("friend");
			$friends = $user->getEntitiesFromRelationship("friend", false, $friends_count);
		}
		$result["friends"] = array();
		$result["friends"]["offline"] = array();
		$result["friends"]["online"] = array();
		
		$inactive = (int) get_plugin_setting("onlinestatus_inactive", "elggchat");
		$time = time();
		foreach($friends as $friend){
			if($time - $friend->last_action <= $inactive){
				$result["friends"]["online"][] = elgg_view("elggchat/user", array("chatuser" => $friend, "view" => "normal"));
			} else {
				$result["friends"]["offline"][] = elgg_view("elggchat/user", array("chatuser" => $friend, "view" => "normal"));
			}
		}
	}
	
	// Prepare to send nice JSON
	header("Content-Type: application/json; charset=UTF-8");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	
	echo json_encode($result);
}
exit();
?>