<?php
	expose_function("user.getData", "user_data", array( 
		"username" => array(
			'type' => "string",
		),
	), "Datos de Perfil", "GET", false, false);

	function user_data($username) {
		$user = get_user_by_username( $username );
		
		$vars = array("name" => $user->name, "icon" => $user->getIcon('medium') );
		
		return $vars;
	}
	
	expose_function("user.login", "user_login", array( 
		"username" => array(
			'type' => "string",
		),
		"password" => array(
			'type' => "string",
		)
	), "Datos de Perfil", "GET", false, false);

	function user_login($username, $password) {
		$user = authenticate( $username, $password );
		
		if( $user == false ) {
			$vars = array("user" => $user, "login" => "NOT OK");
		} else {
			$vars = array("user" => $user, "login" => "OK", "name" => $user->name, "icon" => $user->getIcon('medium') );
		}
		
		return $vars;
	}
	
	expose_function("user.comment", "post_comment", array( 
		"username" => array(
			'type' => "string",
		),
		"password" => array(
			'type' => "string",
		),
		"comment" => array(
			'type' => "string",
		)
	), "Comentario", "GET", false, false);
	
	function post_comment( $username, $comment ) {
		$user = authenticate( $username, $password );
		
		$post = new ElggObject();
		$post->subtype = 'riverpost';
		$post->owner_guid = get_loggedin_userid();
		$post->access_id = ACCESS_LOGGED_IN;
		$post->description = $comment;
		$save = $post->save();
			
		if ($save) {
			add_to_river('river/object/riverpost/create','create',$user->guid,$post->guid);	
		}
	}
?>