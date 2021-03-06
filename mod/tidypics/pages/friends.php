<?php
	/**
	 * Tidypics Friends Albums Listing
	 * 
	 * List all the albums of someone's friends
	 */

	include_once dirname(dirname(dirname(dirname(__FILE__)))) . "/engine/start.php";

	$username = get_input('username');

	// if no username, redirect to world photo albums
	if (!$username) {
		forward('pg/photos/world');
	}

	// setup title
	$user = get_user_by_username($username);
	if (!$user) {
		forward('pg/photos/world');
	}
	if ($user->guid == get_loggedin_userid())
		$title = elgg_echo('album:yours:friends');
	else
		$title = sprintf(elgg_echo('album:friends'), $user->name);
	
	$area2 = elgg_view_title($title);
	
	// get html for viewing list of photo albums
	set_context('search');
	set_input('search_viewtype', 'gallery'); // need to force gallery view
	$area2 .= list_user_friends_objects($user->guid, 'album', 10, true, false);
	
	
	$body = elgg_view_layout('two_column_left_sidebar', '', $area2);
	
	page_draw($title, $body);
?>