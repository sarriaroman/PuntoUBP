<?php
/**
 * Elgg Mobile
 * A Mobile Client For Elgg
 *
 * @package Elgg
 * @subpackage Core
 * @author Mark Harding
 * @link http://maestrozone.com
 *
 */

	function mobile_init(){
		
		extend_view('metatags','mobile/metatags');
		
// Close the mobile_init
    }
// Initialise log browser
	register_elgg_event_handler('init','system','mobile_init');
//elgg_register_simplecache_view(mobile);
register_action("mobile/login",false,$CONFIG->pluginspath . "mobile/actions/login.php", true);
		

?>
