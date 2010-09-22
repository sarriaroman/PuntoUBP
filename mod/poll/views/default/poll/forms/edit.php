<div class="contentWrapper">

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
	 
	 
	// Set title, form destination
		if (isset($vars['entity'])) {
			//$title = sprintf(elgg_echo("poll:editpost"),$object->title);
			$action = "poll/edit";
			$question = $vars['entity']->question;
			$responses = $vars['entity']->responses;
			$tags = $vars['entity']->tags;
			$access_id = $vars['entity']->access_id;
		} else  {
			//$title = elgg_echo("poll:addpost");
			$action = "poll/add";
			$question = "";
			$responses = "";
			$tags = "";
			$access_id = 0;
		}

	// Just in case we have some cached details
		if (isset($vars['question'])) {
			$question = $vars['question'];
			$responses = $vars['responses'];
			$tags = $vars['polltags'];
		}
		
	//convert $responses to string for text display
		$responsestring = "";
		
		if (!empty($responses)) {
    		if (is_array($responses)) {
	  	    	foreach($responses as $response) {
	            
	  	    		if (!empty($responsestring)) {
	     				$responsestring .= ", ";
	       			}
	            	
	            	if (is_string($response)) {
	            		$responsestring .= $response;
	            	} else {
	            		$responsestring .= $response->value;
	            	}
	            
	        	}
    		} else {
    			$responsestring = $responses;
    		}
    	}


?>

<?php
        $question_label = elgg_echo('poll:question');
        $question_textbox = elgg_view('input/text', array('internalname' => 'question', 'value' => $question));
        
        $responses_label = elgg_echo('poll:responses');
        $responses_textbox = elgg_view('input/text', array('internalname' => 'responses', 'value' => $responsestring));
                
        $tag_label = elgg_echo('tags');
        $tag_input = elgg_view('input/tags', array('internalname' => 'polltags', 'value' => $tags));
                
        $access_label = elgg_echo('access');
        $access_input = elgg_view('input/access', array('internalname' => 'access_id', 'value' => $access_id));
                
        $submit_input = elgg_view('input/submit', array('internalname' => 'submit', 'value' => elgg_echo('save')));

        if (isset($vars['entity'])) {
        	$entity_hidden = elgg_view('input/hidden', array('internalname' => 'pollpost', 'value' => $vars['entity']->getGUID()));
        } else {
        	$entity_hidden = '';
        }

        $form_body = <<<EOT
		
		<p>
			<label>$question_label</label><br />
                        $question_textbox
		</p>
		<p>
			<label>$responses_label</label><br />
                        $responses_textbox
		</p>
		<p>
			<label>$tag_label</label><br />
                        $tag_input
		</p>
		<p>
			<label>$access_label</label><br />
                        $access_input
		</p>
		<p>
			$entity_hidden
			$submit_input
		</p>
EOT;

      echo elgg_view('input/form', array('action' => "{$vars['url']}action/$action", 'body' => $form_body));
?>
</div>

