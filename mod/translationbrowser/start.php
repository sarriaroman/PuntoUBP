<?php
	/**
	 * Elgg translation browser.
	 * 
	 * @package translationbrowser
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Mariusz Bulkowski
	 * @author v2 Pedro Prez
	 * @copyright 2009
	 * @link http://www.pedroprez.com.ar/
	 */

	/**
	 * Initialise the log browser and set up the menus.
	*/

	//Default Settings
	define('TRANSLATION_BROWSER_BASELANGUAGE','en#English');
	
	require_once(dirname(__FILE__) . '/model/functions_translatebrowser.php');

	function translationbrowser_init()
	{
		global $CONFIG;
		
		//Setting base language
		$base_language = get_plugin_setting('languages','translationbrowser');
		if(!$base_language)
			$base_language = TRANSLATION_BROWSER_BASELANGUAGE;
			
		$CONFIG->translation_browser->base_language	= $base_language;
		
		// Register a page handler, so we can have nice URLs
		register_page_handler('translationbrowser','translationbrowser_page_handler');
		
		// Extend CSS
		extend_view('css','translationbrowser/css');
		

		//If users can edit
		$admin_only = !translationbrowser_user_canedit();
		
		//Register the actions
		register_action("translationbrowser/get_text",false,$CONFIG->pluginspath . "translationbrowser/actions/get_text.php",$admin_only);
		register_action("translationbrowser/translate",false,$CONFIG->pluginspath . "translationbrowser/actions/translate.php",$admin_only);
		register_action("translationbrowser/export",false,$CONFIG->pluginspath . "translationbrowser/actions/export.php",$admin_only);
		
	}	
	
	/**
	 * Adding the log browser to the admin menu
	 *
	 */
	function translationbrowser_pagesetup(){
		if ((get_context() == 'admin' && isadminloggedin()) || translationbrowser_user_canedit()) {
			global $CONFIG;
			
			$handler = get_input('handler');
			
			add_menu(elgg_echo('translationbrowser'), $CONFIG->wwwroot . "pg/translationbrowser/");
			
			if($handler && $handler == 'translationbrowser'){
				add_submenu_item(elgg_echo('translationbrowser'), $CONFIG->wwwroot . 'pg/translationbrowser/', 'trans_menu');
				add_submenu_item("&nbsp;&nbsp;&nbsp;&nbsp;" . elgg_echo('translationbrowser:exporttranslations'), $CONFIG->wwwroot . 'pg/translationbrowser/export/', 'trans_menu');
			}else
				add_submenu_item(elgg_echo('translationbrowser'), $CONFIG->wwwroot . 'pg/translationbrowser/', 'trans_menu');
		}		
	}
	
	/**
	 * Translation browser page handler
	 *
	 * @param array $page Array of page elements, forwarded by the page handling mechanism
	 */
	function translationbrowser_page_handler($page){
		global $CONFIG;
		
		if(isset($page[0])){
			
			switch($page[0]){
				
				case 'translate':
					
					if (isset($page[1]) && !empty($page[1])){
    	  				set_input('translationbrowser_session',$page[1]);
		  				include($CONFIG->pluginspath . "translationbrowser/translate.php");
					}
					break;
					
				case 'export':
					
					include($CONFIG->pluginspath . "translationbrowser/export.php");
					break;
					
				default:
					
					include($CONFIG->pluginspath . "translationbrowser/index.php");
					break;
			
			}
		}else
			include($CONFIG->pluginspath . "translationbrowser/index.php");
		
	}
	
	// Initialise translation browser
	register_elgg_event_handler('init','system','translationbrowser_init');
	register_elgg_event_handler('pagesetup','system','translationbrowser_pagesetup');
?>