<?php

    global $CONFIG;

  // must be logged in to use this page
gatekeeper();

$user = get_loggedin_user();

// TODO: check against oauth-based login to disable one token signing another


$tokenKey = get_input('oauth_token');
$callback = get_input('oauth_callback');


$tokEnt = oauth_lookup_token_entity($tokenKey, 'request');

if ($tokEnt) {

    // sign the token and tie it to this user

    $tokEnt->owner_guid = $user->getGUID();
    $tokEnt->container_guid = $user->getGUID();
    
    $tokEnt->save();

    system_message('You have authorized this application.');

    //print_r($tokEnt);
    //print_r($user);

    if ($callback) {
      forward($callback);
    } else {
      forward($CONFIG->wwwroot . 'mod/oauth/authorize.php');
    }
} else {

    register_error('There was an error registering this application.');

    forward($_SERVER['HTTP_REFERRER']);

}

?>