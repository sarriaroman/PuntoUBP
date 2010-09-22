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
  
	//Check the access
  	translationbrowser_gatekeeper();
  	
  	$iso_639_1 = translationbrowser_get_languages();
  	
  	$callback = get_input('callback');
  	if (!empty($callback)){
 	
  		$tmp_lang=get_input('language');
  		$tmp_name = $iso_639_1[$tmp_lang];
    
  		header('Content-Type: application/xml; charset=UTF-8');
    
  		$tab_out = translationbrowser_scan();

	  	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
	    echo "<modules>\n";
	
	  	foreach($tab_out as $key => $opt){
	  		
	  		$tmp_key = md5($key);
	  		$str = translationbrowser_module_rate($key,$tmp_lang,$tmp_name);
	    	
	  		echo "<h1>$str</h1>	
	    		  <module id=\"{$tmp_key}\">\n
	    			<title>{$str}</title>\n
	    		  </module>\n";
		}
  
		echo "</modules>\n";
		exit;
	}
 
	set_context('admin');
	
	// Set admin user for user block
 	set_page_owner($_SESSION['guid']);
	
	//clean session
	unset($_SESSION['translationbrowser']['codes']);
	 
    $title = elgg_view_title(elgg_echo('translationbrowser'));

	//Scan in the enables modules
    $tab_out = translationbrowser_scan();

    $body .= elgg_view("translationbrowser/forms/select_module", array(
    																	'languages' => $iso_639_1,
     																	'modules' => $tab_out,
    																	'twoflags' => true,
    																  )); //Get the form	
		
	// Display main admin menu
	page_draw(elgg_echo('translationbrowser'),elgg_view_layout("two_column_left_sidebar", '', $title . $body));
	
?>