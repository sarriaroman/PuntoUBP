<?php

	/**
	 * Elgg poll listing
	 * 
	 * @package Elggpoll
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author John Mellberg
	 * @copyright John Mellberg 2009
	 */

		$owner = $vars['entity']->getOwnerEntity();
		$friendlytime = friendly_time($vars['entity']->time_created);
		$responses = $vars['entity']->countAnnotations('vote');
		//$icon = "";
		/**/
		$icon = elgg_view(
				"profile/icon", array(
										'entity' => $owner,
										'size' => 'small',
									  )
			);
		
		$info = "<p>" . elgg_echo('poll') . ": <a href=\"{$vars['entity']->getURL()}\">{$vars['entity']->question}</a></p>";
		$info .= "<p>{$responses} respuestas</p>";
		$info .= "<p class=\"owner_timestamp\"><a href=\"{$owner->getURL()}\">{$owner->name}</a> {$friendlytime}</p>";
		echo elgg_view_listing($icon,$info);

?>