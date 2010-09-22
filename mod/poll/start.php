<?php

	/**
	 * Elgg Poll plugin
	 * @package Elggpoll
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @Original author John Mellberg
	 * website http://www.syslogicinc.com
	 * @Modified By Team Webgalli to work with ElggV1.5
	 * www.webgalli.com or www.m4medicine.com
	 */

	/**
	 * poll initialisation
	 *
	 * These parameters are required for the event API, but we won't use them:
	 * 
	 * @param unknown_type $event
	 * @param unknown_type $object_type
	 * @param unknown_type $object
	 */

		function poll_init() {
			
			// Load system configuration
				global $CONFIG;
				
			// Load the language file
				register_translations($CONFIG->pluginspath . "poll/languages/");
				
			// Set up menu for logged in users
				if (isloggedin()) {
    				
					add_menu(elgg_echo('polls'), $CONFIG->wwwroot . "pg/poll/" . $_SESSION['user']->username);
					
			// And for logged out users
				} else {
					add_menu(elgg_echo('poll'), $CONFIG->wwwroot . "mod/poll/everyone.php",array(
					));
				}
				
			// Extend system CSS with our own styles, which are defined in the poll/css view
				extend_view('css','poll/css');
				
			// Extend hover-over menu	
				extend_view('profile/menu/links','poll/menu');
				
			// Register a page handler, so we can have nice URLs
				register_page_handler('poll','poll_page_handler');
				
			// Register a URL handler for poll posts
				register_entity_url_handler('poll_url','object','poll');
								
			// Register entity type
				register_entity_type('object','poll');
				
			//add widget
				add_widget_type('poll',elgg_echo("Mis encuestas"),elgg_echo("Este componente muestra sus encuestas."));
				add_widget_type('latestPolls',elgg_echo("Ultimas encuestas de la comunidad"),elgg_echo("Este componente muestra las mas recientes encuestas."));

		}
		
		function poll_pagesetup() {
			
			global $CONFIG;

			//add submenu options
				if (get_context() == "poll") {
					if ((page_owner() == $_SESSION['guid'] || !page_owner()) && isloggedin()) {
						add_submenu_item(elgg_echo('poll:your'),$CONFIG->wwwroot."pg/poll/" . $_SESSION['user']->username);
						add_submenu_item(elgg_echo('poll:friends'),$CONFIG->wwwroot."pg/poll/" . $_SESSION['user']->username . "/friends/");
						add_submenu_item(elgg_echo('poll:everyone'),$CONFIG->wwwroot."mod/poll/everyone.php");
						add_submenu_item(elgg_echo('poll:addpost'),$CONFIG->wwwroot."mod/poll/add.php");
					} else if (page_owner()) {
						$page_owner = page_owner_entity();
						add_submenu_item(sprintf(elgg_echo('poll:user'),$page_owner->name),$CONFIG->wwwroot."pg/poll/" . $page_owner->username);
						if ($page_owner instanceof ElggUser) // Sorry groups, this isn't for you.
							add_submenu_item(sprintf(elgg_echo('poll:user:friends'),$page_owner->name),$CONFIG->wwwroot."pg/poll/" . $page_owner->username . "/friends/");
						add_submenu_item(elgg_echo('poll:everyone'),$CONFIG->wwwroot."mod/poll/everyone.php");
					} else {
						add_submenu_item(elgg_echo('poll:everyone'),$CONFIG->wwwroot."mod/poll/everyone.php");
					}
				}
			
		}
		
		/**
		 * poll page handler; allows the use of fancy URLs
		 *
		 * @param array $page From the page_handler function
		 * @return true|false Depending on success
		 */
		function poll_page_handler($page) {
			
			// The first component of a poll URL is the username
			if (isset($page[0])) {
				set_input('username',$page[0]);
			}
			
			// The second part dictates what we're doing
			if (isset($page[1])) {
				switch($page[1]) {
					case "read":		set_input('pollpost',$page[2]);
										@include(dirname(__FILE__) . "/read.php");
										break;
					case "friends":		@include(dirname(__FILE__) . "/friends.php");
										break;
				}
			// If the URL is just 'poll/username', or just 'poll/', load the standard poll index
			} else {
				@include(dirname(__FILE__) . "/index.php");
				return true;
			}
			
			return false;
			
		}

		/**
		 * Populates the ->getUrl() method for poll objects
		 *
		 * @param ElggEntity $pollpost poll post entity
		 * @return string poll post URL
		 */
		function poll_url($pollpost) {
			
			global $CONFIG;
			$title = $pollpost->title;
			$title = friendly_title($title);
			return $CONFIG->url . "pg/poll/" . $pollpost->getOwnerEntity()->username . "/read/" . $pollpost->getGUID() . "/" . $title;
			
		}
		
		
		/*
		checks for votes on the poll
		@param ElggEntity $poll
		@param guid
		@return true/false
		*/
		function checkForPreviousVote($poll, $user_guid)
		{
			$votes = $poll->getAnnotations('vote',9999,0,'desc');
			
			if(count($votes) > 0)
			{
				foreach($votes as $vote)
				{
					if($vote->owner_guid == $user_guid) return true;
				}
				return false;
			}
			return true;
		}
		
				
	// Make sure the poll initialisation function is called on initialisation
		register_elgg_event_handler('init','system','poll_init');
		register_elgg_event_handler('pagesetup','system','poll_pagesetup');
		
	// Register actions
		global $CONFIG;
		register_action("poll/add",false,$CONFIG->pluginspath . "poll/actions/add.php");
		register_action("poll/edit",false,$CONFIG->pluginspath . "poll/actions/edit.php");
		register_action("poll/delete",false,$CONFIG->pluginspath . "poll/actions/delete.php");
		register_action("poll/vote",false,$CONFIG->pluginspath . "poll/actions/vote.php");
		
?>