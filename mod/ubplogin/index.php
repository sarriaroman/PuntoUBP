<?php
	/**
	 * Elgg customindex plugin
	 * This plugin substitutes the frontpage with a custom one
	 * 
	 * @package Customdash
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Boris Glumpler - coauthor: Jonathan Rico
	 * @copyright Boris Glumpler 2008 - Peesco 2008
	 * @link www.peesco.com
	 */
	 
	// Load Elgg engine
	require_once(dirname(dirname(dirname(__FILE__))) . '/engine/start.php');


			/**
		      * Check to see if user is logged in, if not display login form
		      **/
				
				if (isloggedin()) forward('pg/dashboard');
				
				$body = "";
				
				// Registrar Vista
				
				$body .= elgg_view("customindex/login");
				
				//----------------
	        	
		        set_context('main');
		        global $autofeed;
		        $autofeed = false;
				
				
		// Format
		$content = elgg_view_layout('login_column', $body);
				
				
		// Draw page
		echo page_draw(null, $content);


?>