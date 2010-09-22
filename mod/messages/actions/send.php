<?php

	/**
	 * Elgg send a message action page
	 * 
	 * @package ElggMessages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */
	 
	 // Make sure we're logged in (send us to the front page if not)
		if (!isloggedin()) forward();

	// Get input data
		$title = get_input('title'); // message title
		$message_contents = get_input('message'); // the message
		$send_to = get_input('send_to'); // this is the user guid to whom the message is going to be sent
		$send_to_group = get_input('send_to_group'); // this is the group guid to whom the message is going to be sent - facyla
		$send_to_collection = get_input('send_to_collection'); // this is the collection of friends id to whom the message is going to be sent - Adrian
		$reply = get_input('reply',0); // this is the guid of the message replying to
		
	// Cache to the session to make form sticky
		$_SESSION['msg_to'] = $send_to;
		$_SESSION['msg_to_group'] = $send_to_group; // group support - facyla
		$_SESSION['msg_to_collection'] = $send_to_collection; //collection of friends support - Adrian
		$_SESSION['msg_title'] = $title;
		$_SESSION['msg_contents'] = $message_contents;

		if (empty($send_to) && empty($send_to_group) && empty($send_to_collection)) { // modifi� pour support groupes & collections d'amis - Adrian
			register_error(elgg_echo("messages:user:blank"));
			forward("mod/messages/send.php");
		}
		
		$user = get_user($send_to);
//    $group = get_user($send_to_group);  // group support - facyla
    if (!empty($send_to_group)) { // sinon on obtient la liste de tous les utilisateurs quand pas de groupe spécifié !
      $group = get_group_members($send_to_group, 9999, 0, 0 , false);  // group support - facyla
    }
    
    //collection of friends
    if(!empty($send_to_collection)){
    	$collection = get_members_of_access_collection($send_to_collection, false); //get all the friends guid of the user's collection of friends - Adrian
    }
    
		if (!$user) {
      if (!$group && !$collection) {  // on teste l'existence du groupe si pas de destinataire -utilisateur- trouvé)
        register_error(elgg_echo("messages:group:nonexist"));
        forward("mod/messages/send.php");
      }
      /* group support - facyla: i've disabled user error notification if group exists (displays group error instead, or nothing if success)
			register_error(elgg_echo("messages:user:nonexist"));
			forward("mod/messages/send.php");
      */
		}

	// Make sure the message field, send to field and title are not blank
		if (empty($message_contents) || empty($title)) {
			register_error(elgg_echo("messages:blank"));
			forward("mod/messages/send.php");
		}
		
	// Otherwise, 'send' the message
	  if ($user) { $result = messages_send($title,$message_contents,$send_to,0,$reply); } // added if loop for group support
	  if ($group) { // group support - facyla
      foreach ($group as $member) {
        if ($member->guid != $_SESSION['user']->getGUID()) {
          $result += messages_send($title,$message_contents,$member->guid,0,$reply);
        } else {
          // on saute l'expéditeur
        }
      }
	  }
	  
	  if ($collection) { // collection of friends support - Adrian
      foreach ($collection as $member) {
        if ($member->guid != $_SESSION['user']->getGUID()) {
          $result += messages_send($title,$message_contents,$member->guid,0,$reply);
        } else {
          // on saute l'expéditeur
        }
      }
	  }

			
	// Save 'send' the message
		if (!$result) {
			register_error(elgg_echo("messages:error"));
			forward("mod/messages/send.php");
		}

	// successful so uncache form values
		unset($_SESSION['msg_to']);
		unset($_SESSION['msg_to_group']);
		unset($_SESSION['msg_to_collection']);
		unset($_SESSION['msg_title']);
		unset($_SESSION['msg_contents']);
			
	// Success message
		system_message(elgg_echo("messages:posted"));
	
	// Forward to the users inbox
		forward('pg/messages/' . $_SESSION['user']->username);	

?>
