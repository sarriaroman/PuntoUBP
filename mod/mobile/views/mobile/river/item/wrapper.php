<?php

	/**
	 * Elgg river item wrapper.
	 * Wraps all river items.
	 * 
	 * @package Elgg
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

$performed_by = get_entity($vars['item']->subject_guid);
$object = get_entity($vars['item']->object_guid);
?>
<div class="river_profile_icon">
<a href="<?php echo $performed_by->getURL(); ?>?view=mobile"><img src="<?php echo $performed_by->getIcon('small'); ?>"></a>
				</div> 
	<div class="river_item">
    
		<div class="river_<?php echo $vars['item']->type; ?>">
        
			<div class="river_<?php echo $vars['item']->subtype; ?>">
            
				<div class="river_<?php echo $vars['item']->action_type; ?>">	
           
					<div class="river_show">
                    
					<p>	
						<?php
		
								echo $vars['body'];
				
						?>
						
					</p>
                    <p> <span class="river_item_time">
						<?php
				
								echo friendly_time($vars['item']->posted);
							
							?>
						<span class="comment_cnt"><?php if (!empty($object->location)) { echo (" from&nbsp;<a href=\"#\">" . $object->location . "</a>"); }?></span>
                        <?php
	//echo getRiverItemComments($object->guid);
	 //echo elgg_view('river/forms/comment',array('entity' => $object));?>
                            
						</span></p>
					</div>
				</div>				
			</div>
		</div>
	</div>