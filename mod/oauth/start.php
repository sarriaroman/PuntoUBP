<?php

  /**
   * Elgg oauth client and server
   * 
   * @author Justin Richer
   * @copyright The MITRE Corporation
   * @link http://mitre.org/
   */

function oauth_init() {
			
  // Get config
  global $CONFIG, $OAUTH_CONSUMERS;
			
  // include the OAuth library
  include($CONFIG->pluginspath . 'oauth/lib/OAuth.php');

  // set up the data store
  include($CONFIG->pluginspath . 'oauth/lib/ElggOAuthDataStore.php');


  // set up our actions and hooks

  // mechanisms to register and unregister consumers
  register_action('oauth/register', false, $CONFIG->pluginspath . 'oauth/actions/register.php');
  register_action('oauth/unregister', false, $CONFIG->pluginspath . 'oauth/actions/unregister.php');
  
  // places to get the request and access tokens
  register_action('oauth/requesttoken', true, $CONFIG->pluginspath . 'oauth/actions/requesttoken.php');
  register_action('oauth/accesstoken', true, $CONFIG->pluginspath . 'oauth/actions/accesstoken.php');

  // mechanisms to let the user authorize and revoke their tokens
  register_action('oauth/authorize', false, $CONFIG->pluginspath . 'oauth/actions/authorize.php');
  register_action('oauth/revoke', false, $CONFIG->pluginspath . 'oauth/actions/revoke.php');


  // plugins hooks
  register_plugin_hook('session:get', 'user', 'oauth_session_get_user');
  register_plugin_hook('permissions_check', 'object',  'oauth_permissions_check');

  // TODO: add cron to clean up old tokens


  // run our set up function once
  run_function_once('oauth_run_once');
			
}

// register our token and consumer objects
function oauth_run_once() {
  // Register a class
  add_subtype('object', 'oauthtoken');	  
  add_subtype('object', 'oauthconsumer');
}


// consumer creation for oauth clients on this host
function oauth_create_local_consumer($name, $desc, $key, $secret) {
  global $OAUTH_CONSUMERS;

  if (array_key_exists($name, $OAUTH_CONSUMERS)) {
    return $OAUTH_CONSUMERS[$name];
  } else {
    // not a real entity -- will anyone care?
    $consumEnt = new ElggObject();
    $consumEnt->subtype = 'oauthconsumer';
    $consumEnt->name = $name;
    $consumEnt->desc = $desc;
    $consumEnt->key = $key;
    $consumEnt->secret = $secret;

    $OAUTH_CONSUMERS[$name] = $consumEnt;
    return $consumEnt;
  }

}

// get a local consumer (from a plugin)
function oauth_get_local_consumer($name) {
  global $OAUTH_CONSUMERS;
  if (array_key_exists($name, $OAUTH_CONSUMERS)) {
    return $OAUTH_CONSUMERS[$name];
  } else {
    return NULL;
  }
}

// look up a consumer based on its key
function oauth_lookup_consumer_entity($consumer_key) {

  if (!$consumer_key) {
    return NULL;
  }

  $consumers = get_entities_from_metadata('key', $consumer_key, 'object', 'oauthconsumer', 0, 1);

  if ($consumers && $consumers[0]) {
    $consumEnt = $consumers[0];
    return $consumEnt;
  } else {
    return NULL;
  }
}

// create a consumer object from an entity object
  function oauth_consumer_from_entity($consumEnt) {
  return new OAuthConsumer($consumEnt->key, $consumEnt->secret);
}


// looks up a token for a given owner and consumer
// (most useful for local consumers)
function oauth_get_token($owner, $consumer) {
  
  $tokens = get_entities_from_metadata('consumerKey', $consumer->key, 'object', 'oauthtoken', $owner->getGUID(), 1);

  if ($tokens && $tokens[0]) {
    $token = $tokens[0];
    return $tokens[0];
  } else {
    return NULL;
  }
}

// looks up the entity for the given token
function oauth_lookup_token_entity($tokenKey, $token_type, $consumer) {/*{{{*/

  if (!$tokenKey) {
    return NULL;
  }

  if ($token_type == 'access') {
    $tokens = get_entities_from_metadata('accessToken', $tokenKey, 'object', 'oauthtoken', 0, 1);
  } else if ($token_type == 'request') {
    $tokens = get_entities_from_metadata('requestToken', $tokenKey, 'object', 'oauthtoken', 0, 1);
  } else {
    $tokens = NULL;
  }
  if ($tokens && $tokens[0]) {
    $tokEnt = $tokens[0];
    if ($consumer) {
      // double-check against the consumer if given
      if ($tokEnt->consumerKey == $consumer->key) {
	return $tokEnt;
      } else {
	return NULL;
      }
    } else {
      // no consumer to check against, so just return the token
      return $tokEnt;
    }
  } else {
    return NULL;
  }
}/*}}}*/
  
// creates a token object from an entity object
function oauth_token_from_entity($tokEnt) {
  if ($tokEnt->requestToken) {
    return new OAuthToken($tokEnt->requestToken, $tokEnt->secret);
  } else if ($tokEnt->accessToken) {
    return new OAuthToken($tokEnt->accessToken, $tokEnt->secret);
  } else {
    return NULL;
  }
}


// get a request token from the given URL
function oauth_get_new_request_token($consumer, $url) {
  
  $sha = new OAuthSignatureMethod_HMAC_SHA1();

  $req = OAuthRequest::from_consumer_and_token($consumer, NULL, 'GET', $url);
  $req->sign_request($sha, $consumer, NULL);

  $tokenString = oauth_util_getUrl($req->to_url());
  $tokenParts = array();
  parse_str($tokenString, $tokenParts);

  $token = new OAuthToken($tokenParts['oauth_token'], $tokenParts['oauth_token_secret']);

  return $token;

}


// get an access token from the given URL and request token
function oauth_get_new_access_token($consumer, $tokEnt, $url) {

  $reqToken = oauth_token_from_entity($tokEnt);

  $sha = new OAuthSignatureMethod_HMAC_SHA1();
  
  $req = OAuthRequest::from_consumer_and_token($consumer, $reqToken, 'GET', $url);
  $req->sign_request($sha, $consumer, $reqToken);

  $tokenString = oauth_util_getUrl($req->to_url());
  $tokenParts = array();
  parse_str($tokenString, $tokenParts);

  $token = new OAuthToken($tokenParts['oauth_token'], $tokenParts['oauth_token_secret']);

  return $token;

}

// save the request token to a new entity
function oauth_save_request_token($token, $consumer, $user) {

  $tokEnt = new ElggObject();
  $tokEnt->subtype = 'oauthtoken';
  if ($user) {
    $tokEnt->owner_guid = $user->getGUID();
    $tokEnt->container_guid = $user->getGUID();
  } else {
    // user can potentially be null
    $tokEnt->owner_guid = 0;
    $tokEnt->container_guid = 0;
  }
  $tokEnt->access_id = ACCESS_PUBLIC; // needs to be readable (but this doesn't feel right...)

  $tokEnt->save();

  $tokEnt->requestToken = $token->key;
  $tokEnt->secret = $token->secret;
  $tokEnt->consumerKey = $consumer->key;
  $tokEnt->save();

  return $tokEnt;
}

// save the access token to the given entity
function oauth_save_access_token($tokEnt, $token) {

  // clear out old data
  $tokEnt->clearMetaData('requestToken');
  $tokEnt->clearMetaData('secret');
  
  // reuse this token object for the access token
  $tokEnt->accessToken = $token->key;
  $tokEnt->secret = $token->secret;

  $tokEnt->save();

  return $tokEnt;

}

// get or create an OAuth server
function oauth_get_server() {
  global $OAUTH_SERVER; // cache the object
  if (!$OAUTH_SERVER) {
    $OAUTH_SERVER = new OAuthServer(new ElggOAuthDataStore());
    $OAUTH_SERVER->add_signature_method(new OAuthSignatureMethod_HMAC_SHA1());
    $OAUTH_SERVER->add_signature_method(new OAuthSignatureMethod_PLAINTEXT());
    $OAUTH_SERVER->add_signature_method(new OAuthSignatureMethod_RSA_SHA1());
  }
  return $OAUTH_SERVER;
  
}

// check permissions to let people claim unclaimed tokens
function oauth_permissions_check($hook, $entity_type, $returnvalue, $params) {

  if ($returnvalue) {
    return $returnvalue;
  }

  $ent = $params['entity'];
  $user = $params['user'];

  // anybody can edit an unclaimed token
  if ($ent->getSubtype() == 'oauthtoken' && !$ent->getOwner()) {
    return true;
  }

  
  return false;


}

// get the user associated with this set of oauth credentials (if available)
function oauth_session_get_user($hook, $entity_type, $returnvalue, $params) {
  global $CONFIG, $SESSION, $OAUTH_USER, $OAUTH_LOOKUP_FLAG;

  // keep our own cached copy around
  // storing this in the session variable leads to some unwanted side effects
  if ($OAUTH_USER) {
    return $OAUTH_USER;
  }


  /*
  print $hook;
  print $entity_type;
  print_r($returnvalue);
  print_r($params);
  */

  $tok = get_input('oauth_token');

  //print '===';
  //var_dump(debug_backtrace());
  //print "\n";
  //print '***';

  if (!$OAUTH_LOOKUP_FLAG && $tok) {
    try {

      // we should only ever ask this question once:
      // this flag is set so that we can use the DB functions in
      // the process of verifying the OAuth token information
      // without going into an infinite loop

      $OAUTH_LOOKUP_FLAG = TRUE;

      //print 'a';

      $server = oauth_get_server();

      //print 'b';

      $req = OAuthRequest::from_request(null, null, oauth_get_params());

      //print 'c';

      $ct = $server->verify_request($req);

      //print 'd';
      
      $consumer = $ct[0];
      $token = $ct[1];
      
      //print 'e';
      //print $token;
      
      $tokEnt = oauth_lookup_token_entity($token->key, 'access', $consumer);
      
      //print 'f';

      if ($tokEnt) {
	//print 'foo';

	//print_r($tokEnt->getOwnerEntity());

	//$SESSION['user'] = $tokEnt->getOwnerEntity();
	$OAUTH_USER = $tokEnt->getOwnerEntity();

	// try logging in?
	login($OAUTH_USER, false);

	return $OAUTH_USER;
      }
    } catch (OAuthException $e) {
      
      //print($e->getMessage() . "\n<hr />\n");
      //die();

    }
  }

  return $returnvalue;

}

// get the oauth parameters using the elgg get_input library and filters
function oauth_get_params() {
  global $CONFIG;

  $params = array();
  foreach ($CONFIG->input as $k => $v) {
    if (substr($k, 0, 6) == 'oauth_') { // add in only the oauth_ parameters
      $params[$k] = $v;
    }
  }

  return $params;
}


// pulled from our utils library, depends on CURL being installed
function oauth_util_getUrl($url, $username = null, $password = null, $post = FALSE, $data = '', $headers = null) {

  $userAgent = 'OAuth Client (Elgg)';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_FAILONERROR, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_AUTOREFERER, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_VERBOSE, 1);

  if ($username && $password) {
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
  }

  if ($post) {
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  }

  if ($headers) {
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  }

  $html = curl_exec($ch);
  $rc = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  //print '[' . $url . ':' . $html . ':' . $rc . ']' . "\n";

  if (!$html && $rc != 200) {
    return $rc;
  } else {
    return $html;
  }

}


// Make sure the profile initialisation function is called on initialisation
register_elgg_event_handler('init','system','oauth_init');
		
?>
