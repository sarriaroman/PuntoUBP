<?php
	/**
	* ElggChat - Pure Elgg-based chat/IM
	* 
	* Dutch language file
	* 
	* @package elggchat
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	* @version 0.4
	*/

	$dutch = array(
		'elggchat' => "ElggChat",
		'elggchat:title' => "ElggChat",
		'elggchat:chat:profile:invite' => "Uitnodigen voor chat",
		'elggchat:chat:send' => "Verstuur",
		
		'elggchat:friendspicker:info' => "Vrienden online",	
		'elggchat:friendspicker:online' => "Actief",
		'elggchat:friendspicker:offline' => "Inactief",
		
		'elggchat:chat:invite' => "Uitnodigen",
		'elggchat:chat:leave' => "Verlaat",
		'elggchat:chat:leave:confirm' => "Weet je zeker dat je deze chat wilt verlaten?",
		
		'elggchat:action:invite' => "<b>%s</b> nodigde <b>%s</b> uit",
		'elggchat:action:leave' => "<b>%s</b> heeft de chat verlaten",
		'elggchat:action:join' => "<b>%s</b> chat nu mee",
		
		'elggchat:session:name:default' => "Chat sessie (%s)",
		'elggchat:session:onlinestatus' => "Laatste actie: %s",
		
		// Plugin settings
		'elggchat:admin:settings:hours' => "%s uur",
	
		'elggchat:admin:settings:maxsessionage' => "Maximale tijd een sessie zonder actie kan zijn, voordat deze wordt opgeruimd",
		
		'elggchat:admin:settings:chatupdateinterval' => "Polling interval (seconden) van een chat venster",
		'elggchat:admin:settings:maxchatupdateinterval' => "Iedere 10 polling intervallen dat er geen data is wordt de polling verhoogt tot het dit maximum (seconden) berijkt",
		'elggchat:admin:settings:monitorupdateinterval' => "Polling interval (seconden) van de chat monitor, welke controlleerd op nieuwe chat sessies",
		'elggchat:admin:settings:enable_sounds' => "Geluiden gebruiken",
		'elggchat:admin:settings:enable_flashing' => "Activeer knipperen van chatsessie voor nieuwe berichten",
		'elggchat:admin:settings:enable_extensions' => "Gebruik extensions",
	
		'elggchat:admin:settings:online_status:active' => "Maximun aantal seconden voordat iemand idle wordt",
		'elggchat:admin:settings:online_status:inactive' => "Maximum aantal seconden voordat iemand inactief wordt",
		
		// User settings
		'elggchat:usersettings:enable_chat' => "Schakel ElggChat Toolbar in?",
	
		// Toolbar actions
		'elggchat:toolbar:minimize' => "Minimaliseer ElggChat Toolbar",
		'elggchat:toolbar:maximize' => "Maximaliseer ElggChat Toolbar",
	);
					
	add_translation("nl", $dutch);

?>