<?php 
	/**
	 * Friend request plugin
	 * List all sent requests
	 * 
	 * @package friend_request
	 * @author ColdTrick IT Solutions
	 * @copyright Coldtrick IT Solutions 2009
	 * @link http://www.coldtrick.com/
	 * @version 2.0
	 */

	$count = $vars["request_count"];
	$entities = $vars["entities"];
	
	$content = "";
	
	$ts = time();
	$token = generate_action_token($ts);
	
	if($count > 0){
		foreach($entities as $entity){
			$content .= "<table class='friend_request'>\n";
			$content .= "<tr>\n";
			$content .= "<td rowspan='2'>" . elgg_view("profile/icon", array("entity" => $entity, "size" => "small")) . "</td>\n";
			$content .= "<td><a href='" . $entity->getURL() . "' title='" . $entity->name . "'>" . $entity->name . "</a></td>\n";
			$content .= "</tr>\n";
			$content .= "<tr>\n";
			$content .= "<td>";
			$content .= "<a href='" . $CONFIG->wwwroot . "action/friend_request/revoke?guid=" . $entity->guid . "&__elgg_ts=" . $ts ."&__elgg_token=" . $token . "' title='" . elgg_echo("friend_request:revoke") . "'>" . elgg_echo("friend_request:revoke") . "</a>";
			$content .= "</td>\n";
			$content .= "</tr>\n";
			$content .= "</table>\n";
		}
	} else {
		$content = elgg_echo("friend_request:sent:none");
	}
	
?>
<div class="contentWrapper">
	<h3 class="settings"><?php echo elgg_echo("friend_request:sent:title"); ?></h3>
	<?php echo $content; ?>
</div>