<?php
	/**
	 * Elgg customindex plugin
	 * This plugin substitutes the frontpage with a custom one
	 * 
	 * @package Customdash
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Jonathan Rico
	 * @copyright Peesco 2008
	 * @link www.peesco.com
	 */

 
	//Put some extra CSS below if needed
?>

body {
	/*background-image: url(fnd.png);
	background-position: bottom;
    background-attachment: fixed;
	background-repeat: repeat-x;*/
}

label{display:block; margin-bottom:2px;}

#layout_canvas {
	background-color: transparent;
}

#login_column {
	background-color: transparent;
}

#login-box {
	background: transparent;
	-webkit-border-radius: 8px; 
	-moz-border-radius: 8px;
	width:300px;
    text-align:left;
}
#login-box form {
	/*margin-left: 50%;
    margin-right: 50%;
	margin:0 10px 0 10px;
	padding:0 10px 4px 10px;
     margin:0 auto;*/
	background: white;
    position: absolute;
    left: 50%;
    top: 100px;
    margin-left: -150px;
	-webkit-border-radius: 8px; 
	-moz-border-radius: 8px;
	width:260px;
}

/*.submit_button {
	float: right;
    right: 0px;
}*/

#login-box .login-textarea {
	width:250px;
}
#login-box label,
#register-box label {
	font-size: 1.2em;
	color:gray;
}
#login-box p.loginbox {
	margin:0;
}

.myBox {
    width: 300px;
    padding: 10px;
	left: 50%;
	top: 100px;
	margin-left: -150px;
    background-color: #CA464B;
    border: 1px solid #333;

    /* Do rounding (native in Firefox and Safari) */
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
}

.myInput {
    margin: 2px auto;
    color: #333;
    width: 280px;
    background-color: #FFF;
    border: 1px solid #AACCEE;
	padding:6px;
	margin-bottom:10px;
	
    /* Do rounding (native in Firefox and Safari) */
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
  
}
.button{
	border:0; margin:0; padding:0;
	background: #BF2834;
	border:solid 1px #333;
	color:#FFFFFF;
	font-weight:bold;
	padding:4px;
	
    /* Do rounding (native in Firefox and Safari) */
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;

}

#log_in {
	background-image:url(fnd_login.png);
	background-position:center;
	background-repeat:no-repeat;
	position: absolute;
	right: 10%;
	top: 0px;
	width: 486px;
	height: 48px;
}

#loguito {
	background: url(loguito.png);
	width: 32px;
	height: 41px;
	bottom: 2px;
	right: 10px;
	position:absolute;
}

#logo-grande {
	width:300px;
    height: 114px;
	position: absolute;
	background-image: url(logo_grande.png);
    bottom: 20px;
    left: 20px;
}

#main-window {
    position: fixed;
    top: 0px;
    left: 0px;
    width:100%;
    height: 100%;
	background-image: url(fnd.png);
	background-position: bottom;
	/*background-attachment: fixed;*/
	background-repeat: repeat-x;
}