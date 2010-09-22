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

	  require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	  
	  translationbrowser_gatekeeper();
	  	
	  $callback = get_input('callback');
	  if (!empty($callback)){
	 	
	  		$tmp_lang=get_input('language');
	  		$completed = get_language_completeness($tmp_lang);
	    
	  		header('Content-Type: text/plain ; charset=UTF-8');
	  		
	  		if($completed)
	    		echo "$completed %";
	    	else
	    		echo "0 %";
	    	
	    	exit;
	  }	
	  
	  set_context('admin');
	
	  // Set admin user for user block
	  set_page_owner($_SESSION['guid']);
		
	  $languages = get_installed_translations();
	  
	  $body = elgg_view('translationbrowser/forms/export', array('languages' => $languages));
	
	  $title = elgg_view_title(elgg_echo('translationbrowser:exporttranslations'));
	  
	  page_draw(elgg_echo('translationbrowser'),elgg_view_layout("two_column_left_sidebar", '', $title . $body));

?>

