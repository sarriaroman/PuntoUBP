<?php
	/**
	* ElggChat - Pure Elgg-based chat/IM
	* 
	* Admin page to list all the chat sessions for debugging
	* 
	* @todo remove this page
	* 
	* @package elggchat
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	* @version 0.4
	*/
	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

	admin_gatekeeper();
	
	$title = elgg_view_title(elgg_echo('elggchat:title'));
	$list = elgg_view('elggchat/list');

	$page_data = $title . $list;

	// Display main admin menu
	page_draw(elgg_echo('elggchat'), elgg_view_layout("two_column_left_sidebar", '', $page_data));
?>
