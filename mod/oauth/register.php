<?php

  // Load Elgg engine
    require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
// must be logged in to see this page
gatekeeper();


$user = get_loggedin_user();


// new registration

$area2 = elgg_view_title('Register A New OAuth Application');

$name = elgg_view('input/text', array('internalname' => 'name'));

$description = elgg_view('input/text', array('internalname' => 'desc'));

$key = elgg_view('input/text', array('internalname' => 'key'));

$secret = elgg_view('input/text', array('internalname' => 'secret'));

$submit = elgg_view('input/submit', array('value' => 'Register'));

$formbody = '<p><label>Name</label>' . '<br />Name to uniquely identify this application' . $name . "</p>\n";
$formbody .= '<p><label>Description</label>' . '<br />User-readable description of this application' . $description . "</p>\n";
$formbody .= '<p><label>Key</label>' . '<br />(leave blank to have it auto-generated)' . $key . "</p>\n";
$formbody .= '<p><label>Name</label>' . '<br />(leave blank to have it auto-generated)' . $secret . "</p>\n";
$formbody .= $submit;

$form = elgg_view('input/form', array('action' => $CONFIG->wwwroot . 'action/oauth/register', 
				      'body' => $formbody));

$area2 .= elgg_view('page_elements/contentwrapper', array('body' => $form));



// existing applications

$area2 .= elgg_view_title('Currently Registered OAuth Applications');

// only grab the saved consumers for external apps accessing our stuff, not local consumers given by plugins

// if the user's an admin, get everything
if (isadminloggedin()) {
    $apps = get_entities('object', 'oauthconsumer');
} else {
    // otherwise get the entities for the current user
    $apps = get_entities('object', 'oauthconsumer', $user->getGUID());
}

if ($apps) {

    $appList = elgg_view_entity_list($apps, count($apps), 0, 0, true, true, false);
  
} else {

    $appList = 'No applications currently registered.';
}

$area2 .= elgg_view('page_elements/contentwrapper', array('body' => $appList));

// format
$body = elgg_view_layout("two_column_left_sidebar", '', $area2);

// Draw page
page_draw('Registered OAuth Applications', $body);

?>