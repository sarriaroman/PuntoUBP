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
	 
	
	//get the num of polls the user want to display
	$limit = $vars['entity']->limit;
		
	//if no number has been set, default to 4
	if(!$limit) $limit = 3;
	
	//the page owner
	$owner_guid = $vars['entity']->owner_guid;
	$owner = page_owner_entity();
		echo "<div class=\"contentWrapper\">";
		echo "<h3>Opina en mis encuestas</h3>";
		echo "</div>";
	$polls = get_user_objects($owner_guid, 'poll', $limit, 0);
	if ($polls){
		foreach($polls as $pollpost) {
			echo elgg_view("poll/widget", array('entity' => $pollpost));
		}
	}
	else
	{
		echo "<div class=\"contentWrapper\">";
		echo "<p>" . $owner->name . " aun no ha creado una encuesta.</p>";
		echo "</div>";
	}
	
	
	//echo elgg_view("wlist/listing", array('entity' => $wishes));
	
?>