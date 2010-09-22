<?php

?>
<?php
/**
 * Elgg Mobile
 * A Mobile Client For Elgg
 *
 * @package Elgg
 * @subpackage Core
 * @author Mark Harding
 * @link http://maestrozone.com
 *
 */
?>
<div style="height:5px;"> </div>
<div id="statusupdate">
What's on your mind?
	<form action="<?php echo $vars['url']; ?>action/thewire/add" method="post" name="noteForm">
			
		<?php
 
			$owner =  $_SESSION['user']->getGUID();
			$latest_wire = get_entities("object", "thewire", $owner, "", 1, 0, false, 0, null);
foreach($latest_wire as $lw){
			$status = $lw->description;}
			$display .= "<textarea name='note' id=\"thewire_publisherInputBox\" class=\"statusbox\">
</textarea>";
			echo $display;
		?>
			<input type="hidden" name="method" value="site" />
			<input type="hidden" name="location" value="activity" />
			<input type="hidden" name="access_id" value="2" />
			<input type="submit" value="<?php echo elgg_echo('Share!'); ?>" id="submit_mobile"/>
	</form>
    <h3>Activity Stream</h3>
    </div>
    <?php


	//grab the current site message
	//$site_message = get_entities("object", "sitemessage", 0, "", 1);
	//if ($site_message) {
		//$mes = $site_message[0];
		//$message = $mes->description;
		//$dateStamp = friendly_time($mes->time_created);
		//$delete = elgg_view("output/confirmlink",array(
			//												'href' => $vars['url'] . "action/riverdashboard/delete?message=" . $mes->guid,//
		//													'text' => elgg_echo('delete'),
		//													'confirm' => elgg_echo('deleteconfirm'),
			//											));
	//}
	


	//if there is a site message
	//if($site_message){
	 
		//echo "<h3>" . elgg_echo("sitemessages:announcements") . "</h3>";
		//echo "<p><small>" . elgg_echo("sitemessages:posted") . ": " . $dateStamp;
		//if admin display the delete link
		//if(isadminloggedin())
		//	echo " " . $delete . " ";	
		//echo "</small></p>";
		//display the message
		//echo "<p>" . $message . "</p>";
	//}

$river = $vars['river'];
?>
<div id="river">
<?php
$type = '';
$subtype = '';
$relationship_type = "";
$subject_guid = 0;

echo elgg_view_river_items($subject_guid, 0, $relationship_type, $type, $subtype, '');
?>
</div>