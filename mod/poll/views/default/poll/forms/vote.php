<?php

	/**
	 * Elgg Poll plugin
	 * @package Elggpoll
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @Original author John Mellberg
	 * website http://www.syslogicinc.com
	 * @Modified By Team Webgalli to work with ElggV1.5
	 * www.webgalli.com or www.m4medicine.com
	 */
	 

	if (isset($vars['entity']))
	{
		//set up our variables
		$action = "poll/vote";
		$question = $vars['entity']->question;
		$responses = $vars['entity']->responses;
		$tags = $vars['entity']->tags;
		$access_id = $vars['entity']->access_id;
	}
	else 
	{
		register_error(elgg_echo("poll:blank"));
		forward("mod/poll/index.php");
	}
	
	//display question in header tags
	$question_text = "<h2>" . $question . "</h2>";

	//convert $responses to radio inputs for form display
	$response_inputs = "";
	if (!empty($responses)) {
    	if (is_array($responses)) {
	  		
	  		$response_inputs .= elgg_view('input/radio', array('internalname' => 'response','options' => $responses));
	        
    	} else {
    		
    		if (is_string($response)) {
	            		
	            $response_inputs .= elgg_view('input/radio', array('internalname' => 'response', 'value' => $responses));
	            $response_inputs .= " " . $responses;
	            		
			} else {
	            		
	            $response_inputs .= elgg_view('input/radio', array('internalname' => 'response', 'value' => $responses->value));
	            $response_inputs .= " " . $responses->value;
	            		
			}
			
   		}
   	}
   	
   	$submit_input = elgg_view('input/submit', array('internalname' => 'submit', 'value' => elgg_echo('Vote')));

	if (isset($vars['entity'])) {
    	$entity_hidden = elgg_view('input/hidden', array('internalname' => 'pollpost', 'value' => $vars['entity']->getGUID()));
    } else {
    	$entity_hidden = '';
    }
    
    $form_body = $question_text . "<br><p>" . $response_inputs . "</p>";
    $form_body .= "<p>" . $submit_input . $entity_hidden . "</p>";
    
    echo elgg_view('input/form', array('action' => "{$vars['url']}action/$action", 'body' => $form_body));

?>
