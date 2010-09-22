<?php

	/**
	 * Elgg thewire CSS extender
	 * 
	 * @package ElggTheWire
	 * @license Private
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

?>

/* 
sidebar and wire widgets - 
hide owner name etc in certain situations */
.collapsable_box_content .wireownername,
.collapsable_box_content .replytolink {
	/* display:none; */
}
.collapsable_box_content .note_body {
	/* line-height:1.2em; */
}
.collapsable_box_content .contentWrapper.thewire {
	padding:5px;
	line-height: 1.2em;
	color:#333333;
/*
	background: url(<?php echo $vars['url']; ?>mod/thewire/graphics/thread_back.png) repeat-y -350px top;
*/
	
}
.collapsable_box_content .contentWrapper.thewire.more {
	padding:5px 10px;
	margin:0 10px 0 10px;	
}
.collapsable_box_content .contentWrapper .note_date {
	font-size:90%;
	color:#666666;
	padding:0;
	margin:0;
}

/* sidebar */
.sidebarBox #thewire_sidebarInputBox {
	width:178px;
}
.sidebarBox .last_wirepost {
	margin:20px 0 20px 0;
}
.sidebarBox .last_wirepost .thewire-singlepage {
	margin:0;
}
.sidebarBox .last_wirepost .thewire-singlepage .thewire_options {
	display:none;
}
.sidebarBox .last_wirepost .thewire-singlepage .note_date {
	line-height: 1em;
	padding:3px 0 0 0;
	width:142px;
}
.sidebarBox .last_wirepost .thewire-singlepage .note_body {
	color:#666666;
	line-height: 1.2em;
}
.sidebarBox .last_wirepost .thewire-singlepage .thewire-post {
	background-position: 130px bottom;
}
.sidebarBox .thewire_characters_remaining {
	float:right;
}
.sidebarBox input.thewire_characters_remaining_field {
	background: #dedede;
}
.sidebarBox input.thewire_characters_remaining_field:focus {
	background: #dedede;
	border:none;
}
.sidebarBox input#thewire_submit_button {
	margin:2px 0 0 0;
	padding:2px 2px 1px 2px;
	height:auto;
}
.sidebarBox .membersWrapper {
	background: white;
	-webkit-border-radius: 8px; 
	-moz-border-radius: 8px;
	padding:7px;	
}
.sidebarBox .membersWrapper .recentMember {
	margin:2px;
	float:left;
}
/* br necessary for ie6 & 7 */
.sidebarBox .membersWrapper br {
	height:0;
	line-height:0;
}
.sidebarBox .thewire-singlepage {
	margin:20px 0 10px 0;
}
.sidebarBox .contentWrapper {
	margin:10px 0 0 0;
}
.sidebarBox #owner_block_submenu {
	margin:10px 0 0 0;
}
/* ////////////////////////////////////////////////////////////////////////////////////////////
end wire widget old styles  */

/* override some default sylesheet rules */
/*
#two_column_left_sidebar_maincontent_boxes {
	background: #cccccc;
	float:left;
	margin:0 0 20px 0;
}
#two_column_left_sidebar_boxes {
	float:right;
}
*/




div.ajax_loader_wire {
	background: transparent url(<?php echo $vars['url']; ?>_graphics/ajax_loader.gif) no-repeat center top;
	width:auto;
	height:50px;
	margin:0;
}

/* threaded conversation on replies page */
.the_wire_conversation.replypage {
	background: url(<?php echo $vars['url']; ?>mod/thewire/graphics/thread_back.png) no-repeat 10px -8px;
	padding-top:6px;		
}

.the_wire_conversation {




	position: relative;
	display: block;
}


.replytolink,
.conversationlink {
	/* text-decoration: underline;*/
	cursor: pointer;
}
.conversationlink {
	display:inline !important;
}




.thewire-posts-wrapper {
	margin:0 10px 15px 10px;
	
	
	position: relative;
}

.thewire-post {
	position: relative;
}
.thewire-post.orphan,
.thewire-post.parent {
	background: white;
	-webkit-border-radius: 8px; 
	-moz-border-radius: 8px;
}
.thewire-conversation {
	background:white;	
	-webkit-border-radius: 8px; 
	-moz-border-radius: 8px;
	
	
	position: relative;

}
.threaded_replies_wrapper {
	background: url(<?php echo $vars['url']; ?>mod/thewire/graphics/thread_bottom.png) no-repeat 10px bottom;	
	padding-bottom:20px;
	position: relative;
}
.thewire-post.reply.latest {
	background: url(<?php echo $vars['url']; ?>mod/thewire/graphics/thread_top.png) no-repeat 10px top;	
	min-height:47px;
	-moz-border-radius-topright:8px;
	-webkit-border-top-right-radius:8px;
	
	
	position: relative;
	
}
.the_wire_conversation .discussion {
	background: url(<?php echo $vars['url']; ?>mod/thewire/graphics/thread_back.png) repeat-y 10px top;
	margin-top:-4px;	
	
	position: inherit;
}

/* IE7 */
/*
*:first-child+html .the_wire_conversation .discussion { background:none;margin-top:none;position: relative; }
*/

.thewire-post.reply {
	padding-left:15px;	
}
.the_wire_conversation .thewire-post.reply .note_body {
	border-top:1px solid #dddddd;
	margin-top: 4px;
}

.conversation_link_wrapper {
	bottom:3px;
	left:250px;
	/* margin-top:-5px; */
	position:absolute;
}
.conversation_counter_link a {
	-webkit-border-radius: 16px; 
	-moz-border-radius: 16px;
	background: white;
	border:1px solid #cccccc;
	width:auto;
	padding:0 7px 0 7px;
	text-align: center;
	color:#4690d6;
}
.conversation_counter_link a:hover {
	color:white;
	text-decoration: none;
	background: #4690d6;
	border:1px solid #4690d6;
}

.wire-post-message {
	margin-top:-4px;
	margin-right:70px;
	padding:0;
	
	overflow:hidden;
}
.wire-post-message p {
	margin-bottom:0;
	line-height: 1.25em;
}
.thewire-post.reply .wire-post-message p {
	margin-left:35px;
	
}
.thewire-post.parent .wire-post-message p,
.thewire-post.orphan .wire-post-message p  {
	margin-left:50px;
}

.thewire-post .note_date {
	font-size:90%;
	color:#666666;
	padding:0;
	margin-left:35px;
}
.thewire_icon {
    float:left;
    margin:0 8px 4px 2px;
}
.thewire-post.reply.latest .note_body {
	padding-top:10px;
}
.thewire-post.parent .note_body {
	padding-bottom:3px;
	padding-top: 2px;
}
.thewire-post.orphan .note_body {
	padding-bottom:3px;
}
.note_body {
	margin:0 4px 0 0;
	padding:6px 0 0 4px;
}

/*
the wire reply inline form
*/
.inline_reply_holder {
	background: url(<?php echo $vars['url']; ?>mod/thewire/graphics/thread_back.png) no-repeat -300px top;
	-moz-border-radius-topleft:8px;
	-moz-border-radius-topright:8px;
	-webkit-border-top-left-radius:8px;
	-webkit-border-top-right-radius:8px;
}
.thewire-post.replyform .wire_post_button,
.thewire-post.replyform .cancel_button {
	margin:2px 3px 0 5px !important;
	padding:1px !important;
	height:auto !important;
	float:right;
}


.inline_reply_holder .thewire_characters_remaining_field {
	background: transparent;
}
.inline_reply_holder .thewire_characters_remaining_field:focus {
	background: transparent;
}
.inline_reply_holder .thewire_characters_remaining {
	text-align: left;
	float:left;
}


.inline_reply_wrapper {
	border-bottom:1px solid #dddddd;
}
.thewire-post.replyform {
	margin-bottom:none;
	padding-bottom:4px;
	padding-left:15px;
	border-bottom:1px solid white;
}


/* control options */
.thewire_options {
	float:right;
	width:80px;
	position: relative;
	top:-2px;
}
.thewire_hidden_options {
	/* opacity:0.4; */
	/* display:none; */
	position: relative;
	float:right;
	top:20px;
	right:0;
	width:80px;
	/* border:1px solid red; */
}
.thewire-post.parent .thewire_hidden_options {
	top:23px;
}
.thewire-post.orphan .thewire_hidden_options {
	top:23px;
}
.thewire-post.reply.latest .thewire_options {
	top:-6px;
}
.thewire-post.reply .thewire_hidden_options {
	top:10px;
}
.thewire-post.reply.latest .thewire_hidden_options {
	top:18px;
}

.thewire-post .reply {
	position:absolute;
	cursor:pointer;
	float:right;
	background: url(<?php echo $vars['url']; ?>mod/thewire/graphics/icon_reply.png) no-repeat 4px -4px;
	text-indent: -9000em;
	display:block;
	width:26px;
	height:22px;
	top:0;
	right:3px;
}
.thewire-post .reply:hover {
	background: url(<?php echo $vars['url']; ?>mod/thewire/graphics/icon_reply.png) no-repeat 4px -30px;
}

.thewire-post .todo_link {
	cursor:pointer;
	float:right;
	background: url(<?php echo $vars['url']; ?>mod/thewire/graphics/icon_todo.png) no-repeat -2px 0px;
	text-indent: -9000em;
	display:block;
	width:21px;
	height:26px;
}
.thewire-post .todo_link:hover {
	background: url(<?php echo $vars['url']; ?>mod/thewire/graphics/icon_todo.png) no-repeat -2px -26px;
}

/*
.thewire-post .track {
	cursor:pointer;
	background: url(<?php echo $vars['url']; ?>mod/thewire/graphics/icon_track.png) no-repeat right -4px;
	text-indent: -9000em;
	display:block;
	float:right;
	width:29px;
	height:22px;
	margin:4px 0 0 0;
}
.thewire-post .track.on {
	background: url(<?php echo $vars['url']; ?>mod/thewire/graphics/icon_track.png) no-repeat right -56px;
}
.thewire-post .track.on:hover {
	background: url(<?php echo $vars['url']; ?>mod/thewire/graphics/icon_track.png) no-repeat right -56px;
}
.thewire-post .track:hover {
	background: url(<?php echo $vars['url']; ?>mod/thewire/graphics/icon_track.png) no-repeat right -30px;
}
*/

.thewire-post .delete_note {
	width:14px;
	height:14px;
	margin:0;
	float:right;
	margin:6px 2px 0 6px;
}
.thewire-post .delete_note a {
	display:block;
	cursor: pointer;
	width:14px;
	height:14px;
	background: url("<?php echo $vars['url']; ?>mod/thewire/graphics/icon_delete.png") no-repeat 0 0;
	text-indent: -9000px;
}
.thewire-post .delete_note a:hover {
	background-position: 0 -16px;
}
/* IE 6 fix */
* html .thewire-post .delete_note a { background-position-y: 2px; }
* html .thewire-post .delete_note a:hover { background-position-y: -14px; }








.post_to_wire {
	background: white;
	-webkit-border-radius: 8px; 
	-moz-border-radius: 8px;
	margin:0 10px 10px 10px;
	padding:10px;	
}



/* reply form */
textarea#thewire_large-textarea {
	width: 664px;
	height: 40px;
	padding: 6px;
	font-family: Arial, 'Trebuchet MS','Lucida Grande', sans-serif;
	/* font-size: 100%; */
	color:#666666;
}
/* IE 6 fix */
* html textarea#thewire_large-textarea { 
	width: 642px;
}





.post_to_wire .wire_post_button {
	float:right;
	margin:5px 0 0 0;
}
.thewire_latest {
	color:#999999;
	margin-right:160px;
	margin-top:5px;
	line-height: 1.2em;
	font-size: 0.9em;
}
input.thewire_characters_remaining_field { 
	color:#333333;
	border:none;
	font-size: 100%;
	font-weight: bold;
	padding:0 2px 0 0;
	margin:0;
	text-align: right;
}
input.thewire_characters_remaining_field:focus {
	border:none;
}
.thewire_characters_remaining {
	text-align: right;
	float:right;
}






#the-wire-updates-notice a.update_wire {
	display: inline-table;
	color:white;
	font-weight: bold;
	padding:1px 8px 2px 24px;
    cursor: pointer;
	background: red url("<?php echo $vars['url']; ?>mod/thewire/graphics/refresh.gif") no-repeat 5px 3px;
    -webkit-border-radius: 10px; 
    -moz-border-radius: 10px;    
}
#the-wire-updates-notice a.update_wire:hover {
	background: #000099 url("<?php echo $vars['url']; ?>mod/thewire/graphics/refresh.gif") no-repeat 5px -22px;
	color:white;
	text-decoration: none;
}




#page_tabs {
	height:26px;
	margin-bottom: 10px;
	background: white;
	display: block;
}
#page_tabs ul {
	padding:0;
	margin:0;
}
#page_tabs ul li {
	list-style: none;
	display: inline;
	padding:0;
	margin:0 5px 0 0;
}
#page_tabs li {
	float: left;
}
#page_tabs a {
	text-decoration: none;
	display: block;
	padding:3px 10px 0 10px;
	color: #999999;
	text-align: center;
	height:23px;
	font-size: 1.2em;
	font-weight: bold;
	background: #eeeeee;
	-moz-border-radius-topleft:8px;
	-moz-border-radius-topright:8px;	
	-webkit-border-top-left-radius:8px;
	-webkit-border-top-right-radius:8px;
}
/* IE6 fix */
* html #page_tabs a { display: inline; }

#page_tabs a:hover {
	color: #4690d6;
	background: #dedede;
}
#page_tabs .selected a {
	position: relative;
	top: 2px;
	background: #cccccc;
	color: #333333;
}
/* IE6 fix */
* html #page_tabs .selected a { /* top: 3px; */ }


