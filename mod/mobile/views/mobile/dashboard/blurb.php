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
/**
 * Elgg river for dashboard.
 *
 * @package Elgg
 * @author Curverider Ltd
 * @link http://elgg.com/
 */

/// Extract the river
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