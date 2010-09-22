<?php

	/**
	 * Elgg thewire edit/add page
	 * 
	 * @package ElggTheWire
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 * 
	 */

		$wire_user = get_input('wire_username');
		if (!empty($wire_user)) { $msg = '@' . $wire_user . ' '; } else { $msg = ''; }

?>
<div class="bb_post_to_wire" style='padding: 0px; font-size: 10px;'>
<h3><?php echo elgg_echo("thewire:doing"); ?></h3>
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

	<form action="<?php echo $vars['url']; ?>action/thewire/add" method="post" name="noteForm">
			<?php
			    $display .= "<input type='text' name='note' value='' onKeyDown=\"textCounter(document.noteForm.note,document.noteForm.remLen1,140)\" onKeyUp=\"textCounter(document.noteForm.note,document.noteForm.remLen1,140)\" id=\"thewire_large-textarea\" style='width: 375px;'>";
                $display .= "<div class='thewire_characters_remaining'><input readonly type=\"text\" name=\"remLen1\" size=\"3\" maxlength=\"3\" value=\"140\" class=\"thewire_characters_remaining_field\" style='padding: 0px; margin: 0px;'>";
                echo $display;
                echo elgg_echo("thewire:charleft") . "</div>";
			?>
			<input type="hidden" name="method" value="site" />
			<input type="submit" value="<?php echo elgg_echo('save'); ?>" style='margin: 0px; margin-top: -10px; margin-bottom: 0px;' />
	</form>
</div>

<?php echo elgg_view('input/urlshortener'); ?>
