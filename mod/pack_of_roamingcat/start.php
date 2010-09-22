<?php
	/*
	 * Snow.Hellsing's function lib and something else
	 *
	 * @package PackofRoamingCat
	 */
	/*
	 * @author Snow.Hellsing <snow@g7life.com>
	 * @copyright FireBloom Studio
	 * @link http://firebloom.cc
	 */

	register_elgg_event_handler("init","system","pack_of_roamingcat_init");	

	function pack_of_roamingcat_init() {		
		require_once(dirname(__FILE__).'/functions.php');
		require_once(dirname(__FILE__).'/exceptions.php');
		extend_view('css','snowMod/css');
	}    
?>