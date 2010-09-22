<?php
	/**
	 * return comments for ajax request
	 *
	 * @package ImprovedRiverDashboard
	 */
	/**
	 * @author Snow.Hellsing <snow@firebloom.cc>
	 * @copyright FireBloom Studio
	 * @link http://firebloom.cc
	 */
	$guid = get_input('guid');
        if( $guid == "undefined" ) return;
	
	echo list_annotations($guid,'generic_comment',comment_limit);
?>