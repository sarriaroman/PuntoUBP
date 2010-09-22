<?php

	/**
	 * Elgg thewire edit/add page
	 * 
	 * @package ElggTheWire
	 * @license Private
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 * 
	 */

	// check for access id.
	if (array_key_exists('access_id', $vars) AND $access_id = $vars['access_id']) {
		$access_input = '<input type="hidden" name="access" value="' . $access_id . '" />';
	} else {
		$access_input = '';
	}
	
	// check for location redirect
	if (array_key_exists('location', $vars) AND $location = $vars['location']) {
		$location_input = '<input type="hidden" name="location" value="' . $location . '" />';
	} else {
		$location_input = '';
	}
	

	 //grab the users latest from the wire
	$latest_wire = get_entities("object", "thewire", $_SESSION['user']->guid, "", 1, 0, false, 0, null); 
	if($latest_wire){
		foreach($latest_wire as $lw){
			$content = $lw->description;
			$time = "<span> (" . friendly_time($lw->time_created) . ")</span>";
		}
	}
	$wire_user = get_input('wire_username');
	if (!empty($wire_user)) { $msg = '@' . $wire_user . ' '; } else { $msg = ''; }

?>

<script>
function textCounter(field,cntfield,maxlimit) {
    // if too long...trim it!
    if (field.value.length > maxlimit) {
        field.value = field.value.substring(0, maxlimit);
    } else {
        // otherwise, update 'characters left' counter
        cntfield.value = maxlimit - field.value.length;
    }
}
</script>

<div class="post_to_wire">
<form action="<?php echo $vars['url']; ?>action/thewire/add" method="post" name="noteForm">
<?php
	echo "<div class='thewire_characters_remaining'><input readonly type=\"text\" name=\"remLen1\" size=\"3\" maxlength=\"3\" value=\"140\" class=\"thewire_characters_remaining_field\">";
	echo elgg_echo("thewire:charleft") . "</div>";
?>
<h3><?php echo elgg_echo("thewire:doing"); ?></h3>

	
			<?php
			    //$display = "<textarea name='note' value='' onKeyDown=\"textCounter(document.noteForm.note,document.noteForm.remLen1,140)\" onKeyUp=\"textCounter(document.noteForm.note,document.noteForm.remLen1,140)\" id=\"thewire_large-textarea\">{$msg}</textarea>";
                //$display .= "<input type=\"submit\" class=\"wire_post_button\" value=\"Post\" /><div class='thewire_characters_remaining'><input readonly type=\"text\" name=\"remLen1\" size=\"3\" maxlength=\"3\" value=\"140\" class=\"thewire_characters_remaining_field\">";
                //echo $display;
                
                echo "<textarea name='note' value='' onKeyDown=\"textCounter(document.noteForm.note,document.noteForm.remLen1,140)\" onKeyUp=\"textCounter(document.noteForm.note,document.noteForm.remLen1,140)\" id=\"thewire_large-textarea\">{$msg}</textarea>";
                echo "<input type=\"submit\" class=\"wire_post_button\" value=\"";
                echo elgg_echo("thewire:post") . "\" />";
                echo $access_input;
                echo $location_input;
			?>
			<input type="hidden" name="method" value="site" />
			
	</form>
	<?php echo "<div class='thewire_latest'><b>" . elgg_echo('thewire:latest') .":</b> " . $content . " " . $time . "</div><div class='clearfloat'></div>"; ?>
</div>
<?php echo elgg_view('input/urlshortener'); ?>
