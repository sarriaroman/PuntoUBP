<?php

	/**
	 * New wire post view for the activity stream
	 */

	//grab the users latest from the wire
	$wire = get_user_objects($_SESSION['user']->getGUID(),'thewire', 1, 0);
	if($wire){
		foreach($wire as $latest){
			$latest_wire = $latest->description;
			$latest_date = friendly_time($latest->time_created);
		}
	}
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

<div class="sidebarBox">

	<form action="<?php echo $vars['url']; ?>action/thewire/add" method="post" name="noteForm">
			
		<?php
			$display .= "<h3>" . elgg_echo('thewire:newpost') . "</h3><textarea name='note' value='' onKeyDown=\"textCounter(document.noteForm.note,document.noteForm.remLen1,140)\" onKeyUp=\"textCounter(document.noteForm.note,document.noteForm.remLen1,140)\" id=\"thewire_sidebarInputBox\">{$msg}</textarea><br />";
			$display .= "<div class='thewire_characters_remaining'><input readonly type=\"text\" name=\"remLen1\" size=\"3\" maxlength=\"3\" value=\"140\" class=\"thewire_characters_remaining_field\">";
			echo $display;
			echo elgg_echo("thewire:charleft") . "</div>";
		?>
			<input type="hidden" name="method" value="site" />
			<input type="hidden" name="location" value="activity" />
			<input type="submit" value="<?php echo elgg_echo('save'); ?>" id="thewire_submit_button" />
	</form>

	<div class="thewire-singlepage">
		<div class="thewire-post">
		<?php
			echo "<div class=\"note_body\">" . elgg_echo("thewire:latest") . ": " . $latest_wire . "</div>";
		?>
			<div class="note_date"><?php echo $latest_date; ?></div>
		</div>
	</div>
</div>