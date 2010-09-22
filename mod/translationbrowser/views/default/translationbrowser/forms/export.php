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

	$body = "<p>" . elgg_echo("translationbrowser:exportdescription") . "</p>";
	$body .= elgg_view('translationbrowser/select_language',$vars);
	$body .= elgg_view('input/submit',array(
												'type' => 'submit',
												'value' => elgg_echo('translationbrowser:export'),
	
											));
  
  	$body = "<div class='contentWrapper'>{$body}</div>";  
  	
	echo  elgg_view('input/form', array('internalid' => 'export', 'internalname' => 'export', 'action' => "{$vars['url']}action/translationbrowser/export", 'body' => $body));
  
?>
