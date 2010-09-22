<?php
	/**
	* ElggChat - Pure Elgg-based chat/IM
	* 
	* Action to post a message in a chat session
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
		$chat_message = nl2br(get_input("chatmessage"));
		
		if(!empty($chat_message)){
			$session = get_entity($sessionId);
			
			$session->annotate(ELGGCHAT_MESSAGE, $chat_message, ACCESS_LOGGED_IN, $userId);
			$session->description = array( $user->guid => CHAT_ENABLE, $invite_user->guid => CHAT_ENABLE );
			$session->save();
		}
	}
	exit(); 
?>