<?php 

	// JS 
	// extend_view("js/initialise_elgg", "elggchat/js");
	
	echo "<link rel='stylesheet' href='" . $vars['url'] . "mod/elggchat/views/default/elggchat/css.php' type='text/css' />";

	// Extend system CSS with our own styles
	// extend_view('css','elggchat/css');
	echo "<script type='text/javascript' src='" . $vars['url'] . "mod/elggchat/views/default/elggchat/js.php'></script>";
	
	// if sound enabled
	echo "<script type='text/javascript' src='" . $vars['url'] . "mod/elggchat/js/sound/jquery.sound.js'></script>";
	
?>

