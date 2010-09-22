<?php
	/**
	* ElggChat - Pure Elgg-based chat/IM
	* 
	* Action to create a chat session with specified user
	* 
	* @package elggchat
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	* @version 0.4
	*/

	gatekeeper();
	
	$inviteId = (int) get_input("invite");
	
		$chat_sessions = get_entities("object", ELGGCHAT_SESSION_SUBTYPE);
		foreach($chat_sessions as $session){
			$members = get_entities_from_relationship(ELGGCHAT_MEMBER, $session->getGUID());
		
			if( ( $members[0]->guid == get_loggedin_userid() && $members[1]->guid == $inviteId ) ||
					( $members[0]->guid == $inviteId && $members[1]->guid == get_loggedin_userid() ) ) {

						$status = $session->description;
						$status[ get_loggedin_userid() ] = CHAT_ENABLE;
						$session->description = $status;
						$session->save();
						
						echo $session->getGUID();
						exit();
			}
/*			foreach($members as $member){
				if( $member->guid == $inviteId ) {
					echo $session->getGUID();
					exit();
				}
			}*/
		}
	
	if(($invite_user = get_user($inviteId)) && $inviteId != get_loggedin_userid()){
		$user = get_loggedin_user();
		
		$session = new ElggObject();
		$session->subtype = ELGGCHAT_SESSION_SUBTYPE;
		$session->access_id = ACCESS_LOGGED_IN;
		$session->description = array( $user->guid => CHAT_ENABLE, $invite_user->guid => CHAT_ENABLE );
		$session->save();
		
		$session->addRelationship($user->guid, ELGGCHAT_MEMBER);
		$session->addRelationship($invite_user->guid, ELGGCHAT_MEMBER);
		
		echo $session->guid;
	}
	
	exit();
	
?>

