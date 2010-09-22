<?php

	$performed_by = get_entity($vars['item']->subject_guid); // $statement->getSubject();
	$object = get_entity($vars['item']->object_guid);
	$url = $object->getURL();

	$string = "<a href=\"{$performed_by->getURL()}?view=mobile\">{$performed_by->name}</a> ";
	//$string .= $object->description;
	$desc .= $object->description;
	$desc = preg_replace('/\@([A-Za-z0-9\_\.\-]*)/i','@<a href="' . $vars['url'] . 'pg/thewire/$1">$1</a>',$desc);

	$string .= parse_urls($desc);
	
?>

<?php 
	echo $string; 
?>