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

?>

<div id='newPosts'>
<!--  <div style='color: blue; font-weight: bold; width: 100%;'><table width=100%><tr><td>Notifications</td><td align=right style='cursor: pointer;' onClick="document.getElementById('newPosts').style.display=='block' ? document.getElementById('newPosts').style.display ='none' : document.getElementById('newPosts').style.display = 'block'"><img src='<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/graphics/icons/minimize.gif' alt='-'></td></tr></table></div> -->
  <div id='bb_notification_top'>
    <table width=100%>
      <tr>
        <td style='border-bottom: solid 1px #aaaabb'><b>Notifications</b></td>
        <td style='border-bottom: solid 1px #aaaabb; width: 10px;' align=right style='cursor: pointer;' onClick='$("#newPosts").slideToggle("normal");'><img src='<?php echo $CONFIG->wwwroot; ?>mod/elggchat/_graphics/icons/minimize.gif' alt='-'></td>
     </tr>
     <tr><td colspan=2><a href='#' onClick='showAll();' id='showAll' style='background: #ffffff;'>All</a>|<a href='#' onClick='showMine();' id='showMine'>Mine</a></td></tr>
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
<!--        <td width=180px style='border-left: solid 1px #999999; text-align: center' onClick="document.getElementById('bb_chat').style.display=='block' ? document.getElementById('bb_chat').style.display = 'none' : document.getElementById('bb_chat').style.display = 'block'">Chat</td>-->
        <td width=25px id='bb_newposts_button'><img src='<?php echo $CONFIG->wwwroot; ?>mod/elggchat/_graphics/icons/NotificationIcon.gif'></td>
      </tr>
    </table>
  </div>
</div>

  <div id='bb_hidden_river_all' style='display: none;'><?php echo $river_all; ?></div>
  <div id='bb_hidden_river_mine' style='display: none;'><?php echo $river; ?></div>

<script>
    $("#bb_newposts_button").click(function () {
      $("#bb_chat:visible").slideToggle("normal");      
      $("#newPosts").slideToggle("normal");
      document.getElementById("bb_newposts_button").style.background = button_normal_background;
    });    

    $("#bb_friendslist_button").click(function () {
      $("#newPosts:visible").slideToggle("normal");
      $("#bb_chat").slideToggle("normal");
    });    


    function showMine() {
      var mf = document.getElementById("bb_hidden_river_mine").innerHTML;
      document.getElementById("bb_notification_main").innerHTML = mf;
      document.getElementById("showAll").style.background = "none";
      document.getElementById("showMine").style.background = "#ffffff";
    }

    function showAll() {
      var mf = document.getElementById("bb_hidden_river_all").innerHTML;
      document.getElementById("bb_notification_main").innerHTML = mf;
      document.getElementById("showAll").style.background = "#ffffff";
      document.getElementById("showMine").style.background = "none";
    }

    var button_normal_background = document.getElementById("bb_newposts_button").style.background;

    function initPage() {
      setTimeout(checkNotifications,40000);
    }

    function checkNotifications()
    {
      $.get("<?php echo $CONFIG->wwwroot; ?>mod/elggchat/views/default/elggchat_extensions/update.php?type=mine", function(data) {
	if (data != "") {
	   document.getElementById("bb_newposts_button").style.background="#ff0000";
	   $("#bb_hidden_river_mine").html = data;
	   document.getElementById("bb_notification_main").innerHTML = data;
           document.getElementById("showMine").style.background = "#ffffff";
           document.getElementById("showAll").style.background = "none";
	}
      });

      $.get("<?php echo $CONFIG->wwwroot; ?>mod/elggchat/views/default/elggchat_extensions/update.php?type=all", function(data) {
	if (data != "") {
	   document.getElementById("bb_newposts_button").style.background="#ff0000";
	   $("#bb_hidden_river_all").html = data;
	   document.getElementById("bb_notification_main").innerHTML = data;
	           document.getElementById("showAll").style.background = "#ffffff";
           document.getElementById("showMine").style.background = "none";
	}
      });


      setTimeout(checkNotifications, 30000);
    }

    initPage();
//    $('document').ready(initPage);

</script>


