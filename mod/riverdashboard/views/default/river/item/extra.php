<?php
	/**
	 * extra view of river item
	 * replaces the default wrappers inner div
	 * performer and time,maybe comment of a river item
	 *
	 * @package ImprovedRiverDashboard
	 */
	/**
	 * @author Snow.Hellsing <snow.hellsing@firebloom.cc>
	 * @copyright FireBloom Studio
	 * @link http://firebloom.cc
	 */
	$performed_by = $vars['performed_by'];
	$object = $vars['object'];
	$body = $vars['body'];
	$show_comment = $vars['show_comment'];
	
	echo '</div>';//break from basic_river_item_view

	echo elgg_view("profile/icon",
    					array(
    						'entity' => $performed_by,
    						'size' => 'small')); ?>

<div class="item_body">
	<?php echo $body; ?>
</div>
<div class="item_info">
	<a href="<?php echo $performed_by->getURL(); ?>"><?php echo $performed_by->name; ?></a>
	<?php echo friendly_time($object->time_created);
		
	if ($show_comment) {
		?>
		<a href="" onclick="$('#river_item_comments-<?php echo $object->guid ?>').toggle();return false;"><?php echo sprintf(elgg_echo('river:item:toggle_comments'),count_annotations($object->guid,'','','generic_comment'));?></a>
		<?php
	}
	?>
	
</div>
<?
	if ($show_comment) {
?>
<div class="generic_like">
	<?php 
		$function_call = "{$vars['url']}action/riverdashboard/like";
		$pid = $object->guid;
		$uid = $_SESSION['user']->getGUID();
		
		$img_path = $vars['url'] . "_graphics/icons/dashboard/";
	?>
       	<a href="<?php echo $function_call; ?>?pid=<?php echo $pid; ?>&uid=<?php echo $uid; ?>&type=1"><img src="<?php echo $img_path; ?>like.png" style="margin: 0 5px 2px 0;display: inline;float: left;" />Me gusta (<?php echo get_like_count( $pid, 1 ); ?>)</a> -
	    <a href="<?php echo $function_call; ?>?pid=<?php echo $pid; ?>&uid=<?php echo $uid; ?>&type=2"><img src="<?php echo $img_path; ?>notlike.png" style="margin: 0 5px 2px 0;display: inline;float: left;" />No me gusta (<?php echo get_like_count( $pid, 2 ); ?>)</a>
        
        <?php if( is_like( $pid, $uid ) ) { ?>
			<a href="<?php echo $function_call; ?>?action=delete&pid=<?php echo $pid; ?>&uid=<?php echo $uid; ?>" style="float:right;"><img src="<?php echo $img_path; ?>cross.png" style="margin: 0 5px 2px 0;display: inline;float: left;" />Eliminar</a>
		<?php } ?>
</div>
<div class="item_comments" id="river_item_comments-<?php echo $object->guid ?>">
	<?php
	echo list_annotations($object->guid,'generic_comment',comment_limit);	
	?>
</div>
<div class="item_comment_form">
	<?php echo elgg_view('river/forms/comment',array('entity' => $object));?>
</div>
<?php
	}//if ($show_comment)
	echo '<div class="hide_basic_river_item_view_time">';//hide friendly time div in basic view
?>
