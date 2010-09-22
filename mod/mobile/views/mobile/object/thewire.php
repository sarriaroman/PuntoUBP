<?php

	/**
	 * Elgg thewire note view
	 * 
	 * @package ElggTheWire
	 * @license Private
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 *
	 * @uses $vars['entity'] Optionally, the note to view
	 */

if (isset($vars['entity'])) {
	//vars['entity'] this is the parent code
	$name = $vars['entity']->getOwnerEntity()->name;
	$user_name = $vars['entity']->getOwnerEntity()->username;
	$post_guid = $vars['entity']->guid;
	$count_replies = count_annotations($post_guid, "object", "thewire", "wire_reply");
	//each parent also creates a blank annotation so we can use get_entities_from_annotations to get wire posts
	$count_replies = $count_replies - 1; // remove the first annotation
	//get the last reply, if there is one, to display
	$last_reply = get_annotations($post_guid, "object", "thewire", "wire_reply", "", 0, 1, 0, "desc");
  	$reply = $last_reply[0];//as we are only getting one item
	$user_name_reply = get_user($reply->owner_guid)->name;
	$user_name_reply_url = get_user($reply->owner_guid)->username;
?>

<!-- start the wrapper div -->
<div class="thewire-posts-wrapper" id="thewire-<?php echo $post_guid; ?>">
<?php
	//if there are replies, display the latest one here
	if($reply->value != ''){
?>
<div class="thewire-conversation">
	<!-- show the latest reply message -->
	<div class="threaded_replies_wrapper">
		<!-- this div holds the inline reply form -->
		<div class="inline_reply_holder"></div>
		
		<div class="thewire-post reply latest"><!-- open thewire-post div -->
			<div class="note_body"><!-- open note_body div -->
				<div class="thewire_icon"><!-- open thewire_icon div -->
			    	<?php
				        echo elgg_view("profile/icon",array('entity' => get_user($reply->owner_guid), 'size' => 'tiny'));
			    	?>
			    </div><!-- close thewire_icon div -->
			    <div class="thewire_options"><!-- open thewire_options div -->	
					<?php
						if(isloggedin()){
					?>
					<a href="#" class="reply" title="Reply"><?php echo elgg_echo('thewire:reply'); ?></a>
					<?php
						}
					?>
					<div class="thewire_hidden_options">
			    	<?php		 		   
						// if the user looking at thewire post can edit, show the delete link
						if ($reply->owner_guid == $_SESSION['user']->guid || isadminloggedin()) {
							   echo "<div class='delete_note'>" . elgg_view("output/confirmlink",array(
																	'href' => $vars['url'] . "action/thewire/delete_reply?id=" . $reply->id,
																	'text' => elgg_echo('delete'),
																	'confirm' => elgg_echo('deleteconfirm'),
																)) . "</div>";
						} //end of can edit if statement
						//echo elgg_view('thewire/options', array('entity' => $reply));
					?>
				    </div><!-- /thewire_hidden_options -->
			    </div><!-- /thewire_options -->
				<?php
					//display the message
					$url_one = $vars['url'] . 'pg/thewire/' . $user_name_reply_url;
					echo "<div class='wire-post-message'><p><span class='wireownername'><a href=\"{$url_one}\">{$user_name_reply}</a>: </span> ";
				  	$desc = $reply->value;
				    $desc = preg_replace('/\@([A-Za-z0-9\_\.\-]*)/i','@<a href="' . $vars['url'] . 'pg/profile/$1">$1</a>',$desc);
				    echo parse_urls($desc);
				    echo "</p></div>";
				?>	
				<div class="note_date"><!-- open note_date div -->
					<?php	
						//display the date
						echo elgg_echo("thewire:wired") . " " . sprintf(elgg_echo("thewire:strapline"),
										friendly_time($reply->time_created)
						);
						
						echo " " . elgg_echo('thewire:viasite');
					?>
				</div><!-- close note_date div -->
				<div class="clearfloat"></div>
			</div><!-- close note_body div -->
		</div><!-- close thewire-post div -->
		
		<div class="the_wire_conversation" style="display:none;"><!-- open the_wire_conversation div -->
			<div class="discussion"><!-- open discussion div -->
				<!-- loading graphic -->
			    <div class="ajax_loader_wire"></div>
			</div><!-- close discussion div -->
		</div><!-- close the_wire_conversation div -->
		
		<?php
			//display the number of replies if there is more than one. If there is only one
			//it displays anyway so no need for this link
			if ($count_replies != 0 && $count_replies > 1) {
				echo "<div class='conversation_link_wrapper'>";
				echo "<span class='conversation_counter_link'>";
				echo "<a class=\"conversationlink\" href=\"{$vars['url']}mod/thewire/endpoint/show_discussion.php?wirepost=$post_guid\">
				<span class=\"view-conversation\" style='display:inline;'>" . elgg_echo('thewire:viewconversation') . " ({$count_replies} " . elgg_echo('thewire:replies') . ")</span>
				<span class=\"hide-conversation\" style='display:none;'>" . elgg_echo('thewire:hideconversation') . " ({$count_replies} " . elgg_echo('thewire:replies') . ")</span>
				</a>";
				echo "</span></div>";
			}
		?>
		</div><!-- /threaded_replies_wrapper -->
		
		<!-- show the parent message -->
		<div class="thewire-post parent"><!-- open thewire-post div -->
			<div class="note_body"><!-- open note_body div -->
				<div class="thewire_icon"><!-- open thewire_icon div -->
			    	<?php
				        echo elgg_view("profile/icon",array('entity' => $vars['entity']->getOwnerEntity(), 'size' => 'small'));
			    	?>
			    </div><!-- close thewire_icon div -->
			    <div class="thewire_options"><!-- open thewire_options div -->
				
<?php
	}else{
		//this means there are no replies so just display the parent with reply link
?>
	<div><!-- open thewire-conversation -->
		<div class="thewire-post orphan"><!-- open thewire-post div -->
		 	<div class="inline_reply_holder"></div>
			<div class="note_body"><!-- open note_body div -->
			    <div class="thewire_icon"><!-- open thewire_icon div -->
			    	<?php
				        echo elgg_view("profile/icon",array('entity' => $vars['entity']->getOwnerEntity(), 'size' => 'small'));
			    	?>
			    </div>
			    <div class="thewire_options"><!-- open thewire_options div -->
					<?php
						if(isloggedin())
							echo "<a href=\"#\" class=\"reply\" title=\"Reply\">" . elgg_echo('thewire:reply') . "</a>";
					?>
		    
<?php
	}
?>
				<div class="thewire_hidden_options">

	    		<?php		   
					// if the user looking at thewire post can edit, show the delete link
					if ($vars['entity']->canEdit()) {
					   echo "<div class='delete_note'>" . elgg_view("output/confirmlink",array(
															'href' => $vars['url'] . "action/thewire/delete?thewirepost=" . $vars['entity']->getGUID(),
															'text' => elgg_echo('delete'),
															'confirm' => elgg_echo('deleteconfirm'),
														)) . "</div>";
					} //end of can edit if statement
					
					//insert a view for plugins to extend
					echo elgg_view('thewire/options', array('entity' => $vars['entity']));
				
				?>
				</div><!-- /thewire_hidden_options -->
	    		</div><!-- /thewire_options div -->
				<?php
					$url_one = $vars['url'] . 'pg/thewire/' . $user_name;
					echo "<div class='wire-post-message'><p><span class='wireownername'><a href=\"{$url_one}\">{$name}</a>: </span> ";
				  	$desc = $vars['entity']->description;
				    $desc = preg_replace('/\@([A-Za-z0-9\_\.\-]*)/i','@<a href="' . $vars['url'] . 'pg/profile/$1">$1</a>',$desc);
				    echo parse_urls($desc);
				    echo "</p></div>";
				?>
	
				<div class="note_date"><!-- open note_body div -->
					<?php	
						if ($count_replies != 0 && $count_replies > 1) {
							echo "<b>" . elgg_echo('thewire:conversationstarted') . " " . sprintf(elgg_echo("thewire:strapline"),
												friendly_time($vars['entity']->time_created)
							);
							echo "</b> " . elgg_echo('thewire:via') . " " . elgg_echo($vars['entity']->method);
							//echo " <a class=\"a_reply_{$post_guid} conversationlink\" style='display:inline;'>View conversation ({$count_replies} replies)</a>";	
							echo " ({$count_replies} ".elgg_echo('thewire:replies').")";
						}elseif ($count_replies == 1) {
							echo elgg_echo("thewire:wired") . " " . sprintf(elgg_echo("thewire:strapline"),
												friendly_time($vars['entity']->time_created)
							);
							echo " " . elgg_echo('thewire:via') . " " . elgg_echo($vars['entity']->method);
							echo " ({$count_replies} ".elgg_echo('thewire:reply').")";
						}else{
							echo elgg_echo("thewire:wired") . " " . sprintf(elgg_echo("thewire:strapline"),
												friendly_time($vars['entity']->time_created)
							);
							echo " " . elgg_echo('thewire:via') . " " . elgg_echo($vars['entity']->method);
						}
					?>
				</div><!-- close note_body div -->
				<div class="clearfloat"></div>
			</div><!-- close note_body div -->
		</div><!-- close thewire-post div -->
<?php
	}
?>
</div><!-- /thewire-conversation -->
<div class="clearfloat"></div>
</div><!-- /thewire-posts-wrapper div -->
