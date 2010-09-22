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

	// Get input data
		$guid = (int) get_input('pollpost');
		
	// Make sure we actually have permission to edit
		$poll = get_entity($guid);
		if ($poll->getSubtype() == "poll" && $poll->canEdit()) {
	
		// Get owning user
				$owner = get_entity($poll->getOwner());
		// Delete it!
				$rowsaffected = $poll->delete();
				if ($rowsaffected > 0) {
		// Success message
					system_message(elgg_echo("poll:deleted"));
				} else {
					register_error(elgg_echo("poll:notdeleted"));
				}
		// Forward to the main poll page
				forward("mod/poll/?username=" . $owner->username);
		
		}
		
?>