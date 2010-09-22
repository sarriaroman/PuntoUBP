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
		
	  $session_translationbrowser = get_input('session_translate');
	  $data = $_SESSION['translationbrowser']['codes'][$session_translationbrowser];
	  
	  $file_to_trans = $data->file_to_trans;
	  $lang_code_to_trans = $data->lang_code_to_trans;
	  $lang_name_to_trans = $data->lang_name_to_trans;
	  $type_export = get_input('export');

	  if(is_array($type_export)) $type_export = $type_export[0];
	  
	  $new_trans = get_input('words');
	  
	  if(empty($new_trans)){
	  		register_error(elgg_echo("translationbrowser:error"));
			forward("pg/translationbrowser/translate/{$session_translationbrowser}");
	  }else{
	  	$new_trans = array_merge($data->lang_to_trans,$new_trans);
	  	$_SESSION['translationbrowser'][$session_translationbrowser]->new_trans = $new_trans;
	  }
	  
	  $c = 0;
	  $i = 0;
	  $values = array_values($new_trans);
	  $size_values = sizeof($values);
	  
	  while($i != $size_values){
	  	if(empty($values[$i])) $c++;
	  	$i++;
	  }
	  
	  if($c == $size_values){
	  	register_error(elgg_echo("translationbrowser:emptyfields"));
		forward("pg/translationbrowser/translate/{$session_translationbrowser}");
	  }
	  
	   //begin traduction ;)
	  if($type_export == 'update')
	  {
		  $folder_lang = dirname("{$CONFIG->path}{$file_to_trans}");
		  
		 	if(!is_writable($folder_lang))
		 	{
			  	if(!@chmod($folder_lang, 0777))
			  	{
			  		register_error(elgg_echo("translationbrowser:problem:permiss"));
						forward("pg/translationbrowser/translate/{$session_translationbrowser}");
			  	}
		  }
		  $file_to_trans_path = trim("{$CONFIG->path}{$file_to_trans}");
		  
		  if (file_exists($file_to_trans_path))
		  {
		    if(is_writable($file_to_trans_path))
		    {
		  		$back_filename = dirname($file_to_trans) . "/" . date('Ymd') . "_" . basename($file_to_trans) . "_bak";
		  		$file_to_rename_path = trim("{$CONFIG->path}{$back_filename}");
		  		if(!@rename($file_to_trans_path, $file_to_rename_path))
		  		{
		  			register_error(elgg_echo("translationbrowser:error"));
						forward("pg/translationbrowser/translate/{$session_translationbrowser}");
		  		}
		    }
		  }
		 
	  }
	  
	  $content = "<?php\n";
	  $content .= "\n";
	  $content .= '// '. elgg_echo("translationbrowser:generatedby") . " \n";
	  $content .= "\n";
	  $content .= "$" . "{$lang_name_to_trans} = array( \n";
	  
	  // remember last key 
    end($new_trans);
    $last_key = key($new_trans);
    

    foreach ($new_trans as $key => $word)
		{
			if(empty($word)) continue;
			
			
    	$word = translationbrowser_clean_text($word);
    	
    	$line= "\t '{$key}'  =>  \"{$word}\"";
	
			if ($last_key != $key)
	  		$line .=" , " ;
			
	  	$content .= "$line\n";
			
    };

    $content .= "); \n"; 
		$content .= "\n"; 

    // add example add_translation("de",$german);
    $content .= "add_translation('{$lang_code_to_trans}', " . "$" . "{$lang_name_to_trans}); \n"; 
    $content .= "\n"; 
		$content .= "?".">";
		
    if($type_export == 'update'){
	  	//Generate or update the file
		if(!$file = fopen($file_to_trans_path,"w")){
			register_error(elgg_echo("translationbrowser:error:filecreate"));
			forward("pg/translationbrowser/translate/{$session_translationbrowser}");
		}
		  
		fwrite($file,$content);
    	fclose($file);	
    	
    	//Clean Session
    	unset($_SESSION['translationbrowser']);
		  
	    system_message(elgg_echo("translationbrowser:success"));
	    forward("pg/translationbrowser/");
	  }else 
	  	if($type_export == 'downloadallinzip'){
	  		//Export to zip
			translationbrowser_export($lang_code_to_trans);
	  }else{
	  	//Clean Session
    	//unset($_SESSION['translationbrowser']);
	  	
	  	//Geneate the file for download
	  	$file_name = "{$lang_code_to_trans}.php";
			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=\"$file_name\"\n");
			echo $content;
	  }
    exit;
?>