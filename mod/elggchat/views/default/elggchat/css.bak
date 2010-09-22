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
	position: fixed;
	bottom: 0px;
	height: 25px;
	left: 0px;
	z-index: 9999;
	background: #DEDEDE;
} 

*html #elggchat_toolbar {
	position: fixed;
	bottom: 0px;
	height: 25px;
	left: 0px;
	z-index: 9999;
	background: #DEDEDE;
}

#elggchat_toolbar_left {
	border-top:1px solid #CCCCCC;
	
	float:right;
	
	padding-top: 2px;
	padding-bottom: 4px;
	
}

#elggchat_copyright{
	color: #CCCCCC;
	padding-left: 5px;
	float:left;
	display: none;
}

.session {
	float: left;
	background: #E4ECF5;
	
	border: 1px solid #4690D6;
	-webkit-border-radius: 5px; 
	-moz-border-radius: 5px;
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
	background:white;
	-webkit-border-radius: 8px; 
	-moz-border-radius: 8px;
    padding:10px;
    margin:0 5px 5px 5px;
}

.messageWrapper table{
	background: white;
	height: 0px;
}
.systemMessageWrapper {
	
	-webkit-border-radius: 8px; 
	-moz-border-radius: 8px;
    padding:3px;
    margin:0 5px 5px 5px;
	color: #999999;
}

.messageIcon {
	margin-right: 7px;
}

.messageName {
	border-bottom:1px solid #DDDDDD;
	width: 100%;
	font-weight: bold;
	color: #4690D6;
}

.chatsessiondatacontainer {
	width:200px;
	display: none;
}

.chatsessiondata{
	border: 1px solid #4690D6;
	border-bottom: 0px;
	background: #E4ECF5;
	
	-moz-border-radius-topright:5px; 
	-moz-border-radius-topleft:5px; 
	-webkit-border-top-left-radius:5px;
	-webkit-border-top-right-radius:5px;
	margin: 0 -4px;
	position:absolute;
	bottom:17px;
	width:206px;
	max-height:600px;
	overflow:hidden;
}

.chatmembers{
	border-bottom: 1px solid #DEDEDE;
	max-height:154px;
	overflow-y:auto;
}

.chatmember td{
	vertical-align: middle;
}

.chatmembers .chatmemberinfo{
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
	background: transparent url("<?php echo $CONFIG->wwwroot; ?>mod/elggchat/_graphics/online_status.png") no-repeat 0 0;
}

.online_status_idle{
	background-position: 0 -24px;
}

.online_status_inactive{
	background-position: 0 -48px;
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
	background: #FFFFFF url("<?php echo $CONFIG->wwwroot; ?>mod/elggchat/_graphics/chatwindow/chat_input.png") no-repeat 1px 50%;
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
