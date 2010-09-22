<?php

     /**
	 * Elgg login form
	 * 
	 * @package Elgg
	 * @subpackage Core
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.org/
	 */
	 
	global $CONFIG;
	
	$form_body = "<p class=\"loginbox\"><label>" . elgg_echo('username') . "<br />" . elgg_view('input/text', array('internalname' => 'username', 'class' => 'login-textarea')) . "</label>";
	//$form_body .= "<br />";
	$form_body .= "<label>" . elgg_echo('password') . "<br />" . elgg_view('input/password', array('internalname' => 'password', 'class' => 'login-textarea')) . "</label>";
//	$form_body .= "<br />";
	$form_body .= "<div id=\"persistent_login\"><label><input type=\"checkbox\" name=\"persistent\" value=\"true\" /> ".elgg_echo('user:persistent')."</label></div>";
	$form_body .= "<p class=\"loginbox\">";
	$form_body .= elgg_view('input/submit', array('value' => elgg_echo('login'))) . "</p>";
	//
	//$form_body .= "";
	//$form_body .= (!isset($CONFIG->disable_registration) || !($CONFIG->disable_registration)) ? "<a href=\"{$vars['url']}account/register.php\">" . elgg_echo('register') . "</a> | " : "";
	//$form_body .= "<a href=\"{$vars['url']}account/forgotten_password.php\">" . elgg_echo('user:password:lost') . "</a></p>";  
	
	//<input name=\"username\" type=\"text\" class="general-textarea" /></label>
	
	$login_url = $vars['url'];
	if ((isset($CONFIG->https_login)) && ($CONFIG->https_login))
		$login_url = str_replace("http", "https", $vars['url']);
?>
	<div id="main-window"></div>
	<div id="logo-grande"></div>
    <div id="loguito"></div>
	<div id="login-box">
		<?php 
			echo elgg_view('input/form', array('body' => $form_body, 'action' => "{$login_url}action/login", method => "post"));
		?>
   	<h4></h4>
	</div>
    