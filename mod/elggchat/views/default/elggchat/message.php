<?php
	
	$message = $vars['message'];
	$offset = $vars['offset'];
	$user = $vars['message_owner'];
	
	$smiley_url = $vars['url'] . "action/elggchat/get_smiley?_" . time() . "&smiley=";
	
	$tam = "16px";
	
	$randomint = time();
	$smileys = array(
		":(|)" => "<img src='" . $smiley_url . "smileys/monkey.png' width='$tam' height='$tam'>",
		"=D" => "<img src='" . $smiley_url . "smileys/smile-big.png' width='$tam' height='$tam'>",
		"=)" => "<img src='" . $smiley_url . "smileys/smile.png' width='$tam' height='$tam'>",
		":)" => "<img src='" . $smiley_url . "smileys/smile.png' width='$tam' height='$tam'>",
		";)" => "<img src='" . $smiley_url . "smileys/wink.png' width='$tam' height='$tam'>",
		":(" => "<img src='" . $smiley_url . "smileys/sad.png' width='$tam' height='$tam'>",
		":D" => "<img src='" . $smiley_url . "smileys/laugh.png' width='$tam' height='$tam'>",
		"x-(" => "<img src='" . $smiley_url . "smileys/angry.png' width='$tam' height='$tam'>",
		":@" => "<img src='" . $smiley_url . "smileys/angry.png' width='$tam' height='$tam'>",
		"B-)" => "<img src='" . $smiley_url . "smileys/cool.png' width='$tam' height='$tam'>",
		":'(" => "<img src='" . $smiley_url . "smileys/crying.png' width='$tam' height='$tam'>",
		"\m/" => "<img src='" . $smiley_url . "smileys/desire.png' width='$tam' height='$tam'>",
		":-o" => "<img src='" . $smiley_url . "smileys/shock.png' width='$tam' height='$tam'>",
		":-S" => "<img src='" . $smiley_url . "smileys/confused.png' width='$tam' height='$tam'>",
		":S" => "<img src='" . $smiley_url . "smileys/confused.png' width='$tam' height='$tam'>",
		":-|" => "<img src='" . $smiley_url . "smileys/dazed.png' width='$tam' height='$tam'>",
		":P" => "<img src='" . $smiley_url . "smileys/tongue.png' width='$tam' height='$tam'>",
		":-D" => "<img src='" . $smiley_url . "smileys/laugh.png' width='$tam' height='$tam'>",
		";-)" => "<img src='" . $smiley_url . "smileys/wink.png' width='$tam' height='$tam'>",
		";^)" => "<img src='" . $smiley_url . "smileys/sarcastic.png' width='$tam' height='$tam'>",
		"(l)" => "<img src='" . $smiley_url . "smileys/love.png' width='$tam' height='$tam'>",
		"(u)" => "<img src='" . $smiley_url . "smileys/love-over.png' width='$tam' height='$tam'>",
		
		);
	
	if($message->access_id != ACCESS_PRIVATE || $user->guid == get_loggedin_userid()){
		$result = "";		
		if($message->name == ELGGCHAT_MESSAGE){
			$result .= "<div name='message' id='" .  $offset . "' class='messageWrapper'>";
			
			$result .= "<table ><tr><td rowspan='2'>";
			$result .= "<a href='" . $user->getURL() . "'><img class='messageIcon' alt='" . $user->name . "' src='". $user->getIcon('tiny') . "'></a>";
			$result .= "</td><td class='messageName'><a href='" . $user->getURL() . "'>" . $user->name . "</a></td></tr>";
			
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