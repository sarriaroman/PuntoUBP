<?php

        /**
         * Facebook-esque bottom bar
         *
         * @package bottom_bar
         * @author Jay Eames - Sitback
         * @link http://sitback.dyndns.org
         * @copyright (c) Jay Eames 2009
         * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
         */

         //gatekeeper();

	 //$river = elgg_view_river_items($_SESSION['user']->guid, 0, 'friend', '', '', '',10,0,0,false) . "</div>";
	 $river = elgg_view_river_items($_SESSION['user']->guid, 0, 'friend', '', '', '',6,0,0,false) . "</div>";
	 $river_all = elgg_view_river_items(0, 0, '', '', '', '',6,0,0,false) . "</div>";
         // Replacing callback calls in the nav with something meaningless
         $river = str_replace('callback=true','replaced=88,334',$river);

	 $chatEnabled = (get_plugin_setting("allow_messaging", "bottom_bar") != "false" && get_plugin_usersetting("chat_enabled",$_SESSION['user']->guid,"bottom_bar") != "false");
	 $soundEnabled = (get_plugin_setting("sound_enabled", "bottom_bar") != "false");
	 $showFriendIcon = get_plugin_usersetting("friends_icons",$_SESSION['user']->guid,"bottom_bar") != "false";
	 $refreshRate = get_plugin_setting("refresh_rate", "bottom_bar") * 1000;
	 if (!$refreshRate) { $refreshRate = 30000; }

	 $menuEnabled = get_plugin_setting("allow_menu", "bottom_bar") == "menu" || !get_plugin_setting("allow_menu", "bottom_bar");
	 $wireEnabled = get_plugin_setting("allow_menu", "bottom_bar") == "wire";

	 $radioEnabled = get_plugin_setting("allow_radio", "bottom_bar") == "true" && get_plugin_setting("radio_url", "bottom_bar") != "";

	 $menu = get_register('menu');
	 ksort($menu);

	 if (is_array($menu) && sizeof($menu) > 0 && $menuEnabled) {
	   echo "<div id='bb_left_menu'><div id='bb_left_menu_top' onClick=\"$('#bb_left_menu').slideToggle();\">-</div><table>";

           foreach($menu as $item) {
             echo "<tr><td><a href='" . $item->value . "'>" . $item->name . "</a></td></tr>";
           }
	   echo "</table></div>";
         } else if ($wireEnabled) {
	   echo "<div id='bb_left_menu'><div id='bb_left_menu_top' onClick=\"$('#bb_left_menu').slideToggle();\">-</div>";
	   include("thewire.php");
	   echo "</div>";
	 }
	 
?>


<?php if ($chatEnabled) { ?>

<div id='bb_chat'>
  <div id='bb_friends_top'>
    <table width=100%>
      <tr>
        <td style='border-bottom: solid 1px #aaaabb'><b><?php echo elgg_echo('bbar:bar:friends'); ?></b></td>
        <td style='border-bottom: solid 1px #aaaabb; width: 10px;' align=right style='cursor: pointer;' onClick='$("#bb_chat").slideToggle("normal");'><img src='<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/graphics/icons/minimize.gif' alt='-'></td>
     </tr>
    </table>
  </div>

  <div id='bb_friends_main'>
<?php
	$friends = $_SESSION['user']->getFriends("", 1000);
	$friends_online = 0;
	if (count($friends) > 0) {
	  echo "<table width=100% id='bb_friendslist'>";
	  foreach ($friends as $friend) {
	    $icon = $friend->getIcon('topbar');
	    if ($friend->last_action < time() - 600 || get_plugin_usersetting("chat_enabled",$friend->guid,"bottom_bar") == "false") {
		// Consider them offline if no action for 10 mins ..

	    } elseif ($friend->last_action < time() - 300) {
 	        echo "<tr>";
		if ($showFriendIcon) echo "<td width=10><img src='$icon'></td>";
		echo "<td style='padding-left: 5px;'><a href='#' onClick='addChat(\"" . $friend->guid . "\", \"" . $friend->name . "\");'>" . $friend->name . "</a></td><td width=10 style='padding-top: 3px;'>";
		echo "<img src='" . $CONFIG->wwwroot . "mod/bottom_bar/graphics/icons/inactive.png'>";
		$friends_online ++;
	    } else {
 	        echo "<tr>";
		if ($showFriendIcon) echo "<td width=10><img src='$icon'></td>";
		echo "<td style='padding-left: 5px;'><a href='#' onClick='addChat(\"" . $friend->guid . "\", \"" . $friend->name . "\");'>" . $friend->name . "</a></td><td width=10 style='padding-top: 3px;'>";
		echo "<img src='" . $CONFIG->wwwroot . "mod/bottom_bar/graphics/icons/online_s.png'>";
		$friends_online ++;
	    }
	    echo "</td></tr>";
	  }
	  echo "</table>";
	}

	if ($friends_online == 0) {
	  echo elgg_echo('bbar:bar:noneonline'); 
	}
?>
  </div>
</div>
<?php } ?>

<div id='newPosts'>
<!--  <div style='color: blue; font-weight: bold; width: 100%;'><table width=100%><tr><td>Notifications</td><td align=right style='cursor: pointer;' onClick="document.getElementById('newPosts').style.display=='block' ? document.getElementById('newPosts').style.display ='none' : document.getElementById('newPosts').style.display = 'block'"><img src='<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/graphics/icons/minimize.gif' alt='-'></td></tr></table></div> -->
  <div id='bb_notification_top'>
    <table width=100%>
      <tr>
        <td style='border-bottom: solid 1px #aaaabb'><b><?php echo elgg_echo('bbar:bar:notifications'); ?></b></td>
        <td style='border-bottom: solid 1px #aaaabb; width: 10px;' align=right style='cursor: pointer;' onClick='$("#newPosts").slideToggle("normal");'><img src='<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/graphics/icons/minimize.gif' alt='-'></td>
     </tr>
     <tr><td colspan=2><a href='#' onClick='showAll();' id='showAll' style='background: #ffffff;'><?php echo elgg_echo('bbar:bar:notify.all'); ?></a>|<a href='#' onClick='showMine();' id='showMine'><?php echo elgg_echo('bbar:bar:notify.mine'); ?></a></td></tr>
    </table>
  </div>

  <div id='bb_notification_main'>
    <?php echo $river_all; ?>
  </div>

</div>
<div id='bb_container'>
  <div id='bb_bar'>
    <table width=100% height=100% style='border-top: solid 1px #ffffff;' cellpadding=0 cellspacing=0>
      <tr>
        <td id="bb_bar_icon" <?php if ($menuEnabled || $wireEnabled) { ?>onClick="$('#bb_left_menu').slideToggle()" style="cursor: pointer;"<?php } ?>><img width=40px src='<?php if (!get_plugin_setting("logo_name", "bottom_bar")) { echo $vars['url'] . "_graphics/elgg_toolbar_logo.gif"; } else { echo $CONFIG->wwwroot . "mod/bottom_bar/graphics/icons/" . get_plugin_setting("logo_name", "bottom_bar"); } ?>' height=22px;></td>
<?php if ($radioEnabled) { ?>
	<td style='width: 20px; border-left: solid 1px #cccccc; padding-left: 3px; padding-top: 0px; margin-top: 0px; background: #e6e6e6'>
	  <div style='position: fixed; bottom: 2px;'>
	    <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" id="xspf_player" align="middle" height="18" width="18">
	      <param name="allowScriptAccess" value="sameDomain">
	      <param name="movie" value="<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/player/button/musicplayer.swf?playlist_url=<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/player/playlist.php&autoload=true">
	      <param name="quality" value="high">
	      <param name="bgcolor" value="#e6e6e6">
	      <embed src="<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/player/button/musicplayer.swf?playlist_url=<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/player/playlist.php&autoload=true" quality="high" bgcolor="#e6e6e6" name="xspf_player" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" align="middle" height="18" width="18">
	    </object>
	  </div>
	</td>

<?php } ?>
	<td id="bb_chat_list"><div id="bb_chat_list_area"></div></td>
	<?php if ($chatEnabled) { ?>
        <td width=180px id='bb_friendslist_button'><table id='bb_friends_bartitle'><tr><td><img src='<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/graphics/icons/user_online.png'></td><td style='padding-top: 3px;'>&nbsp;<?php echo elgg_echo('bbar:bar:friends'); ?> (<span id='bb_friends_count'><?php echo $friends_online; ?></span>)</td></tr></table></td>
	<?php } ?>
        <td width=25px id='bb_newposts_button'><img src='<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/graphics/icons/NotificationIcon.gif'></td>
      </tr>
    </table>
  </div>
</div>

  <div id='bb_hidden_river_all' style='display: none;'><?php echo $river_all; ?></div>
  <div id='bb_hidden_river_mine' style='display: none;'><?php echo $river; ?></div>

<script>

<?php require_once("functions.php"); ?>

    $("#bb_newposts_button").click(function () {
      $("#bb_chat:visible").slideToggle("normal");      
      $("#newPosts").slideToggle("normal");
      document.getElementById("bb_newposts_button").style.background = button_normal_background;
    });    

    <?php if ($chatEnabled) { ?>
    $("#bb_friendslist_button").click(function () {
      $("#newPosts:visible").slideToggle("normal");
      $("#bb_chat").slideToggle("normal");
    });    
    <?php } ?>

    initPage();
</script>
