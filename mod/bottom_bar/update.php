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


  require_once(dirname(dirname(dirname(__FILE__))) . '/engine/start.php');

//  gatekeeper();
  if (isloggedin()) {

  $river = "";
  if (!is_null($_REQUEST['type'])) {
    if ($_REQUEST['type']=="mine") {
      if (elgg_view_river_items($_SESSION['user']->guid, 0, 'friend', '', '', '',6,time()-30,0,false)!="")
	$river = elgg_view_river_items($_SESSION['user']->guid, 0, 'friend', '', '', '',6,0,0,false) . "</div>";
    } else if ($_REQUEST['type']=="all") {
      if (elgg_view_river_items(0, 0, '', '', '', '',6,time()-30,0,false)!="")
	$river = elgg_view_river_items(0, 0, '', '', '', '',6,0,0,false) . "</div>";
    }
    $river = str_replace('callback=true','replaced=88,334',$river);
    echo $river;
  }

  }
?>
