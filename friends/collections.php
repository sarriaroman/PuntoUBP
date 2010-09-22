<?php

	/**
	 * Elgg collections of friends
	 * 
	 * @package Elgg
	 * @subpackage Core
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.org/
	 */

	// Start engine
		require_once(dirname(dirname((__FILE__))) . "/engine/start.php");
		
	// You need to be logged in for this one
		gatekeeper();
	    
		$area2 = elgg_view_access_collections($_SESSION['user']->getGUID());
		
	// Format page
		$body = elgg_view_layout('two_column_left_sidebar', '', elgg_view_title(elgg_echo('friends:collections')) . $area2);
		
	// Draw it
		page_draw(elgg_echo('friends:collections'),$body);

?>