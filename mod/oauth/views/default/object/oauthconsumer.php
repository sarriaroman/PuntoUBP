<?php

$consumEnt = $vars['entity'];

global $CONFIG;

// copied and adapted from object/default

$title = $consumEnt->title;
if (!$title) $title = $consumEnt->name;
if (!$title) $title = get_class($consumEnt);

$controls = '';
if ($consumEnt->canEdit()) {
    $controls .= ' (<a href="' . $CONFIG->wwwroot . 'action/oauth/unregister?guid=' . $consumEnt->getGUID() . '">Unregister</a>)';
}

$info = '<div><p><b><a href="' . $consumEnt->getUrl() . '">' . $title . '</a></b> ' . $controls . ' </p>' . $consumEnt->desc . "</div>\n";


$info .= '<div>';
$info .= '<b>Key:</b> ' . $consumEnt->key . '<br />';
$info .= '<b>Secret:</b> ' . $consumEnt->secret . '<br />';
$info .= 'Registered by <a href="' . $consumEnt->getOwnerEntity()->getUrl() . '">' . $consumEnt->getOwnerEntity()->name . '</a><br />';
$info .= '</div>' . "\n";

echo elgg_view_listing('', $info);

?>