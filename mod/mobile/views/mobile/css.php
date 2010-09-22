<?php 

/**
 * Elgg Mobile
 * A Mobile Client For Elgg
 *
 * @package Elgg
 * @subpackage Core
 * @author Mark Harding
 * @link http://maestrozone.com
 *
 */
 ?>
body {
	text-align:left;
	margin:0 auto 0 auto;
	padding:0;
	font: 12px  "Lucida Grande", Verdana, sans-serif;
	color: #333333;
	background: #FFF;	
}
a {
	color: #cc3300;
	text-decoration: none;
	-moz-outline-style: none;
	outline: none;
}
a:visited {
	
}
a:hover {
	color: #cc3300;
	text-decoration: underline;
}
p {
	margin: 0px 0px 15px 0;
}
img {
	border: none;
}
ul {
	margin: 5px 0px 15px;
	padding-left: 20px;
}
ul li {
	margin: 0px;
}
ol {
	margin: 5px 0px 15px;
	padding-left: 20px;
}
ul li {
	margin: 0px;
}
form {
	margin: 0px;
	padding: 0px;
}
small {
	font-size: 90%;
}
h1, h2, h3, h4, h5, h6 {
	font-weight: bold;
	line-height: normal;
}
h1 { font-size: 1.8em; }
h2 { font-size: 1.5em; }
h3 { font-size: 1.2em; }
h4 { font-size: 1.0em; }
h5 { font-size: 0.9em; }
h6 { font-size: 0.8em; }

dt {
	margin: 0;
	padding: 0;
	font-weight: bold;
}
dd {
	margin: 0 0 1em 1em;
	padding: 0;
}
pre, code {
	font-family:Monaco,"Courier New",Courier,monospace;
	font-size:12px;
	background:#EBF5FF;
	overflow:auto;
}
code {
	padding:2px 3px;
}
pre {
	padding:3px 15px;
	margin:0px 0 15px 0;
	line-height:1.3em;
}
blockquote {
	padding:3px 15px;
	margin:0px 0 15px 0;
	line-height:1.3em;
	background:#fdffc3;
	border:none !important;
}    
   
    
/* ! ////// PAGE LAYOUT - MAIN STRUCTURE */
#two_column_left_sidebar{
margin:0px;
}
#two_column_left_sidebar_content{
margin:0px;
}
#page_container {
	margin-top: 0px;
	padding:0;
top:0px;
	
}
#page_wrapper {
	width:100%;
	margin:0 auto;
	padding:0;


}
#layout_header {
	background:#333333 url(<?php echo $vars['url']; ?>mod/mobile/graphics/toptoolbar_background.gif) repeat-x top left;
	overflow:hidden;
	padding: 0;
	margin:0;	
position:absolute;
width:100%;
top:0;

}
#wrapper_header {
	margin:0 auto 0 auto;
	padding:0;
}

#logo {
	margin:3px auto 0px auto;
    width: 38px;

}
#wrapper_header .navigation {
	padding:0;
	letter-spacing: -0.03em;
	color:white;
	color:#fff;
	font-size:12px;
	margin:0px;
    position:relative;
width:100%;
z-index:9999999;
}

#layout_canvas {
	padding-top:20px;
	background:#FFF;
	margin:30px 0px 0 0px;
	min-height: 323px;
	position:relative;
    width:100%;
    overflow:hidden;

 
}



/* IE 6 fixes */
* html #widgets_left { 
	height:360px;
}
* html #widgets_middle { 
	height:360px;
}
* html #widgets_right { 
	height:360px;
	float:none;
}

/* IE6 layout fixes */
* html #profile_info_column_left {
	margin:0 10px 0 0;
}
/* IE7 */
*:first-child+html #profile_info_column_left {

}
* html #two_column_left_sidebar {
	margin:0px 0 10px 18px;
}
* html #two_column_left_sidebar_maincontent {
	width:100%;
}
* html a.toggle_customise_edit_panel { 
	float:none;
	clear:none;
	color: #874425;
	background: white;
	border:1px solid #cccccc;
	padding: 5px 10px 5px 10px;
	margin:0px 28px 20px 20px;
	width:266px;
	display:block;
	text-align: left;
}

* html #dashboard_info {
	width:525px;
}


/* ! ////// FOOTER */
#layout_footer {
height:30px;
width:100%;
background:#333;
position:relative;
margin:0px;
line-height:30px; 
border-top:1px solid white;
-webkit-border-radius: 0px
}
#layout_footer table {
   margin:10px 0 0 10px;
}
#layout_footer a, #layout_footer p {
   color:#000;
   margin:0;
}
#layout_footer .footer_toolbar_links {
	color:#cccccc;
	text-align:right;
	padding:28px 40px 0 40px;
	font-size:1.0em;
	
}
#layout_footer .footer_toolbar_links a:hover {
	color:black;
}
#layout_footer .footer_legal_links {
	text-align:right;
	color:#999;
	padding:0 10px 0 0;
}
.footer_copywrite p{
	color:#999;
	padding-left:37px;
}
img.elggbadge {
	padding:28px 0 0 40px;
}

#page_bottom_links { 
    color:#688A02;
    margin: 0 0 0 40px;
padding-bottom:30px;
}

#page_bottom_links a {
    text-decoration:none;
    color:#688A02;
}

#page_bottom_links a:hover {
    text-decoration:underline;
    color:000;
}

#links_column {
    float:left;
    width:150px;
    margin: 0px 24px 20px 10px;
}

#links_column strong {
	text-transform: uppercase;
}

/* IE6 */
* html #links_column { margin: 0px 24px 20px 5px; } 


/* ! ////// HORIZONTAL TOP TOOLBAR */
#elgg_topbar {
margin:0px; 
padding:0px;
	width: 100%;
	height: 27px;
background:#333333 ;
    z-index:9000;
left:0px;
    
}
.nav  {
	background-repeat: repeat-x;
	width: 100%;
	height: 27px;
	margin: 0px 0 0 0px;
    position:relative;
	border-bottom:1px solid #ccc;
    border-top:1px solid #ccc;
left:0px;
    
}

#elgg_topbar_container_left {
	float:left;
	height:27px;
	position:absolute;
	text-align:center;
	width:100%;
}
#chat_menu{
 z-index:9999;
}


#elgg_topbar_container_left .toolbarimages {
	float:left;
	margin-right:20px;
}

#elgg_topbar_container_left .toolbarlinks {
	margin:0 0 10px 0;
	float:left;
width:100%;

}


#elgg_topbar_container_left .toolbarlinks ul{
	margin:0 0 10px 0;
	float:left;
    list-style:none;
width:100%;
padding:0;

}
#elgg_topbar_container_left .toolbarlinks li{
	margin:0;
	float:left;
    list-style:none;
width:25%;


}

#elgg_topbar_container_left .toolbarlinks2 {
	margin:4px 0 0 0;
	float:left;
}

#elgg_topbar_container_left a.loggedinuser {
	color:#0000;
	font-weight:bold;
	margin:0 0 0 5px;
}
#elgg_topbar_container_left a.pagelinks {
	color:#ffffff;
	margin:0 auto 0 auto;
	display:block;
	padding:4px 0 4px 0;
	font-weight:bold;
height:100%

}
#elgg_topbar_container_left a.pagelinks:hover {
	background: #999;
	text-decoration: none;
	color:#ffffff;
	height:19px;
}


/* ! ////// SYSTEM MESSAGES */
.messages {
    padding-top:5px;
        padding-bottom:5px;
    background:#ccffcc;
    color:#000000;
	width:100%;
    position:relative;
    text-align:center;
}
.messages_error {
    border:4px solid #D3322A;
    background:#F7DAD8;
    color:#000000;
    padding:3px 10px 3px 10px;
    z-index: 8000;
	margin:0 0 0 7px;
	position:fixed;
	top:2px;
	width:927px;
	-webkit-border-radius: 5px; 
	-moz-border-radius: 5px;
	cursor: pointer;
}
.closeMessages {
	float:right;
	margin-top:17px;
}
.closeMessages a {
	color:#666666;
	cursor: pointer;
	text-decoration: none;
	font-size: 80%;
}
.closeMessages a:hover {
	color:black;
}

/* ! ////// GENERAL FORM ELEMENTS */
label {
	font-weight: bold;
	color:#333333;
	font-size: 140%;
}
input {
	font: 120% Arial, Helvetica, sans-serif;
	padding: 5px;
	border: 1px solid #cccccc;
	color:#666666;
	background: #eeeeee;
}
textarea {
	font: 120% Arial, Helvetica, sans-serif;
	border: solid 1px #cccccc;
	padding: 5px;
	color:#666666;
	background: #eeeeee;
}
textarea:focus, input[type="text"]:focus, input[type="password"]:focus {
	border: solid 1px #688A02;
	background: white;
	color:#333333;
}

input[type="submit"].submit_button {
	font: 14px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #ffffff;
	background:#333 url(<?php echo $vars['url']; ?>mod/mobile/graphics/submit.png) repeat;
	border:solid 0px;
	-webkit-border-radius: 0px; 
	width: 125px;
	height: 25px;
	padding: 2px 6px 2px 6px;
	margin:0px 20px 10px 0;
	cursor: pointer;
    float:right;
}
.submit_button:hover, input[type="submit"]:hover {
	background: #cc3300;
}

input[type="submit"] {
	font: 12px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #ffffff;
	background:#688A02;
	border:none;
	-webkit-border-radius: 0px; 
	-moz-border-radius: 0px;
	width: auto;
	height: 25px;
	padding: 2px 6px 2px 6px;
	margin:10px 0 10px 0;
	cursor: pointer;
}

.cancel_button {
	font: 12px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #999999;
	background:#dddddd;
	border: none;
	-webkit-border-radius: 0px; 
	-moz-border-radius: 0px;
	width: auto;
	height: 25px;
	padding: 2px 6px 2px 6px;
	margin:10px 0 10px 10px;
	cursor: pointer;
}
.cancel_button:hover {
	background: #cccccc;
}

.input-text,
.input-pulldown,
.input-tags,
.input-url,
.input-textarea {
	width:98%;
}

.input-textarea {
	height: 200px;
}


/* ! ////// LOGIN / REGISTER */
#login-box {
    text-align:left;
}
#login-controls {
	padding-top:15px;
    text-align:center;
    width:100%;
}
#login-box h2{
    padding:5px 0 5px 0;
height:25px;
	color:black;
	font-size:1.25em;
}
#login-box .login-textarea {
	width:90%;
    margin-left:5%;
    height:40px;
}
.register-textarea {
	width:96.5%;
    height:20px;
    -webkit-border-radius: 0px;
}
#submit_mobile_login{
	font: 14px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #ffffff;
	background:#333 url(<?php echo $vars['url']; ?>mod/mobile/graphics/submit.png) repeat;
	border:solid 0px;
	-webkit-border-radius: 0px; 
	width: 125px;
	height: 25px;
	padding: 2px 6px 2px 6px;
	margin:0px 20px 10px 0;
	cursor: pointer;
    float:right;
}
#login-box label,
#register-box label {
	font-size: 12px;
	color:#000;
}
#login-box p.loginbox {
	margin:0px 0 0 10px;
}
#login-box input[type="text"],
#login-box input[type="password"],
#register-box input[type="text"],
#register-box input[type="password"] {
	margin:0 0 10px 0;
}

#login-box-openid {
	margin: 10px;
    text-align:left;
    padding:10px;
    background: #ffffff;
}
#register-box h2{
	height:25px;
	color:black;
	font-size:12px;
	margin:0;
}
#register-box {
    text-align:left;
    border:0px ;
    width:100%;
    padding:0;
    margin:0 0px 0 0;
float:left;
}
#register-box-info {
    text-align:left;
width:55%;
    border-bottom:1px solid white;
    padding:0;
    margin:0 20px 0 28px;
float:right;
}
#persistent_login label {
	font-size:1.0em;
	font-weight: normal;
    padding-left:2%;
}
#forgotten_box {
	width:655px;
}


/* ! ////// PROFILE */
#profile_info_column_middle .profile_status {
	background:#bbdaf7;
	-webkit-border-radius: 4px; 
	-moz-border-radius: 4px;
	padding:2px 4px 2px 4px;
	line-height:1.2em;
}
#profile_info_column_middle .profile_status span {
	display:block;
	font-size:90%;
	color:#666666;	
}
#profile_info_column_middle a.status_update {
	float:right;	
}
#profile_info {
	margin:0 0 4px 0;
	padding:5px 0 5px 0;
background-color:#999;
float:left;
width:100%;
}
#profile_info_column_left {
	float:left;
	padding: 0;
	margin:0 10px 0 0;
}
#profile_info_column_middle {
	float:left;	
	padding: 0;
    width:65%;
    overflow:hidden;
}

#profile_info_column_right .profile_status {
	-webkit-border-radius: 4px; 
	-moz-border-radius: 4px;
	padding:2px 4px 20px 0px;
	line-height:1.2em;
width:330px;
margin:5px 0 5px 0 ;
text-align:left;
font-weight:bold;
}
#profile_info_column_right .profile_status a.status_update, #profile_info_column_right .profile_status span{
font-weight:normal;
font-size:8px;
float:right;
padding-left:2px;
text-align:right;
}

#profile_info_column_middle p {
	margin:7px 0 7px 0;
	padding:2px 4px 2px 4px;
    font-size:10px;
}
/* profile owner name */
#profile_info_column_middle h2 {
	padding:0 0 0px 0;
	margin:0;
 color:#333;
font-size:14px;
}
#profile_info_column_middle h2 a{
	padding:0 0 0px 0;
	margin:0;
 color:#333;
font-size:14px;
}
#profile_info_column_middle .odd {
	background:transparent;
}
#profile_info_column_right p {
	margin:0 0 7px 0;
}
#profile_info_column_right .profile_aboutme_title {
	margin:0;
	padding:0;
	line-height:1em;
}
/* edit profile button */
.profile_info_edit_buttons {
	float:right;
	margin:0  !important;
	padding:0 !important;
	font-size: 90%;
}

/* ! ////// RIVER */
#river{
margin-left:2px;
}
.river_profile_icon{
position:absolute;
height:40px;
width:40px;
overflow:hidden;
}
.river_item{
min-height:50px;

margin-bottom:15px;
}
.river_show{
margin-left:20px;
}
.river_content{
margin-left:30px;
}
#profileriver{

width:99%;
padding-left:1%;
}
.activity_item p {
	margin:0;
	padding:2px 0 0 0;
	line-height:1.1em;
	min-height:17px;	
}
.activity_item .activity_item_time {
	font-size:90%;
	color:#666666;
}
.river_item p {
	margin:0;
	padding:2px 0 0 25px;
	line-height:1.1em;
	min-height:17px;
}
.river_item {
	border-bottom:1px solid #dddddd;
	padding:2px 0 2px 0;
}
.river_item_time {
	font-size:90%;
	color:#666666;
}

.river_user_update {
padding-right:2px;
}
.river_user_profileupdate {
padding-right:2px;
}
.river_user_profileiconupdate {
padding-right:2px;
}
.river_annotate {
}
.river_create {
}
.river_object_bookmarks_create {
}
.river_object_bookmarks_comment {
}
.river_status_create {
}
.river_file_create {
}
.river_widget_create {
}
.river_forums_create {
}
.river_forums_update {
}
.river_user_messageboard {
}
.river_widget_update {
}
.river_blog_create {
}
.river_blog_update {
}
.river_forumtopic_create {
}
.river_relationship_friend_create {
}
.river_relationship_member_create {
}
.river_izap_videos {
}
.river_image_created {
}
.river_image_item {
}
.river_object_thewire_create {
}

/* ! ////// GENERIC COMMENTS */

.generic_comment_owner {
	font-size: 90%;
	color:#666666;
}

.generic_comment {
	margin-bottom: 10px;
	padding-bottom: 10px;
}

.generic_comment_icon {
	float:left;
}

.generic_comment_details {
	margin-left: 60px;
	border-bottom: 1px solid #aaaaaa;
}

.generic_comment_owner {
	color:#666666;
	margin: 0px;
	font-size:90%;
}

	
/* ! ////// OWNER BLOCK */

#owner_block {
	margin-top:0px;
	padding:10px;
}
#owner_block_rss_feed,
#owner_block_odd_feed,
#owner_block_bookmark_this,
#owner_block_report_this {
	padding:2px 0 3px 0;
}
#owner_block_report_this {
	border-bottom:1px solid #874425;
}
#owner_block_rss_feed a {
	font-size: 90%;
	color:#333333;
	padding:0 0 4px 20px;
	background: url(/_graphics/icon_rss.gif) no-repeat left top;
}
#owner_block_odd_feed a {
	font-size: 90%;
	color:#333333;
	padding:0 0 4px 20px;

}
#owner_block_bookmark_this a {
	font-size: 90%;
	color:#333333;
	padding:0 0 4px 20px;
}
#owner_block_report_this a {
	font-size: 90%;
	color:#333333;
	padding:0 0 4px 20px;
}
#owner_block_rss_feed a:hover,
#owner_block_odd_feed a:hover,
#owner_block_bookmark_this a:hover,
#owner_block_report_this a:hover {
	color: white;
}

#owner_block_desc {
	padding:4px 0 4px 0;
	margin:0 0 0 0;
	line-height: 1.2em;
	border-bottom:1px solid #874425;
	color:#333333;
}
#owner_block_content {
	margin:0 0 4px 0;
	padding:3px 0 0 0;
	min-height:35px;
	font-weight: bold;
}
.ownerblockline {
	padding:0;
	margin:0;
	border-bottom:1px solid #874425;
	height:1px;
}
#owner_block_submenu {
	margin:0px;
	padding: 0;
	width:100%;
}

#owner_block_submenu ul {
	list-style: none;
	padding: 0;
	margin: 0;
}
#owner_block_submenu ul li.selected a {
	padding-left:10px;
}
#owner_block_submenu ul li a {
	text-decoration: none;
	display: block;
	padding: 0;
	margin: 0;
	color:#333333;
	padding:4px 6px 4px 10px;
	border-top: 1px solid #cccccc;
	font-weight: bold;
	line-height: 1.1em;
}
#owner_block_submenu ul li a:hover {
	color:#000000;
	background: #cccccc;
}
*:first-child+html #owner_block_submenu ul li.selected a {
	background-position: left 8px;
}
#owner_block_submenu .submenu_group {
	border-bottom: 1px solid #cccc;
	margin:22px 0 0 0;
}
/* filetypes filter menu */
#owner_block_submenu .submenu_group .submenu_group_filetypes ul li a {
	color:#cccccc;
}
#owner_block_submenu .submenu_group .submenu_group_filetypes ul li.selected a {
}
#owner_block_submenu .submenu_group .submenu_group_filetypes ul li a:hover {
	color:white;
	background: #874425;
}
/* pages actions menu */
#owner_block_submenu .submenu_group .submenu_group_pagesactions ul li a {
	color:#874425;
}
#owner_block_submenu .submenu_group .submenu_group_pagesactions ul li.selected a {
}
#owner_block_submenu .submenu_group .submenu_group_pagesactions ul li a:hover {
	color:white;
	background: #874425;
}

/* ! ////// PAGINATION */

.pagination {
	margin:10px 0 20px 0;
}

.pagination .pagination_number {
	display:block;
	float:left;
	background:#ffffff;
	border:1px solid #688A02;
	text-align: center;
	color:#688A02;
	font-size: 12px;
	font-weight: normal;
	margin:0 6px 0 0;
	padding:0px 4px;
	cursor: pointer;
}
.pagination .pagination_number:hover {
	background:#688A02;
	color:white;
	text-decoration: none;
}
.pagination .pagination_more {
	display:block;
	float:left;
	background:#ffffff;
	border:1px solid #ffffff;
	text-align: center;
	color:#688A02;
	font-size: 12px;
	font-weight: normal;
	margin:0 6px 0 0;
	padding:0px 4px;
}

.pagination .pagination_previous,
.pagination .pagination_next {
	display:block;
	float:left;
	border:1px solid #688A02;
	color:#688A02;
	text-align: center;
	font-size: 12px;
	font-weight: normal;
	margin:0 6px 0 0;
	padding:0px 4px;
	cursor: pointer;
}
.pagination .pagination_previous:hover,
.pagination .pagination_next:hover {
	background:#688A02;
	color:white;
	text-decoration: none;
}
.pagination .pagination_currentpage {
	display:block;
	float:left;
	background:#688A02;
	border:1px solid #688A02;
	text-align: center;
	color:white;
	font-size: 12px;
	font-weight: bold;
	margin:0 6px 0 0;
	padding:0px 4px;
	cursor: pointer;
}

/* ! ////// FRIENDS COLLECTIONS ACCORDIAN */
	
ul#friends_collections_accordian {
	margin: 0 0 0 0;
	padding: 0;
	border-bottom:1px solid #cccccc;
}
#friends_collections_accordian li {
	margin: 0 0 0 0;
	padding: 0;
	list-style-type: none;
	color: #666666;
}
#friends_collections_accordian li h2 {
	background:#efefef;
	color: #999999;
	padding:4px 2px 4px 6px;
	margin:0;
	border-top:1px solid #cccccc;
	font-size:1.2em;
	cursor:pointer;
}
#friends_collections_accordian li h2:hover {
	background:#688A02;
	color:white;
}

#friends_collections_accordian .friends_picker {
	background:white;
	padding:0;
	display:none;
}
#friends_collections_accordian .friends_collections_controls {
	font-size:70%;
	float:right;
}
#friends_collections_accordian .friends_collections_controls a {
	color:#999999;
	font-weight:normal;
}

div.expandall {
	margin: 20px 0 0 0;
	padding:0;
}
div.expandall p {
	cursor:pointer;
	color:#999999;
	text-align:right;
	margin: 0;
	padding:0;
}
	
/* ! ////// FRIENDS PICKER SLIDER */
		
.friendsPicker_container h3 { font-size:3em; text-align: left; margin:0 0 20px 0; color:#999999; }

.friendsPicker .friendsPicker_container .panel ul {
	text-align: left;
	margin: 0;
	padding:0;
}

.friendsPicker_wrapper {
	margin: 0;
	padding:0;
	position: relative;
	width: 100%;
}

.friendsPicker {
	position: relative;
	overflow: hidden; 
	margin: 0;
	padding:0;
	width: 656px;
	height: 300px;
	/*clear: right;*/
	background: white;
}

.friendsPicker .friendsPicker_container { /* long container used to house end-to-end panels. Width is calculated in JS  */
	position: relative;
	left: 0;
	top: 0;
	width: 100%;
	list-style-type: none;
}

.friendsPicker .friendsPicker_container .panel {
	float:left;
	height: 100%;
	position: relative;
	width: 656px;
	margin: 0;
	padding:0;
}

.friendsPicker .friendsPicker_container .panel .wrapper {
	margin: 0;
	padding: 10px;
	background: #efefef;
	min-height: 230px;
}

.friendsPickerNavigation {
	margin: 0 0 10px 0;
	padding:0;
}

.friendsPickerNavigation ul {
	list-style: none;
	padding-left: 0;
}

.friendsPickerNavigation ul li {
	float: left;
	margin:0;
	background:white;
}

.friendsPickerNavigation a {
	font-weight: bold;
	text-align: center;
	background: white;
	color: #999999;
	text-decoration: none;
	display: block;
	padding: 0;
	width:20px;
}

.tabHasContent {
	background: white; color:#333333 !important;
}

.friendsPickerNavigation li a:hover {
	background: #333333;
	color:white !important;
}

.friendsPickerNavigation li a.current {
	background: #688A02;
	color:white !important;
}

.friendsPickerNavigationAll {
	margin:0px 0 0 20px;
	float:left;
}
.friendsPickerNavigationAll a {
	font-weight: bold;
	text-align: left;
	font-size:0.8em;
	background: white;
	color: #999999;
	text-decoration: none;
	display: block;
	padding: 0 4px 0 4px;
	width:auto;
}
.friendsPickerNavigationAll a:hover {
	background: #688A02;
	color:white;
}

.friendsPickerNavigationL, .friendsPickerNavigationR {
	position: absolute;
	top: 46px;
	text-indent: -9000em;
}

.friendsPickerNavigationL a, .friendsPickerNavigationR a {
	display: block;
	height: 43px;
	width: 43px;
}

.friendsPickerNavigationL {
	right: 58px;
	z-index:1;
}

.friendsPickerNavigationR {
	right: 10px;
	z-index:1;
}

.friendsPickerNavigationL {
}
.friendsPickerNavigationR {
}
.friendsPickerNavigationL:hover {
}
.friendsPickerNavigationR:hover {
}	

.friends_collections_controls a.delete_collection {
	display:block;
	cursor: pointer;
	width:14px;
	height:14px;
	margin:0 3px 0 0;
	background: url("/_graphics/icon_customise_remove.png") no-repeat 0 0;
}
.friends_collections_controls a.delete_collection:hover {
	background-position: 0 -16px;
}


/* picker tabbed navigation */
#friendsPickerNavigationTabs {
	margin:10px 0 10px 0;
	padding: 0;
	border-bottom: 1px solid #cccccc;
	display:table;
	width:100%;
}

#friendsPickerNavigationTabs ul {
	list-style: none;
	padding: 0;
	margin: 0;
}

#friendsPickerNavigationTabs li {
	float: left;
	border: 1px solid #ffffff;
	border-bottom-width: 0;
	margin: 0;
}

#friendsPickerNavigationTabs a {
	text-decoration: none;
	display: block;
	padding: 0.22em 1em;
	color: #666666;
	text-align: center;
}

#friendsPickerNavigationTabs a:hover {
	color: #688A02;
}

#friendsPickerNavigationTabs .selected {
	border-color: #cccccc;
}

#friendsPickerNavigationTabs .selected a {
	position: relative;
	top: 1px;
	background: white;
	color: #874425;
}
	
/* ! ////// BREADCRUMBS */

#pages_breadcrumbs {
	font-size: 80%;
	color:#999999;
	padding:0;
	margin:0 0 10px 0;
}
#pages_breadcrumbs a {
	color:#999999;
	text-decoration: none;
}
#pages_breadcrumbs a:hover {
	color: #874425;
	text-decoration: underline;
}


/* ! ////// MISC */

/* general page titles in main content area */
#content_area_user_title {	
	height:30px;
	margin:0 0 10px 0;
	padding:0 0 10px 0px;
}
#content_area_user_title h2 {
	padding:5px 0 0 0px;
	color:#000000;
	font-size:24px;
}
#sidebar_page_tree {
	margin-top:20px;
}

#sidebar_page_tree h3 {
	color:white;
	height:25px;
	margin:0 0 10px 0;
	font-size:1.25em;
	line-height:1.2em;
	padding:5px 0 0 30px;
}	

/* tag icon */	
.object_tag_string {
	background: url(/_graphics/icon_tag.gif) no-repeat left 2px;
	padding:0 0 0 14px;
	margin:0;
}	
 

#mobile_elgg{
float:left;
margin:8px 0 0 10px;
}
#mobile_logout{
float:right;
margin:0px 10px 0 0;
color:#FFF;
}
#mobile_logout a{
margin:0px 10px 0 0;
color:#FFF;
}

.profile_nav{
margin:2px 0 4px 0;
padding:10px 0 4px 0;
border-bottom:1px solid #ccc;
width:100%;
background:#CCC;
text-align:center;
color:#FFF;
}
.profile_nav a{
color:#333;
padding: 0 9px 0 9px;
}


#statusupdate{
width:100%
margin:0 0 10px 0;
position:relative;
height:79px;
}
#statusupdate h3{
padding:2px 0 0px 2px; 
margin:0px;
}
.statusbox{
	font: 120% Arial, Helvetica, sans-serif;
	border-top: solid 1px #cccccc;
    border-bottom: solid 1px #cccccc;
    border-left:none;
    border-right:none;
	padding: 5px 0 0 0;
	color:#666666;
	background: #eeeeee;
    width:100%;
    -webkit-border-radius: 0px; 
    margin:0;
}
#submit_mobile{
	font: 14px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #ffffff;
	background:#333 url(<?php echo $vars['url']; ?>mod/mobile/graphics/submit.png) repeat;
	border:solid 0px;
	-webkit-border-radius: 0px; 
	width: 125px;
	height: 25px;
	padding: 2px 6px 2px 6px;
	margin:0px 0 10px 0;
	cursor: pointer;
    float:right;
}
.mobilecopy{
font-size:10px;
color:#333;
padding:0px;
margin:auto;
position:relative;
width:100%;
text-align:center;
}
.input_textarea{
width:100%;
}
.gallerywrap{
width:200px;
overflow:hidden;
}
table.entity_gallery {
	width:200px;
}

/* ***************************************
	SEARCH LISTINGS	
*************************************** */
.search_listing {
	display: block;
	-webkit-border-radius: 8px; 
	-moz-border-radius: 8px;
	background:white;
	margin:0 10px 5px 10px;
	padding:5px;
}
.search_listing_icon {
	float:left;
}
.search_listing_icon img {
	width: 40px;
}
.search_listing_icon .avatar_menu_button img {
	width: 15px;
}
.search_listing_info {
	margin-left: 50px;
	min-height: 40px;
}
/* IE 6 fix */
* html .search_listing_info {
	height:40px;
}
.search_listing_info p {
	margin:0 0 3px 0;
	line-height:1.2em;
}
.search_listing_info p.owner_timestamp {
	margin:0;
	padding:0;
	color:#666666;
	font-size: 90%;
}
table.search_gallery {
	border-spacing: 10px;
	margin:0 0 0 0;
}
.search_gallery td {
	padding: 5px;
}
.search_gallery_item {
	background: white;
	-webkit-border-radius: 8px; 
	-moz-border-radius: 8px;
	width:170px;
}
.search_gallery_item:hover {
	background: black;
	color:white;
}
.search_gallery_item .search_listing {
	background: none;
	text-align: center;
}
.search_gallery_item .search_listing_header {
	text-align: center;
}
.search_gallery_item .search_listing_icon {
	position: relative;
	text-align: center;
}
.search_gallery_item .search_listing_info {
	margin: 5px;
}
.search_gallery_item .search_listing_info p {
	margin: 5px;
	margin-bottom: 10px;
}
.search_gallery_item .search_listing {
	background: none;
	text-align: center;
}
.search_gallery_item .search_listing_icon {
	position: absolute;
	margin-bottom: 20px;
}
.search_gallery_item .search_listing_info {
	margin: 5px;
}
.search_gallery_item .search_listing_info p {
	margin: 5px;
	margin-bottom: 10px;
}
