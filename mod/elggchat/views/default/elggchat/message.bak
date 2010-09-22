<?php
	
	$message = $vars['message'];
	$offset = $vars['offset'];
	$user = $vars['message_owner'];
	
	$smiley_url = $vars['url'] . "action/elggchat/get_smiley?_" . time() . "&smiley=";
	
	$randomint = time();
	$smileys = array(
		":(|)" => "<img src='" . $smiley_url . "animated_smileys/monkey.gif'>",
		"=D" => "<img src='" . $smiley_url . "animated_smileys/smile.gif'>",
		"=)" => "<img src='" . $smiley_url . "animated_smileys/smile.gif'>",
		":)" => "<img src='" . $smiley_url . "animated_smileys/smile.gif'>",
		";)" => "<img src='" . $smiley_url . "animated_smileys/wink.gif'>",
		":(" => "<img src='" . $smiley_url . "animated_smileys/frown.gif'>",
		":D" => "<img src='" . $smiley_url . "animated_smileys/grin.gif'>",
		"x-(" => "<img src='" . $smiley_url . "animated_smileys/angry.gif'>",
		"B-)" => "<img src='" . $smiley_url . "animated_smileys/cool.gif'>",
		":'(" => "<img src='" . $smiley_url . "animated_smileys/cry.gif'>",
		"\m/" => "<img src='" . $smiley_url . "animated_smileys/rockout.gif'>",
		":-o" => "<img src='" . $smiley_url . "animated_smileys/shocked.gif'>",
		":-/" => "<img src='" . $smiley_url . "animated_smileys/slant.gif'>",
		":-|" => "<img src='" . $smiley_url . "animated_smileys/straightface.gif'>",
		":P" => "<img src='" . $smiley_url . "animated_smileys/tongue.gif'>",
		":-D" => "<img src='" . $smiley_url . "animated_smileys/nose_grin.gif'>",
		";-)" => "<img src='" . $smiley_url . "animated_smileys/wink_nose.gif'>",
		";^)" => "<img src='" . $smiley_url . "animated_smileys/wink_big_nose.gif'>",
		
		);
	
	if($message->access_id != ACCESS_PRIVATE || $user->guid == get_loggedin_userid()){
		$result = "";
		if($message->name == ELGGCHAT_MESSAGE){
			$result .= "<div name='message' id='" .  $offset . "' class='messageWrapper'>";
			
			$result .= "<table ><tr><td rowspan='2'>";
			$result .= "<a href='" . $user->getURL() . "'><img class='messageIcon' alt='" . $user->name . "' src='". $user->getIcon('tiny') . "'></a>";
			$result .= "</td><td class='messageName'>" . $user->name . "</td></tr>";
			
			$result .= "<tr><td>";

			$result .= str_ireplace(array_keys($smileys), array_values($smileys), $message->value);
			$result .= "</td></tr></table>";
			$result .= "</div>";
		} elseif($message->name == ELGGCHAT_SYSTEM_MESSAGE) {
			$result .= "<div name='message' id='" .  $offset . "' class='systemMessageWrapper'>";
			$result .= $message->value;
			$result .= "</div>";
		}
		echo $result;
	}
?>