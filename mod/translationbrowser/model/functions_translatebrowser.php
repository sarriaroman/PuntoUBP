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
		  
		////////////////////////////////////////////////////////////////////////////////
		// return list $base_lang_code files with full path
		////////////////////////////////////////////////////////////////////////////////
		function translationbrowser_scan($orderer = true){
		  global $CONFIG;
		  
		  $tab_out = array();
		  //System Language
      	  translationbrowser_scandir($CONFIG->path . 'languages/',$tab_out);
      	  
      	  //Modules Languages
      	  translationbrowser_scandir($CONFIG->path . 'mod/',$tab_out);
      	  
    	  //Ordenamos
    	  if($orderer)
    	  	  asort($tab_out);
	  	  
	  	  return $tab_out;
		 
		}
		
		
		function translationbrowser_scandir($dir,&$tab_out)
		{
		  global $CONFIG;
		  $io=0;

		  if(isset($CONFIG->translationbrowser->modules_enabled))
		      $modules_enabled = $CONFIG->translationbrowser->modules_enabled;
		  else
		      $modules_enabled = array();

		      
		  $len_dir= strlen($CONFIG->path);
		  if ($handle = @opendir($dir)){
			while (false !== ($file = readdir($handle))){
		      if ($file != "." && $file != ".."){
		        $newdir = "";
		        $filetext = "";
		        $test++;
		        if (is_dir($dir)){
		          $io++;
		          
		          if(!is_file($dir."/".$file)){

		              $newdir.= $dir.$file."/";
		              
		              if (preg_match('%mod/([^\\s|^\\/]+)/%', $dir, $matchis)){
		                  if(isset($matchis[1])){
                              $key_aux = $matchis[1];
                              
		                      if(!isset($modules_enabled[$key_aux])){
		                          if(is_plugin_enabled($key_aux))
    		                          $CONFIG->translationbrowser->modules_enabled[$key_aux] = 1;
    		                      else
    		                          continue;
		                      }
		                  }
		              }
    		          translationbrowser_scandir($newdir,$tab_out);
		          }
		          
		          $base_lang_code = translationbrowser_get_base_language()->code;
		          
		          if(is_file($dir.$file) && ($file=="$base_lang_code.php")){
		            
		              
		            $text =  str_replace('//','/',"".$dir.$file);
		            $text = trim(substr($text,$len_dir));
		            
		            $module_text = elgg_echo('translationbrowser:undefined');
		            if (preg_match('%mod/([^\\s|^\\/]+)/%', $text, $matches)){
		            	if(isset($matches[1])){
							$module_text = elgg_echo($matches[1]);
							$text = $matches[0] . "languages/$base_lang_code.php";
		            	}
		            }	//if (preg_match('%mod/([^\\s|^\\/]+)/%', $text, $matches)){ 
		            else {
		            if (preg_match("%languages/$base_lang_code.php%", $text, $matches2)){
							if(isset($matches2[0])){
								$text = "languages/$base_lang_code.php";
				        	}
						}
		            	if($text == "languages/$base_lang_code.php")
		            		$module_text = elgg_echo('translationbrowser:languagecore');
		            	else
							$module_text = $text;
					}
		            $tab_out[$text]= $module_text;
		          } //if(is_file($dir.$file)&&($file=="$base_lang_code.php"))
		        } //if (!is_file($dir."/".$file) or is_dir($dir)){
		      } //if ($file != "." && $file != "..")
		    }//while (false !== ($file = readdir($handle)))
		    closedir($handle);
		  }
		}
		
		
		////////////////////////////////////////////////////////////////////////////////
		// return variable name for language
		// i must replace all wrong char from language  
		// in variable name i can't use space etc. 
		////////////////////////////////////////////////////////////////////////////////
		function translationbrowser_clean_lang($lang)
		{
		  $str = strtolower($lang);
		  $t_in = array(" ","(",")");
		  $t_out = array("-","-","-");
		  $str = str_replace($t_in,$t_out,$str);
		  return $str;
		}
		
		function translationbrowser_clean_text($text)
		{
			$t_in = array('"','&gt;','&lt;','$');
		  $t_out = array('\"','>','<',"\$");
		  $str = str_replace($t_in,$t_out,$text);
			return $str;
		}
		
		
		////////////////////////////////////////////////////////////////////////////////
		// create folders structure
		// return true if folder exists or create it
		// return false when folder don't exists or can't create it
		////////////////////////////////////////////////////////////////////////////////
		function translationbrowser_mkdir_recursive($pathname, $mode)
		{
		  is_dir(dirname($pathname)) || mkdir_recursive(dirname($pathname), $mode);
		  return is_dir($pathname) || @mkdir($pathname, $mode);
		}

// change file name from base language to translated language
function translationbrowser_change_lang($f_name,$new_lang){
	$base_lang_code = translationbrowser_get_base_language()->code;
	return str_replace("$base_lang_code.php",$new_lang.".php",$f_name);
}

function translationbrowser_module_rate($key,$lang_code,$tab_name){ 
  
  global $CONFIG;

  $base_lang_name = translationbrowser_get_base_language()->name;
  
  include("{$CONFIG->path}{$key}");
  $count_base_language = count($$base_lang_name);
  
  $new_key = translationbrowser_change_lang($key,$lang_code);
  $str.= $new_key;
  include("{$CONFIG->path}{$new_key}");
  $tab_name = translationbrowser_clean_lang($tab_name);

  $count_pl=count($$tab_name);    
  
  $rate = round($count_pl/$count_base_language * 100,2);
  return ("{$rate}%   -  $count_pl/$count_base_language");
}

/*
	Get current language
	Based in automagic_translation by Gabriel Monge-Franco
*/
function translationbrowser_get_current_language(){
	
	global $CONFIG;
		
	$user = get_loggedin_user();
	$language = false;
	$browserlang = false;
	
	// Priority 0: Translation browser session
	if(isset($_SESSION['translationbrowser']['current_language']))
		$language = $_SESSION['translationbrowser']['current_language'];
		
	// Priority 1: User-configured language (if logged in)
	if ((!$language) && ($user) && ($user->language))
		$language = $user->language;
	
	// Priority 2: Browser language (if autodetection enabled)
	if ((!$language) && (isset($CONFIG->detectlanguage)) && ($CONFIG->detectlanguage==true)) {
		$browserlang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		if ($browserlang) { // We were able to autodetect the browser language
			if ((!isset($CONFIG->language)) || (is_null($CONFIG->language)) || (isset($CONFIG->language) && ($CONFIG->language!=$browserlang))) {
				// Language was autodetected; set default site language
				$CONFIG->language = $language = $browserlang;
			}
		}
	}
	
	// Priority 3: Administrator-configured language (if set)
	if ((!$language) && (isset($CONFIG->language)) && ($CONFIG->language))
		$language = $CONFIG->language;
		
	if ($language)
		return $language;

	return false;

}

function translationbrowser_get_base_language($cleared = true){
	global $CONFIG;
	
	$language_str = explode('#',$CONFIG->translation_browser->base_language);
	
	$obj_language = new StdClass();
	
	if(is_array($language_str) && sizeof($language_str)==2){
		$obj_language->code = $language_str[0];
		if($cleared)
			$language_str[1] = translationbrowser_clean_lang($language_str[1]);
			
		$obj_language->name = $language_str[1];
	}
	
	return $obj_language;
}

function translationbrowser_gatekeeper(){
	
	if(get_plugin_setting('userscanedit','translationbrowser')!="yes"){
  		admin_gatekeeper();
	}else{
  		gatekeeper();
  		
  		if(!translationbrowser_user_canedit())
  			forward();
  	}	
}

function translationbrowser_get_accesslist(){
	$accesslist = get_plugin_setting('accesslist','translationbrowser');
	$accesslist = explode("\n", $accesslist);

	if(is_array($accesslist)){
		foreach($accesslist as $key => $acl){
			$accesslist[$key] =  trim($acl);
		}
			
	}
	return $accesslist;	
}

function translationbrowser_user_canedit(){
	
	if(isadminloggedin())
		return true;
	
	$user = get_loggedin_user();
	if($user instanceof ElggUser){
		
		//Get the users that can translate
  		$users_can_translate = translationbrowser_get_accesslist();
  		
  		//If the list of the users is empty then all the users can edit.
  		if(!empty($users_can_translate)){
  			if(in_array($user->username, $users_can_translate)){
  				return true; 
  			}
  		}else{
  			return true;
  		}	
	}
	return false;
}


function translationbrowser_export($lang_code_to_trans = 'en'){
	
	global $CONFIG;
	
	//Get the zip file with all the file translates
	$tab_out = translationbrowser_scan();
	
  	include($CONFIG->pluginspath . "translationbrowser/model/zip.php");
  
  	//Create a zip file
    $zipTest = new zipfile();
    
    //Add the files to zip file
	foreach ($tab_out as $key => $value){
		$f_name =  $key;
	    $f_name = translationbrowser_change_lang($f_name,$lang_code_to_trans);
	    if(file_exists($CONFIG->path.$f_name)){
              $zipTest->add_file($CONFIG->path.$f_name,$f_name);
	    }  
	}
  
  	$zipTest->add_data(elgg_echo('translationbrowser:infotxt'), "info_translationbrowser.txt");
  
 	$f_name= "elgg_translation_$lang_code_to_trans.zip";
        $filename = $CONFIG->path . $f_name;
        $fd = fopen ($filename, "wb");
        $out = fwrite ($fd, $zipTest -> file());
        fclose ($fd);
        
    forward($f_name);
    exit;
}

function translationbrowser_get_languages(){
	global $CONFIG;
	include($CONFIG->pluginspath . "translationbrowser/countries.php");
	return $iso_639_1;
}

?>