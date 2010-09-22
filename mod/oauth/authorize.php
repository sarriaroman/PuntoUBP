<?php

  // Load Elgg engine
    require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
// must be logged in to see this page
gatekeeper();


$user = get_loggedin_user();

$token = get_input('oauth_token');
$callback = get_input('oauth_callback');


$area2 = '';

$tokEnt = oauth_lookup_token_entity($token, 'request');

if ($tokEnt && !$tokEnt->getOwner()) {

    // new authorization

    $consumEnt = oauth_lookup_consumer_entity($tokEnt->consumerKey);

  
    $area2 .= elgg_view_title('Authorize a new application');
  
    $desc = '<div>The following application is asking for authorization to access your account:</div>';
    // todo: better HTML
    $desc .= '<blockquote><h3>' . $consumEnt->name . '</h3>';
    $desc .= $consumEnt->desc . '</blockquote>';


    $tok = elgg_view('input/hidden', array('internalname' => 'oauth_token',
					     'value' => $token));

    $cb = elgg_view('input/hidden', array('internalname' => 'oauth_callback',
					     'value' => $callback));
  
    $submit = elgg_view('input/submit', array('value' => 'Authorize this application'));
  

    $formbody .= $desc;
    $formbody .= $tok;
    $formbody .= $cb;
    $formbody .= $submit;
  
    $form = elgg_view('input/form', array('action' => $CONFIG->wwwroot . 'action/oauth/authorize', 
					  'body' => $formbody));
  
    $area2 .= elgg_view('page_elements/contentwrapper', array('body' => $form));
  
}


// existing applications

$area2 .= elgg_view_title('Currently Authorized Applications');

// only grab the saved consumers for external apps accessing our stuff, not local consumers given by plugins

// get the entities for the current user
$toks = get_entities('object', 'oauthtoken', $user->getGUID());

if ($toks) {

    $tokList = elgg_view_entity_list($toks, count($toks), 0, 0, true, true, false);
  
} else {

    $tokList = 'No applications currently authorized for your account.';
}

$area2 .= elgg_view('page_elements/contentwrapper', array('body' => $tokList));

// format
$body = elgg_view_layout("two_column_left_sidebar", '', $area2);

// Draw page
page_draw('Registered OAuth Applications', $body);

?>