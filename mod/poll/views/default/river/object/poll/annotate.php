<?php

	$statement = $vars['statement'];
	$performed_by = $statement->getSubject();
	$object = $statement->getObject();
	
	$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	$string = sprintf(elgg_echo("poll:river:posted"),$url) . " ";
	$string .= elgg_echo("poll:river:annotate:create") . " <a href=\"" . $object->getURL() . "\">" . $object->question . "</a>";

?>

<?php echo $string; ?>