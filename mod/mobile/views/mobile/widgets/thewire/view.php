<?php
		// Get any wire notes to display
		// Get the current page's owner
		$page_owner = page_owner_entity();
		if ($page_owner === false || is_null($page_owner)) {
			$page_owner = $_SESSION['user'];
			set_page_owner($page_owner->getGUID());
		}
		$num = $vars['entity']->num_display;
		if(!$num)
			$num = 1;
		
		$thewire = $page_owner->getObjects('thewire', $num);
		
		// If there are wire messages to view, view them
		if (is_array($thewire) && sizeof($thewire) > 0) {	
			foreach($thewire as $m) {
				echo "<div class=\"contentWrapper thewire\">";
				echo "<div class=\"thewire_icon\">";
			    echo elgg_view("profile/icon",array('entity' => get_user($m->owner_guid), 'size' => 'tiny'));
			   	echo "</div>";
			   	echo $m->description;
			   	echo " <div class='note_date'>" . friendly_time($m->time_created) ."</div>";
				echo "<div class=\"clearfloat\"></div></div>";
			}
				$moreurl = $vars['url'] . "pg/thewire/" . page_owner_entity()->username;
			    $moreLink = "<div class=\"contentWrapper thewire more\"><a href=\"{$moreurl}\">" . elgg_echo('thewire:more') . "</a></div>";
			    echo $moreLink;			
		}
?>
