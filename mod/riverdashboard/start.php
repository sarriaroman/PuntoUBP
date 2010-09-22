<?php

	/**
	 * Elgg river dashboard plugin
	 * Improved by Snow.Hellsing
	 * 
	 * @package ElggRiverDash
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.org/
	 */

		function riverdashboard_init() {
		
			global $CONFIG;
			
			define('comment_limit',5);
			
			// Register and optionally replace the dashboard
			if (get_plugin_setting('useasdashboard', 'riverdashboard') == 'yes') {
				register_page_handler('dashboard','riverdashboard_page_handler');
			} else {
				// Activity main menu
				if (isloggedin())
				{
					add_menu(elgg_echo('activity'), $CONFIG->wwwroot . "mod/riverdashboard/");
				}
			}
		
			// Page handler
			register_page_handler('riverdashboard','riverdashboard_page_handler');
			
			extend_view('css','riverdashboard/css');
			
			add_widget_type('river_widget',elgg_echo('river:widget:title'), elgg_echo('river:widget:description'));			
		}
		
		/**
		 * Page handler for riverdash
		 *
		 * @param unknown_type $page
		 */
		function riverdashboard_page_handler($page)
		{
			global $CONFIG;
			
			switch ($page[0]) {
				default:
					@include(dirname(__FILE__) . "/index.php");
				break;
				
				case 'get_comments':
					@include_once 'ajax/get_comments.php';
				break;
				
				case 'add_comment':
					@include_once 'ajax/add_comment.php';
				break;
			}
		}
		
		function riverdashboard_dashboard() {
			
			include(dirname(__FILE__) . '/index.php');
			
		}

		register_elgg_event_handler('init','system','riverdashboard_init',666);
		
	// Register actions
		global $CONFIG;
		register_action("riverdashboard/add",false,$CONFIG->pluginspath . "riverdashboard/actions/add.php");
		register_action("riverdashboard/like",false,$CONFIG->pluginspath . "riverdashboard/actions/like.php");
		register_action("riverdashboard/delete",false,$CONFIG->pluginspath . "riverdashboard/actions/delete.php");
		register_action("riverdashboard/comment",false,$CONFIG->pluginspath . "riverdashboard/actions/comment.php");
		register_action("riverdashboard/post",false,$CONFIG->pluginspath . "riverdashboard/actions/post.php");

?>