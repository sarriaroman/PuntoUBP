<?php

	/**
	 * Most recently uploaded images
	 * 
	 */

	// Load Elgg engine
	include_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . "/engine/start.php";

	// start with assumption this is for all site photos
	$title = elgg_echo('tidypics:mostrecent');
	$user_id = 0;
	
	// is this all site or an individuals images
	$username = get_input('username');
	if ($username) {
		$user = get_user_by_username($username);
		if ($user) {
			$user_id = $user->guid;
			
			if ($user_id == get_loggedin_userid())
				$title = elgg_echo('tidypics:yourmostrecent');
			else
				$title = sprintf(elgg_echo("tidypics:friendmostrecent"), $user->name);
		}
	}

	// how many do we display
	$max = 12;
	
	// grab the html to display the images
	$images = tp_list_entities("object", "image", $user_id, $max, false, false, true);
	$images .= '<div class="clearfloat"/>'; // hack until elgg fixes problem with css/list entities html
	
	
	// this view takes care of the title on the main column and the content wrapper
	$area2 = elgg_view('tidypics/content_wrapper', array('title' => $title, 'content' => $images,));
	
	$body = elgg_view_layout('two_column_left_sidebar', '', $area2);
	
	page_draw($title, $body);
?>