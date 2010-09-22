<?php

global $CONFIG;

try {

  $server = oauth_get_server();
  $req = OAuthRequest::from_request(null, null, oauth_get_params());
  $token = $server->fetch_request_token($req);
  print $token;
} catch (OAuthException $e) {
  print($e->getMessage() . "\n<hr />\n");

  //  print_r($req);

  die();
}


die();

?>