<?php
        /*
        **
        ** Facebook-esque bottom bar
        **
        ** @package bottom_bar
        ** @author Jay Eames - Sitback
        ** @link http://sitback.dyndns.org
        ** @copyright (c) Jay Eames 2009
        ** @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
        **
        */

?>

#bb_left_menu {
    position: fixed;
    bottom: 25px;
    left: 2px;
    padding: 5px;
    background: #ccccdd;
    border: solid 1px #999999;
    z-index: 10010;
    display: none;
}

#bb_left_menu_top {
    text-align: right; 
    cursor: pointer;
    font-size: 18px;
    font-weight: 900;
    line-height: 80%;
    border-bottom: solid 1px #aaaaaa;
    margin-bottom: 5px;
}

#bb_left_menu table {
    background: #ffffff;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
    -moz-border-radius-bottomright: 5px;
    -moz-border-radius-bottomleft: 5px;
    font-size: 15px;
    font-face: verdana, tahoma;
    font-weight: bold;
    padding: 5px;
}

#bb_left_menu td {
    padding: 3px;
}

#bb_left_menu td:hover{
    background: #ddddff;
}

#bb_container {
    height: 25px; 
    width: 100%; 
    bottom: 0px; 
    position:fixed; 
    z-index: 10000;
}

#bb_bar {
    width: 100%;
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

#bb_bar_icon {
    width: 50px;
    padding-left: 5px;
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

#bb_chat_list {
    border-left: solid 1px #999999;
}

#bb_chat_list_area {
    width: 100%;
}

.bb_chat_list_button {
    width: 120px;
    border-left: solid 1px #999999; 
    position: fixed; 
    position:expression("absolute");
    bottom: 2px;
    color: white;
    font-size: 10px;
    height: 20px;
    padding-left: 3px;
}

.bb_chat_window {
    border: solid 1px #ccccdd;
    width: 200px;
    background: #ffffff;
    position: absolute;
    bottom: 25px;
}


.bb_chat_div_tx {
    height: 20px;
}




.chatbox {
        position: fixed;
        position:expression("absolute");
        width: 225px;
        display:none;
	z-index: 9999;
}

.chatboxhead {
        background-color: #ccccdd;
        padding:7px;
        color: #ffffff;
	font-size: 12px;
        border-right:1px solid #ccccdd;
        border-left:1px solid #ccccdd;
}

.chatboxblink {
        background-color: #176689;
        border-right:1px solid #176689;
        border-left:1px solid #176689;
}

.chatboxcontent {
        font-family: arial,sans-serif;
        font-size: 12px;
        color: #333333;
        height:200px;
        width:209px;
        overflow-y:auto;
        overflow-x:auto;
        padding:7px;
        border-left:1px solid #cccccc;
        border-right:1px solid #cccccc;
        border-bottom:1px solid #eeeeee;
        background-color: #ffffff;
        line-height: 1.3em;
}

.chatboxinput {
        padding: 5px;
        background-color: #ffffff;
        border-left:1px solid #cccccc;
        border-right:1px solid #cccccc;
        border-bottom:1px solid #cccccc;
}

.chatboxtextarea {
        font-family: arial,sans-serif;
	font-size: 12px;
        width: 206px;
        height:44px;
        padding:3px 0pt 3px 3px;
        border: 1px solid #eeeeee;
        margin: 1px;
        overflow:hidden;
}

.chatboxtextareaselected {
        border: 2px solid #f99d39;
        margin:0;
}

.chatboxmessage {
        margin-left:1em;
}

.chatboxinfo {
        margin-left:-1em;
        color:#666666;

}

.chatboxmessagefrom {
        margin-left:-1em;
        font-weight: bold;
}

.chatboxmessagecontent {
}

.chatboxoptions {
        float: right;
}

.chatboxoptions a {
        text-decoration: none;
        color: white;
        font-weight:bold;
        font-family:Verdana,Arial,"Bitstream Vera Sans",sans-serif;
}

.chatboxtitle {
        float: left;
}
