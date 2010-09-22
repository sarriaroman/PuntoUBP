<?php

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

<div class="contentWrapper">
	
	
<!-- </div> -->