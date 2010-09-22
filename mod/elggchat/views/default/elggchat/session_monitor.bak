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
<div id="elggchat_toolbar">
	<!--<div id="elggchat_copyright">
		ElggChat (c) ColdTrick IT Solutions
	</div>-->
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
	
	<div id="toggle_elggchat_toolbar" class="toggle_elggchat_toolbar" onclick="toggleChatToolbar('slow')" title="<?php echo elgg_echo("elggchat:toolbar:minimize");?>"></div>

</div>
