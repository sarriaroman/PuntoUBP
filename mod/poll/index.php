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
	 
	 
	// Load Elgg engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
	// Get the current page's owner
		$page_owner = page_owner_entity();
		if ($page_owner === false || is_null($page_owner)) {
			$page_owner = $_SESSION['user'];
			set_page_owner($_SESSION['guid']);
		}

	//set poll title
		if($page_owner == $_SESSION['user']){
			$area2 = elgg_view_title(elgg_echo('poll:your'));
		}else{
			$area1 = elgg_view_title($page_owner->username . "'s " . elgg_echo('poll'));
		}
		
	// Get a poll posts
		$polls = $page_owner->getObjects('poll',50,0);
		
		foreach($polls as $poll)
		{
			//$area2 .= elgg_echo($poll->question);
			$area2 .= elgg_view("poll/listing", array('entity' => $poll));
		}

		
	// Display them in the page
        $body = elgg_view_layout("two_column_left_sidebar", '', $area2);
		
	// Display page
		page_draw(sprintf(elgg_echo('poll:user'),$page_owner->name),$body);
		
?>