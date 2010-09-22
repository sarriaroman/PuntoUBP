<?php
	/**
	* ElggChat - Pure Elgg-based chat/IM
	* 
	* List all the sessions for debugging (admin only)
	* 
	* @package elggchat
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	* @version 0.4
	*/

	admin_gatekeeper();
?>
<div class="contentWrapper">
<?php
	$chat_sessions = get_entities("object", ELGGCHAT_SESSION_SUBTYPE);
	foreach($chat_sessions as $session){
		echo $session->getGUID() . ":<br />";
		echo "time_updated: " . $session->time_updated . "<br />";
		$members = get_entities_from_relationship(ELGGCHAT_MEMBER, $session->getGUID());
		
		foreach($members as $member){
			echo $member->name . "<br />";
		}
		echo "--------------------<br />";
		
		$messages = $session->getAnnotations(ELGGCHAT_MESSAGE);
		foreach($messages as $message){
			$user = get_entity($message->owner_guid);
			echo "<a href='" . $user->getURL() . "'target='_blank'><img alt='" . $user->name . "' src='". $user->getIcon('tiny') . "'></a>";
			
			echo friendly_time ($message->time_created) . "<br/>";
			echo $message->value . "<br/>";
		}
	}
?>
</div>