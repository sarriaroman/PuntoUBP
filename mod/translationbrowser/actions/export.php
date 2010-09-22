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

	// Safety first
	action_gatekeeper();
	
	translationbrowser_gatekeeper();
	
	$language = get_input('languages');

	$language_str = explode('#',$language);
		
	if(is_array($language_str) && sizeof($language_str)==2){
			$lang_code_to_trans = $language_str[0];
			$lang_name_to_trans = $language_str[1];
	}else{
		register_error(elgg_echo("translationbrowser:languageerror"));
		forward('pg/translationbrowser/export');
	}
	//Export to zip
	translationbrowser_export($lang_code_to_trans);
?>