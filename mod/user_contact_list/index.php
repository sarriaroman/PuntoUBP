<?php

	/**
	 * User Contact List - Plugin
	 * 
	 * @package User Contact List
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Michael T Jones
	 * @copyright Michael T Jones 2008
	 * @link http://www.facebake.com/
	 */

require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

admin_gatekeeper();
set_context('admin');


$title = elgg_view_title(elgg_echo('userclist:title'));
$body = elgg_view('userlist/userlist');

page_draw(elgg_echo('userlist'),elgg_view_layout("two_column_left_sidebar", '', $title . $body));
?>