<?php
	/**
	 * add a <div class="basic_river_item_view"> inside <div class="river_type_subtype_actiontype">
	 * to make possible extra view could replace this div
	 *
	 * @package ImprovedRiverDashboard
	 */
	/**
	 * @author Snow.Hellsing <snow.hellsing@firebloom.cc>
	 * @copyright FireBloom Studio
	 * @link http://firebloom.cc
	 */
	/**
	 * Elgg river item wrapper.
	 * Wraps all river items.
	 * 
	 * @package Elgg
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 
	 <a href="<?php echo $function_call; ?>?message=<?php echo $vars['item']->object_guid; ?>" id="delete_link" style="float:right;"><img src="<?php echo $img_path; ?>cross.png" style="margin: 0 5px 2px 0;display: inline;float: left;" /></a>
	 
	 */


?>

	<div class="river_item" id="<?php echo $vars['item']->object_guid; ?>" >
		<div class="river_<?php echo $vars['item']->type; ?>" >
			<div class="river_<?php echo $vars['item']->subtype; ?>">
				<div class="river_<?php echo $vars['item']->action_type; ?>">				
					<div class="river_<?php echo $vars['item']->type; ?>_<?php if($vars['item']->subtype) echo $vars['item']->subtype . "_"; ?><?php echo $vars['item']->action_type; ?>">
						<div class="basic_river_item_view">
                        	<?php 
								$function_call = "{$vars['url']}action/riverdashboard/delete";
								
								$img_path = $vars['url'] . "_graphics/icons/dashboard/";
								
								if( $vars['item']->subject_guid == $_SESSION['user']->getGUID() ) { 
									echo "<div class='delete_msg'>" . elgg_view("output/confirmlink", array(
													'href' => $function_call . "?message=" . $vars['item']->object_guid,
													'text' => elgg_echo('delete'),
													'confirm' => elgg_echo('deleteconfirm'),
												   )) . "</div>";
								}?>
									
							<?php
			
									echo $vars['body'];
					
							?>
							<span class="river_item_time">
								(<?php
					
									echo friendly_time($vars['item']->posted);
								
								?>)
							</span>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</div>