<?php

	/**
	*	Action to add or remove Likes
	*
	*	Román A. Sarria
	*/
	
	// We don't want black holes ¬¬
	// Make sure we're logged in (send us to the front page if not)
		gatekeeper();

	// Getting data
	$uid = get_input('uid');
	$pid = get_input('pid');
	$type = get_input('type');
	
	$action = get_input('action');
	
	if( !empty( $action ) && $action == "delete" ) {
		delete_like( $pid, $uid );
	} else {
	
		if( is_like( $pid, $uid ) ) {
			update_like( $pid, $uid, $type );
		
			//system_message("Se decidio por lo contrario xD");
		} else {
		
			add_like( $pid, $uid, $type );
		
			//system_message(elgg_echo("generic_comment:posted"));
		
		}
	}
	//friendlyforward();
	forward( "mod/riverdashboard/" . "#$pid" );

?>