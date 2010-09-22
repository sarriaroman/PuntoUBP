<?php
	/**
	* ElggChat - Pure Elgg-based chat/IM
	* 
	* English language file
	* 
	* @package elggchat
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	* @version 0.4
	*/

	$english = array(
		'elggchat' => "ElggChat",
		'elggchat:title' => "ElggChat",
		'elggchat:chat:profile:invite' => "Invite for chat",
		'elggchat:chat:send' => "Send",
		
		'elggchat:friendspicker:info' => "Friends online",	
		'elggchat:friendspicker:online' => "Online",
		'elggchat:friendspicker:offline' => "Offline",
	
		'elggchat:chat:invite' => "Invite",
		'elggchat:chat:leave' => "Leave",
		'elggchat:chat:leave:confirm' => "Are you sure you wish to leave this session?",
		
		'elggchat:action:invite' => "<b>%s</b> invited <b>%s</b>",
		'elggchat:action:leave' => "<b>%s</b> left the session",
		'elggchat:action:join' => "<b>%s</b> joined the session",
		
		'elggchat:session:name:default' => "Chat session (%s)",
		'elggchat:session:onlinestatus' => "Last action: %s",
		
		// Plugin settings
		'elggchat:admin:settings:hours' => "%s hour(s)",
	
		'elggchat:admin:settings:maxsessionage' => "Max time a session can remain idle before cleanup",
		
		'elggchat:admin:settings:chatupdateinterval' => "Polling interval (seconds) of the chat window",
		'elggchat:admin:settings:maxchatupdateinterval' => "Every 10 times of polling with no data returned the polling interval will be multiplied until it reaches this maximum (seconds)",
		'elggchat:admin:settings:monitorupdateinterval' => "Polling interval (seconds) of the chat session monitor, which checks for new chat requests",
		'elggchat:admin:settings:enable_sounds' => "Enable sounds",
		'elggchat:admin:settings:enable_flashing' => "Enable flashing for new messages",
		'elggchat:admin:settings:enable_extensions' => "Enable extensions",

		'elggchat:admin:settings:online_status:active' => "Max number of seconds before user will be idle",
		'elggchat:admin:settings:online_status:inactive' => "Max number of seconds before user will be inactive",
		
		// User settings
		'elggchat:usersettings:enable_chat' => "Enable ElggChat Toolbar?",
		'elggchat:usersettings:allow_contact_from' => "Allow the following to contact me by chat",
		'elggchat:usersettings:allow_contact_from:all' => "Everyone can contact me",
		'elggchat:usersettings:allow_contact_from:friends' => "Only my friends can contact me",
		'elggchat:usersettings:allow_contact_from:none' => "Nobody can contact me",
	
		// Toolbar actions
		'elggchat:toolbar:minimize' => "Minimize ElggChat Toolbar",
		'elggchat:toolbar:maximize' => "Maximize ElggChat Toolbar",
	);
					
	add_translation("en", $english);

?>