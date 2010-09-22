<?php 
	/**
	 * Friend request plugin
	 * CSS extensions
	 * 
	 * @package friend_request
	 * @author ColdTrick IT Solutions
	 * @copyright Coldtrick IT Solutions 2009
	 * @link http://www.coldtrick.com/
	 * @version 2.1
	 */
?>
.new_friendrequests {
	background: transparent url(<?php echo $vars['url']; ?>mod/friend_request/graphics/icons/friendrequest.png) no-repeat left -16px;
	padding: 0 0 0 18px;
	margin: 0 5px 0 5px;
}

.new_friendrequests:hover {
	text-decoration: none;
	background-position: left top;
}

.friend_request {
	margin: 0 0 5px 0;
}

.friend_request td {
	padding: 0 0 0 3px;
}

/* hide some links on profile */
.user_menu_friends_of {
	display: none;
}