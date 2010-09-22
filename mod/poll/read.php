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

	// Get the specified poll post
		$post = (int) get_input('pollpost');
		
		//$area1 = $post;
		//$area1 = $_SESSION['user']->username; 

	// If we can get out the poll post ...
		if ($pollpost = get_entity($post)) {
			
	// Get any comments
			$comments = $pollpost->getAnnotations('comments');
		
	// Set the page owner
			set_page_owner($pollpost->getOwner());
			$page_owner = get_entity($pollpost->getOwner());
											
	// Set the title appropriately
		//$title = sprintf(elgg_echo("poll:user"),$page_owner->name);		
	
	//set title
			//$area2 = elgg_view_title($title);
			
	// Display it
			$area2 .= elgg_view("object/poll",array(
											'entity' => $pollpost,
											'entity_owner' => $page_owner,
											'comments' => $comments,
											'full' => true
											));
	

	// Display through the correct canvas area
		$body = elgg_view_layout("two_column_left_sidebar", '', $area1 . $area2);
			
	// If we're not allowed to see the poll post
		} else {
			
	// Display the 'post not found' page instead
			$body = elgg_view("poll/notfound");
			$title = elgg_echo("poll:notfound");
			
		}
		
	// Display page
		page_draw($title,$body);
		
?>