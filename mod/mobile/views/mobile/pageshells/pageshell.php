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

// Set the content type
header("Content-type: text/html; charset=UTF-8");

// Set title
if (empty($vars['title'])) {
	$title = $vars['config']->sitename;
} else if (empty($vars['config']->sitename)) {
	$title = $vars['title'];
} else {
	$title = $vars['config']->sitename . ": " . $vars['title'];
}
?>

<?php echo elgg_view('page_elements/header', $vars); ?>

<?php echo elgg_view('page_elements/header_contents', $vars); ?>

<!-- main contents -->

<!-- display any system messages -->



<!-- canvas -->
<div id="layout_canvas">
<?php echo elgg_view('messages/list', array('object' => $vars['sysmessages'])); ?>
<?php echo $vars['body']; ?>

<div class="clearfloat"></div>
</div><!-- /#layout_canvas -->

<div class="mobilecopy">
Elgg Mobile &copy; Mark Harding 2010
</div><!-- /.mobile_copy -->
<!-- footer -->
<?php echo elgg_view('page_elements/footer', $vars); ?>