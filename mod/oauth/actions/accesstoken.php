<?php

global $CONFIG;

/*
$cid = get_input('oauth_consumer_key');
$tid = get_input('oauth_token');
$consumEnt = oauth_lookup_consumer_entity($cid);
print 'Consumer: ' . $cid;
print_r($consumEnt);
print_r(oauth_consumer_from_entity($consumEnt));
$tokEnt = oauth_lookup_token_entity($consumEnt, 'request', $tid);
print 'Token: ' . $tid;
print_r($tokEnt);
print_r(oauth_token_from_entity($tokEnt));
*/

try {
  $server = oauth_get_server();
  $req = OAuthRequest::from_request(null, null, oauth_get_params());
  $token = $server->fetch_access_token($req);
  print $token;
} catch (OAuthException $e) {
  print($e->getMessage() . "\n<hr />\n");
  die();
}

die();

?>