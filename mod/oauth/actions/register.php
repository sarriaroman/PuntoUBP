<?php

  // must be logged in to use this page

gatekeeper();

$user = get_loggedin_user();
$name = get_input('name');
$desc = get_input('desc');
$key = get_input('key');
$secret = get_input('secret');

$name = trim($name);
$desc = trim($desc);
$key = trim($key);
$secret = trim($secret);

if ($name && $desc) {

    // create a new entity
    $consumEnt = new ElggObject();
    $consumEnt->subtype = 'oauthconsumer';
    $consumEnt->owner_guid = $user->getGUID();
    $consumEnt->container_guid = $user->getGUID();
    $consumEnt->access_id = ACCESS_PUBLIC; // this doesn't seem right

    $consumEnt->save();

    $consumEnt->name = $name;
    $consumEnt->desc = $desc;

    if (!$key || !$secret) {
	// generate a key and secret
	$key = md5(time());
	$secret = md5(md5(time() + time()));
    }

    $consumEnt->key = $key;
    $consumEnt->secret = $secret;

    system_message('Your application, ' . $name . ' has been successfully registered. Configure the client with the key and secret below.');
    
} else {
    register_error('You must fill out both the name and description fields.');
}


forward($_SERVER['HTTP_REFERER']);

?>