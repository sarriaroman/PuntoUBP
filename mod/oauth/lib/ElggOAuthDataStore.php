<?php
// data store backed by elgg entities, for use in the server
class ElggOAuthDataStore extends OAuthDataStore {/*{{{*/
  function lookup_consumer($consumer_key) {/*{{{*/
    $consumEnt = oauth_lookup_consumer_entity($consumer_key);
    if ($consumEnt) {
      return oauth_consumer_from_entity($consumEnt);
    } else {
      return NULL;
    }
    
  }/*}}}*/

    // get the entity first, then turn it into an oauth token object
  function lookup_token($consumer, $token_type, $token) {/*{{{*/
    $tokEnt = oauth_lookup_token_entity($token, $token_type, $consumer);
    if ($tokEnt) {
      return oauth_token_from_entity($tokEnt);
    } else {
      return NULL;
    }
  }

  function lookup_nonce($consumer, $token, $nonce, $timestamp) {/*{{{*/
    // currently just pretend that nonces are all ok
    return false; // TODO: nonce lookups
  }/*}}}*/

  function new_request_token($consumer) {/*{{{*/
    $key = md5(time());
    $secret = time() + time();
    $token = new OAuthToken($key, md5(md5($secret)));
    
    // save the token to the database
    //   NOTE: it's not attached to a user yet
    oauth_save_request_token($token, $consumer, NULL);

    return $token;

  }/*}}}*/

  function new_access_token($token, $consumer) {/*{{{*/
    // return a new access token attached to this consumer
    // for the user associated with this token if the request token
    // is authorized
    // should also invalidate the request token

    $reqToken = oauth_lookup_token_entity($token->key, 'request', $consumer);
    if ($reqToken) {

      if ($reqToken->getOwner()) {
	// it's been signed by a user
	$key = md5(time());
	$secret = time() + time();
	$acc = new OAuthToken($key, md5(md5($secret)));
    
	$tokEnt = oauth_save_access_token($reqToken, $acc);
	return $acc;
      } else {
	// otherwise, delete the request token entity
	$tokEnt->delete();
	throw new OAuthException('Invalid request token (not signed by a user): ' . $token);
      }
      
    } else {
      throw new OAuthException('Invalid request token (not found): ' . $token);
    }
  }/*}}}*/

}/*}}}*/

?>