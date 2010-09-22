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
	 

	// Make sure we're logged in (send us to the front page if not)
	gatekeeper();

    // make sure action is secure
    action_gatekeeper();

	// Get input data
	$question = get_input('question');
	$responses = get_input('responses');
	$tags = get_input('polltags');
	$access = get_input('access_id');
	$pollpost = get_input('pollpost');
		
	// Make sure we actually have permission to edit
	$poll = get_entity($pollpost);
	
	if ($poll->getSubtype() == "poll" && $poll->canEdit()) {
	
		$_SESSION['question'] = $question;
		$_SESSION['responses'] = $responses;
		$_SESSION['polltags'] = $tags;
			
		// Convert string of tags into a preformatted array
		$tagarray = string_to_tag_array($tags);
	
		//convert string of responses to array
		$responsearray = string_to_response_array($responses);
		
		// Make sure the title / description aren't blank
		if (empty($question) || empty($responses)) {
			register_error(elgg_echo("poll:blank"));
			forward("mod/poll/add.php");
				
		// Otherwise, save the poll post 
		} else {
				
			// Get owning user
			$owner = get_entity($poll->getOwner());
		
			// For now, set its access to public (we'll add an access dropdown shortly)
			$poll->access_id = $access;
		
			// Set its title and description appropriately
			$poll->question = $question;
			$poll->title = $question;
			// Before we can set metadata, we need to save the poll post
			if (!$poll->save()) {
				register_error(elgg_echo("poll:error"));
				forward("mod/poll/edit.php?pollpost=" . $guid);
			}
		
			//add the new responses
			$poll->clearMetadata('responses');
			
			if(is_array($responsearray))
			{
				$poll->responses = $responsearray;
			}
		
			// Now let's add tags. We can pass an array directly to the object property! Easy.
			$poll->clearMetadata('tags');
			
			if (is_array($tagarray)) {
				$poll->tags = $tagarray;
			}
		
			// Success message
			system_message(elgg_echo("poll:posted"));
			
			// Add to river
	        add_to_river('river/object/poll/update','update',$_SESSION['user']->guid,$poll->guid);
			
			// Remove the poll post cache
			unset($_SESSION['question']); 
			unset($_SESSION['responses']); 
			unset($_SESSION['polltags']);
		
			// Forward to the main poll page
			 forward("mod/poll/?username=" . $_SESSION['user']->username);
			//forward($_SERVER['HTTP_REFERER']);

								
		}
		
	}
	
	// function for turning comma delimited strings 
	// into an array for storage as metadata	
	function string_to_response_array($string) {
		
		if (is_string($string)) {
			$ar = explode(",",$string);
			$ar = array_map('trim', $ar);
			
			return $ar;
		}
		return false;
		
	}

?>
