<?php
	/**
	* ElggChat - Pure Elgg-based chat/IM
	* 
	* All the ElggChat CSS can be found here
	* 
	* @package elggchat
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	* @version 0.4
	*/

	require_once(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . "/engine/start.php");
	global $CONFIG;
	
	header("Content-type: text/css", true);
?>

#elggchat_toolbar {
	font-family:Verdana, Arial, Helvetica, sans-serif;
	position: fixed;
	bottom: 0px;
	height: 25px;
	left: 0px;
	z-index: 9999;
	background-color:#E5E5E5;
    border-top:1px solid #B5B5B5;
} 

*html #elggchat_toolbar {
	position: fixed;
	bottom: 0px;
	height: 25px;
	left: 0px;
	z-index: 9999;
	background-color:#E5E5E5;
}

#elggchat_toolbar_left {
	float:right;
	
	padding-top: 2px;
	padding-bottom: 4px;
}

#elggchat_copyright{
	color: #CCCCCC;
	padding-left: 1px;
	float:left;
}

.session {
	float: left;
	background: #E4ECF5;
	
	border: 1px solid #4690D6;
	/* -webkit-border-radius: 5px; 
		-moz-border-radius: 5px; */
    padding:3px;
    margin:0 5px 5px 5px;
    
    /* ie fix */
	max-width:200px;
}

.elggchat_session_new_messages {
	background: #333333;
}

.elggchat_session_new_messages.elggchat_session_new_messages_blink{
	background: #E4ECF5;
}

#elggchat_extensions{
	float:right;
	border-left:1px solid #CCCCCC;
	padding: 0 5px 0 5px;	
}

#elggchat_divisor {
	float: right;
	padding: 0 5px 0 5px;
	width: auto;
	border-left: 4px solid #CCCCCC;
}

#elggchat_friends{
	float:right;
	border-left:1px solid #CCCCCC;
	border-right:1px solid #CCCCCC;
	padding: 0 5px 0 5px;	
}

#elggchat_friends_picker{
	display: none;
	position: absolute;
	bottom: 25px;
	right: 0px;
	background: white;
	padding: 5px;
	padding-right: 20px;
	overflow-x:hidden;
	max-height:300px;
	overflow-y: auto;
	white-space: nowrap;
	border-left:1px solid #CCCCCC;
	border-top:1px solid #CCCCCC;
	-moz-border-radius-topleft:5px; 
	-webkit-border-top-left-radius:5px;	
}

.toggle_elggchat_toolbar {
	border-top:1px solid #CCCCCC;	
	width: 15px;
	height: 100%;
	float:left;
	background:transparent url(<?php echo $CONFIG->wwwroot; ?>mod/elggchat/_graphics/minimize.png) repeat-x left center;	
}

.minimizedToolbar {
	background-position: right center;
	border-right:1px solid #CCCCCC;
	-moz-border-radius-topright:5px; 
	-webkit-border-top-right-radius:5px;		
}

.messageWrapper {
	background:transparent;
	/*-webkit-border-radius: 8px; 
	-moz-border-radius: 8px;*/
    padding:4px;
    margin:0 2px 2px 2px;
}

.messageWrapper table{
	background: transparent;
	height: 0px;
}
.systemMessageWrapper {
	
	/* -webkit-border-radius: 8px; 
		-moz-border-radius: 8px; */
    padding:3px;
    margin:0 2px 2px 2px;
	color: #999999;
}

.messageIcon {
	margin-right: 8px;
}

.messageName {
	border-bottom:1px solid #DDDDDD;
	width: 100%;
	/*color: #4690D6;*/
	font-family: Arial;
   font-weight: bold;
	color: #4690D6;
}

.messageName A:hover {
	text-decoration: none;
	color: black;
}

.chatsessiondatacontainer {
	width:200px;
	display: none;
}

.chatsessiondata{
	border: 1px solid #4690D6;
	border-bottom: 0px;
	/*background: #E4ECF5;*/
	background: #F7F7F7;
	/*-moz-border-radius-topright:5px; 
	-moz-border-radius-topleft:5px; 
	-webkit-border-top-left-radius:5px;
	-webkit-border-top-right-radius:5px;*/
	margin: 0 -4px;
	position:absolute;
	bottom:17px;
	width:206px;
	max-height:600px;
	overflow:hidden;
	font-family: sans-serif;
}

.chatmembers{
	border-bottom: 1px solid #DEDEDE;
	max-height:154px;
	overflow-y:auto;
}

.chat_member{
	width: 300px;
	min-width: 300px;
	font-weight: bold;
}

.chat_member A:hover {
	text-decoration: none;
}

.chat_member:hover {
	background-color: #DEDEDE;
}

.chat_member td{
	vertical-align: middle;
}

.chatmember {
	background-color:#E4ECF5;
}

.chatmember td{
	vertical-align: middle;
}

.chatmembers .chatmemberinfo{
	font: Verdana, Geneva, sans-serif;
	width: 100%;
}
.chatmembersfunctions {
	text-align:right;
	padding-right:2px;
	height:20px;
	border-bottom: 1px solid #DEDEDE;
}
.chatmembersfunctions_invite{
	display:none;
	text-align:left;
	position:absolute;
	background: #333333;
	width:100%;
	opacity: 0.8;
	filter: alpha(opacity=80);
	max-height:250px;
	overflow-x: hidden;
	overflow-y: auto;	
}

.chatmembersfunctions_invite a {
	color: #FFFFFF;
	padding:3px;
}

.online_status_chat{
	width:24px;
	height:24px;
	background: transparent url("<?php echo $CONFIG->wwwroot; ?>mod/elggchat/_graphics/status_online.png") no-repeat 0 4px;
}

.online_status_idle{
	/*background-position: 0 -24px;*/
    background: transparent url("<?php echo $CONFIG->wwwroot; ?>mod/elggchat/_graphics/status_busy.png") no-repeat 0 4px;
}

.online_status_inactive{
	background: transparent url("<?php echo $CONFIG->wwwroot; ?>mod/elggchat/_graphics/status_offline.png") no-repeat 0 4px;
	/*background-position: 0 -48px;*/
}

.elggchat_session_leave{
	margin: 2px 0 0 4px;	
	float:right; 
	cursor: pointer;
	width:14px;
	height:14px;
	background: url("<?php echo $CONFIG->wwwroot; ?>_graphics/icon_customise_remove.png") no-repeat 0 0;
	
}

.elggchat_session_leave:hover{
	background-position: 0 -16px;
}

.chatmessages{
	min-height: 250px;
	max-height: 400px;
	overflow-y:auto;
}

.elggchatinput{
	background: #FFFFFF url("<?php echo $CONFIG->wwwroot; ?>mod/elggchat/_graphics/chatwindow/chat_input.png") no-repeat 2px 50%;
	padding-left:18px;
	border-top: 1px solid #DEDEDE;
	border-bottom: 1px solid #DEDEDE;
	height:22px;
}

.elggchatinput input{
	border: none;
	font-size:100%;
	padding: 2px;
}

.elggchatinput input:focus{
	border: none;
	background:none;
}

/*#user_toolbar A:link {
	height: 25px;
   width: 25px;
   display: block;
}
#user_toolbar A:hover {
	background-color: white;
}*/

/* #user_toolbar_item {
	display: block;
	height: 24px;
   width: 24px;
}

#user_toolbar_item:hover {
	background-color: white;
} */

#member_icon {
	position:absolute;
    margin:0px 0px 0 0;
}

#member_icon img {
	margin-left: 2px;
   margin-top:2px;
}

#member_info {
	margin-left:47px;
    font-family: Arial;
    font-weight: bold;
}

#member_info A:hover {
	text-decoration: none;
   color: black;
}

////////////////////////////////////////////////////////////////////////////////

#bb_container {
    height: 25px; 
    width: 99.8%; 
    bottom: 0px; 
    position:fixed; z-index: 10000;
}

#bb_bar {
    width: 99%;
    height: 25px;
    margin-left: auto;
    margin-right: auto;
    overflow: hidden;
    border: solid 1px #999999;
    background: #333333 url(<?php echo $vars['url']; ?>_graphics/toptoolbar_background.gif) repeat-x top left;
}

#bb_notification_top {
    color: blue;
    font-weight: 900;
    font-size: 12px;
    width: 100%;
    padding: 2px 0px 0px 0px;
}

#bb_notification_main {
    background: #ffffff;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
    -moz-border-radius-bottomright: 5px;
    -moz-border-radius-bottomleft: 5px;
    font-size: 11px;
    font-face: verdana;
}

#newPosts {
    width: 200px;
    max-height: 80%;
    right: 5px;
    bottom: 25px;
    background: #ccccdd;
    border: solid 1px #999999;
    position: fixed;
    display: none;
    z-index: 10000;
    overflow: hidden;
    padding: 0px 5px 5px 5px;
}

#bb_chat {
    width: 200px; 
    max-height: 80%;
    right: 5px;
    bottom: 25px;
    background: #ccccdd;
    border: solid 1px #999999;
    position: fixed;
    display: none;
    z-index: 10000;
    padding: 5px;
    overflow: auto;
}

#bb_friends_top {
    color: blue;
    font-size: 12px;
    width: 100%;
    padding: 0px 0px 2px 0px;
}

#bb_friends_main {
    background: #ffffff;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
    -moz-border-radius-bottomright: 5px;
    -moz-border-radius-bottomleft: 5px;
    font-size: 11px;
    font-face: verdana;
    padding: 5px;
}

#bb_friendslist {
}

#bb_friends_bartitle {
    color: white;
    font-size: 10px;
    margin-left: 5px;
}

#bb_friendslist_button {
    border-left: solid 1px #999999; 
    text-align: center;
    cursor: pointer;
}

#bb_newposts_button {
    border-left: solid 1px #999999; 
    text-align: center;
    cursor: pointer;
}

#showMine, #showAll {
    padding: 0px 10px 5px 10px;
}

/* ------- Botones ---------*/

#taskbar #container .block-left{
        position:absolute;
        float: left;
        width:10%;
        height:25px;
        left: 0px;
        bottom: 0px;
        
        border-right:1px solid #B5B5B5;
}
#taskbar #container .block-center{
        position: relative;
        float: left;
        width: 50%;
        height:25px;
        
        border-right:1px solid #B5B5B5;
}
.block-right{
        position: relative;
        float: left;
        width: 25%;
        height:25px;
        
        border-right:1px solid #B5B5B5;
}

/* ------- Botones ---------*/
.btns{
        font-family:Verdana, Arial, Helvetica, sans-serif;
        font-size:10px;
        padding:3px;
        display:inline-block;
        vertical-align:middle;
        line-height:14px;
}

.btns:hover {
	background-color: white;
    text-decoration: none;
}

.btns #bubble_number_messages {
	position: absolute;
    top: -12px;
    right: 178px;
    width: 23px;
    height: 23px;
    background-image: url(<?php echo $CONFIG->wwwroot; ?>mod/elggchat/_graphics/bubbleubp.png);
    background-repeat: no-repeat;
    color: white;
    font-weight: 500;
    padding-top: 2px;
    text-align:center;
    vertical-align: middle;
	z-index: 99999;
}

.btns #bubble_number_notifications {
	position: absolute;
    top: -12px;
    right: 205px;
    width: 23px;
    height: 23px;
    background-image: url(<?php echo $CONFIG->wwwroot; ?>mod/elggchat/_graphics/bubbleubp.png);
    background-repeat: no-repeat;
    color: white;
    font-weight: 500;
    padding-top: 2px;
    text-align:center;
    vertical-align: middle;
	z-index: 99999;
}

.btns #bubble_number_friendrequest {
	position: absolute;
    top: -12px;
    right: 232px;
    width: 23px;
    height: 23px;
    background-image: url(<?php echo $CONFIG->wwwroot; ?>mod/elggchat/_graphics/bubbleubp.png);
    background-repeat: no-repeat;
    color: white;
    font-weight: 500;
    padding-top: 2px;
    text-align:center;
    vertical-align: middle;
	z-index: 99999;
}

#latest_river {
	position: absolute;
    float: left;
    left: 0px;
    bottom: 26px;
    width: 250px;
    height: 400px;
    background-color: white;
    border: 1px solid black;
    overflow-x: hidden;
	overflow-y: auto;
    display: none;
}

<style>
.ha {
	vertical-align: middle;
	font-weight: 400;
	overflow: scroll;
	visibility: collapse;
	
	float:inherit;

}
</style>