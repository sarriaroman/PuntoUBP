<?php
	/**
	* ElggChat - Pure Elgg-based chat/IM
	* 
	* Builds the ElggChat Toolbar
	* 
	* @package elggchat
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	* @version 0.4
	*/
	
?>
<script type="text/javascript" src="<?php echo $vars['url']; ?>vendors/jquery/jquery-1.4.2.min.js"></script>
<!--<div class="block-left">
		<a href="<?php //echo $vars['url']; ?>pg/photos/owned/<?php //echo $_SESSION['user']->username; ?>" class="btns"><img src="<?php //echo $vars['url']; ?>mod/elggchat/_graphics/_icons/photos.png" title="Fotos" /></a>
</div>-->
<div id="elggchat_toolbar">
	<div id="elggchat_toolbar_left" >
		<div id='elggchat_sessions'> 
		</div>
		
		<div id="elggchat_friends">
			<a href="javascript:toggleFriendsPicker();"></a>
		</div>
		<div id="elggchat_friends_picker"></div>
		<div id='elggchat_extensions'>
			<?php
				if(get_plugin_setting("enableExtensions", "elggchat") == "yes")	echo elgg_view("elggchat/extensions");
			?> 
		</div>
	</div>
</div>


