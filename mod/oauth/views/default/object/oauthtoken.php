<?php

$tokEnt = $vars['entity'];

global $CONFIG;

// copied and adapted from object/default

$consumEnt = oauth_lookup_consumer_entity($tokEnt->consumerKey);

$title = $consumEnt->name;

$controls = '';
if ($tokEnt->canEdit()) {
    $controls .= ' (<a href="' . $CONFIG->wwwroot . 'action/oauth/revoke?guid=' . $tokEnt->getGUID() . '">Revoke</a>)';
}

$info = '<div><p><b><a href="' . $tokEnt->getUrl() . '">' . $title . '</a></b> ' . $controls . ' </p>' . $consumEnt->desc . "</div>\n";



$info .= '<div>';
if ($tokEnt->accessToken) {
    $info .= '<b>Access Token:</b> ' . $tokEnt->accessToken . '<br />';
} else if ($tokEnt->requestToken) {
    $info .= '<b>Request Token:</b> ' . $tokEnt->requestToken . '<br />';
}
$info .= '<b>Secret:</b> ' . $tokEnt->secret . '<br />';
$info .= "</div>\n";

echo elgg_view_listing('', $info);

?>