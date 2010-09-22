<?php
	/**
	* ElggChat - Pure Elgg-based chat/IM
	* 
	* Action to leave the specified session, and remove it from the system if no more members
	* 
	* @package elggchat
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	* @version 0.4
	*/

	gatekeeper();
	
	$sessionId = (int) get_input("chatsession");
	$userId = get_loggedin_userid();
	
	if(check_entity_relationship($sessionId, ELGGCHAT_MEMBER, $userId)){
		$session = get_entity($sessionId);
		$user = get_user($userId);
		
		//remove_entity_relationship($sessionId, ELGGCHAT_MEMBER, $userId);
		
		//$session->annotate(ELGGCHAT_SYSTEM_MESSAGE, sprintf(elgg_echo('elggchat:action:leave'), $user->name), ACCESS_LOGGED_IN, $userId);
		
		$status = $session->description;
		$status[ $user->guid ] = CHAT_DISABLE;
		$session->description = $status;
		$session->save();
		
		$session->annotate(ELGGCHAT_SYSTEM_MESSAGE, print_r( $session->description ), $user->name), ACCESS_LOGGED_IN, $userId);
		
		$members = $session->getEntitiesFromRelationship(ELGGCHAT_MEMBER);
		if( $status[ $members[0]->guid ] == CHAT_DISABLE && $status[ $members[1]->guid ] == CHAT_DISABLE ) {
			$session->delete();
		}
		
		// Clean up
		//if($session->countEntitiesFromRelationship(ELGGCHAT_MEMBER) == 0){
			// No more members
		//	$session->delete();
		//}elseif($session->countAnnotations(ELGGCHAT_MESSAGE) == 0 && !check_entity_relationship($session->guid, ELGGCHAT_MEMBER, $session->owner_guid)){
			// Owner left without leaving a real message
		//	$session->delete();
		//}
		
	}
	exit();
?>