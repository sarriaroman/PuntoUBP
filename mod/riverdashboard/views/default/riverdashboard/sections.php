<?php

	/**
	 * Elgg thewire view page
	 * 
	 * @package ElggTheWire
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 * 
	 */
	 
	 $contents = array();
	$contents['all'] = 'all';
	if (!empty($vars['config']->registered_entities)) {
		foreach ($vars['config']->registered_entities as $type => $ar) {
			foreach ($vars['config']->registered_entities[$type] as $object) {
				if (!empty($object )) {
					$keyname = 'item:'.$type.':'.$object;
				} else $keyname = 'item:'.$type; 
				$contents[$keyname] = "{$type},{$object}";
			}
		}
	}
	
	$allselect = ''; $friendsselect = ''; $mineselect = '';
	switch($vars['orient']) {
		case '':		$allselect = 'class="selected"';
						break;
		case 'friends':		$friendsselect = 'class="selected"';
						break;
		case 'mine':		$mineselect = 'class="selected"';
						break;
	}
	
?>

<div class="sidebarBox">
<h3>Secci&iacute;on</h3>
<div class="membersWrapper">
	
	<?php
		foreach($contents as $label => $content) {
			if (("{$vars['type']},{$vars['subtype']}" == $content) ||
				(empty($vars['subtype']) && $content == 'all')) {
				$selected = 'selected="selected"';
			} else $selected = '';
				echo "<a href=\"\" onclick=\"javascript:$('#river_container').load('" . $vars['url'] . "mod/riverdashboard/?callback=true&display='+$('input#display').val() + '&content=' + $('{$content}').val());\">" .elgg_echo($label). "</a>";
			}
			
	?>
    
<div class="clearfloat"></div>
</div>
</div>