<?php
	/**
	* ElggChat - Pure Elgg-based chat/IM
	* 
	* Action to invite the specified user to an existing session
	* 
	* @package elggchat
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	* @version 0.4
	*/

	gatekeeper();
	
	$inviteId = (int) get_input("friend");
	$sessionId = (int) get_input("chatsession");
	$userId = get_loggedin_userid();
	
	if(($invite_user = get_user($inviteId)) && ($session = get_entity($sessionId)) && $inviteId != $userId){
		if($session->getSubtype() == ELGGCHAT_SESSION_SUBTYPE && !check_entity_relationship($sessionId, ELGGCHAT_MEMBER, $inviteId) && check_entity_relationship($sessionId, ELGGCHAT_MEMBER, $userId)){
			$session->addRelationship($inviteId, ELGGCHAT_MEMBER);
			$user = get_user($userId);
			
			$session->annotate(ELGGCHAT_SYSTEM_MESSAGE, sprintf(elgg_echo('elggchat:action:invite'),$user->name, $invite_user->name), ACCESS_LOGGED_IN, $userId);
		}
	}
	
	exit();
?>
