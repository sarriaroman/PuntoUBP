<?php
	/**
	* ElggChat - Pure Elgg-based chat/IM
	* 
	* Main initialization file
	* 
	* @package elggchat
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	* @version 0.4
	*/
	global $CONFIG;
	
	define("ELGGCHAT_MEMBER", "elggchat_member");
	define("ELGGCHAT_SESSION_SUBTYPE", "elggchat_session");
	define("ELGGCHAT_SYSTEM_MESSAGE", "elggchat_system_message");
	define("ELGGCHAT_MESSAGE", "elggchat_message");	
	
	function elggchat_init() {
		if(isloggedin()){
			if(get_plugin_usersetting("enableChat") != "no"){
				
				extend_view('profile/menu/actions', 'elggchat/profile_menu_actions');
				extend_view('page_elements/header', 'elggchat/session_monitor');
				
				extend_view('metatags','elggchat/metatags');
				
				// elggchat_extensions
				//extend_view('elggchat/extensions', 'elggchat_extensions/latest_river');
				
			}
		}
    }
	
	// Cron Actions
	function elggchat_session_cleanup($hook, $entity_type, $returnvalue, $params){
		$context = get_context();
		set_context("elggchat_cron_context");
		
		$session_count = get_entities("object", ELGGCHAT_SESSION_SUBTYPE, 0, "", 0, 0, true);
		$sessions = get_entities("object", ELGGCHAT_SESSION_SUBTYPE, 0, "", $session_count);
		
		foreach($sessions as $session){
			$member_count = $session->countEntitiesFromRelationship(ELGGCHAT_MEMBER);
			
			if($member_count > 0){
				$max_age = (int) get_plugin_setting("maxSessionAge");
				$age = time() - $session->time_updated;
				
				if($age > $max_age){
					$session->delete();
				}
			} else {
				$session->delete();
			}
		}
		set_context($context);
	}
	
	function elggchat_permissions_check($hook_name, $entity_type, $return_value, $parameters) {
		$result = $return_value;
		
		if(get_context() == "elggchat_cron_context"){
			$result = true;
		}
		
		return $result;
	}
	
	function elggchat_logout_handler($event, $object_type, $object){
		
		if(!empty($object) && $object instanceof ElggUser){
			$chat_sessions_count = get_entities_from_relationship(ELGGCHAT_MEMBER, $object->guid, true, "", "", "", "time_created desc", null, null, true);
			
			if($chat_sessions_count > 0){
				$sessions = $object->getEntitiesFromRelationship(ELGGCHAT_MEMBER, true);
				
				foreach($sessions as $session){
					remove_entity_relationship($session->guid, ELGGCHAT_MEMBER, $object->guid);
					
					$session->annotate(ELGGCHAT_SYSTEM_MESSAGE, sprintf(elgg_echo('elggchat:action:leave'), $object->name), ACCESS_LOGGED_IN, $object->guid);
					
					// Clean up
					if($session->countEntitiesFromRelationship(ELGGCHAT_MEMBER) == 0){
						// No more members
						$session->delete();
					}elseif($session->countAnnotations(ELGGCHAT_MESSAGE) == 0 && !check_entity_relationship($session->guid, ELGGCHAT_MEMBER, $session->owner_guid)){
						// Owner left without leaving a real message
						$session->delete();
					}
				}
				
			}
		}
		
		return true;
	}

	register_elgg_event_handler('init', 'system', 'elggchat_init');
	
	// Permission check overrule
	register_plugin_hook('permissions_check', 'all', 'elggchat_permissions_check');
	
	// Register Cron Jobs
	register_plugin_hook('cron', 'hourly', 'elggchat_session_cleanup');
	
	// actions
	register_action("elggchat/create", false, $CONFIG->pluginspath . "elggchat/actions/create.php");
	register_action("elggchat/post_message", false, $CONFIG->pluginspath . "elggchat/actions/post_message.php");
	register_action("elggchat/poll", false, $CONFIG->pluginspath . "elggchat/actions/poll.php");
	register_action("elggchat/invite", false, $CONFIG->pluginspath . "elggchat/actions/invite.php");
	register_action("elggchat/leave", false, $CONFIG->pluginspath . "elggchat/actions/leave.php");
	register_action("elggchat/get_smiley", false, $CONFIG->pluginspath . "elggchat/actions/get_smiley.php");
	
	// Logout event handler
	register_elgg_event_handler('logout', 'user', 'elggchat_logout_handler');
?>