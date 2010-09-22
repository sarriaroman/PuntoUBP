<?php 

	$latest_river = get_river_items(0, 0, 'friend', '', '', '',5,0,0,0);
	//$latest_river = get_river_entries( $_SESSION['user']->getGUID(), 'friend', 5, 0 );
	//elgg_view_river_items(null, 0, $content_type, $content[0], $content[1], '', 1,0,0,false);

?>
<div id="latest_river">
<?php 
	foreach( $latest_river as $river ) {
		$performed_by = get_entity($river->subject_guid);
	?>
    	<table width="250px" style="margin-bottom: 5px; border-bottom: 1px solid #CCC;">
        <td width="40" style="padding-left:1px; padding-right: 1px; margin-top: 2px; margin-bottom: 2px;">
        	<?php	echo elgg_view("profile/icon",
				   					array(
									'entity' => $performed_by,
    								'size' => 'small'));
			?>
        </td>
        <td width="210px" style="margin-top: 2px; margin-bottom: 2px;">
        	<?php
								 
								    //$image = get_entity($vars['item']->object_guid);
							     $object = get_entity($river->object_guid);
    
								 if( $object->type == "user" ) {
									$description = sprintf( elgg_echo("profile:river:update"), $object->name );
								} else {
									$description = $object->description;
								}
	
							    $mime = $object->mimetype;
								$person_link = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
								$goto_full = "<a href=\"{$object->getURL()}\" target=\"_blank\" class=\"goto_full\" id=\"image_toggle-{$object->guid}\">".elgg_echo('river:image:goto_full')."</a>";
    
    							$thumb = "<img src=\"{$url}mod/tidypics/thumbnail.php?file_guid={$object->guid}&size=small\" border=\"0\" alt=\"thumbnail\"/>";
								if( $object->type != "user" ) {
									
								}
								echo $person_link . "<br />";
//								echo "<a href=\"" . $performed_by->getURL() "\">" . $performed_by->name . "</a>" . "<br />";
								echo $description . "<br />";
								if( !($url = $object->getURL()) ) {
									echo $url . "<br />";
								}
							?>
							<span class="river_item_time">
								(<?php
					
									echo friendly_time($river->posted);
								
								?>)
							</span>
		</td>
        </table>
    
    <?php
		
	}
?>
</div>