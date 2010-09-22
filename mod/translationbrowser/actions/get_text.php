<?php
//echo "a";
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
	
	//decode
	$file_trans = base64_decode(get_input('modules'));
	
	//clean
	$file_trans  = ereg_replace("\n",'',$file_trans); 
	$lang_code_trans = substr($file_trans,-6,2);
	
	$language = get_input('languages');
	
	$language_str = explode('#',$language);
	
	if(is_array($language_str) && sizeof($language_str)==2){
		$lang_code_to_trans = $language_str[0];
		$lang_name_to_trans = $language_str[1];
	}else{
		register_error(elgg_echo("translationbrowser:languageerror"));
		forward('pg/translationbrowser/');
	}
	
	$_SESSION['translationbrowser']['current_language'] = $lang_code_to_trans;
	
	
	if(empty($lang_code_to_trans)){
		register_error(elgg_echo("translationbrowser:blanklang"));
		forward('pg/translationbrowser/');
	}
	
	if(empty($file_trans)){
		register_error(elgg_echo("translationbrowser:blankmodule"));
		forward('pg/translationbrowser/');
	}
	
	$file_to_trans = dirname($file_trans)."/".$lang_code_to_trans.".php";
	
	include("{$CONFIG->path}{$file_trans}");
		  

	//if file exists
	if (file_exists(trim("{$CONFIG->path}{$file_to_trans}"))){
		include(trim("{$CONFIG->path}{$file_to_trans}")); // now you have translation in $polish variable
	}
	  
	//try read file
	$lang_clean = translationbrowser_clean_lang($lang_name_to_trans);
	  

	if(isset($$lang_clean))
		$lang_to_trans = $$lang_clean;
	else
		$lang_to_trans = array();
		
	$base_lang_name = translationbrowser_get_base_language()->name;
	  
	//create object with information
	$data = new stdClass();
	  
	$data->file_to_trans = $file_to_trans;
	$data->lang_trans = $$base_lang_name;
	$data->lang_to_trans = $lang_to_trans;
	  
	$data->lang_code_trans = $lang_code_trans;
	$data->lang_code_to_trans = $lang_code_to_trans;
	  
	$data->lang_name_to_trans = $lang_clean;
	  
	  
	$sessionid = time();
	$_SESSION['translationbrowser']['codes'][$sessionid] = $data;
	 	
	forward("pg/translationbrowser/translate/{$sessionid}");
	exit;
?>