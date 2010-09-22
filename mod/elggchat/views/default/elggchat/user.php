<?php 
	/**
	* ElggChat - Pure Elgg-based chat/IM
	* 
	* Nice display of an User for display in Friendspicker and Chat Members
	* 
	* @package elggchat
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	* @version 0.4
	*/
	
$user = $vars["chatuser"];
$view = $vars["view"];

if(!empty($user) && $user instanceof ElggUser){
	$link = $vars["link"];
	$icon = $vars["icon"];
	$iconSize = $vars["iconSize"];
	$onlineStatus = $vars["onlineStatus"];
	
	if($link !== false || $link !== true){
		$link = true;
	}
	
	if($icon !== false || $icon !== true){
		$icon = true;
	}
	
	if($onlineStatus !== false || $onlineStatus !== true){
		$onlineStatus = true;
	}
	
	$result = "";
	
	if( $view === "chat" ) {
		
		if(empty($iconSize) || !in_array($iconSize, array("tiny", "small", "medium", "large", "profile"))){
			$iconSize = "small";
		}
	
		$result .= "<tr class='chatmember'>";
	
		if($icon){
			$result .= "<td id='member_icon'><img src='" . $user->getIcon($iconSize) . "' alt='" . $user->name . "' /></td>";
		 }
	
		if($link){
				$result .= "<td class='chatmemberinfo'><div id='member_info'><a href='" . $user->getUrl() . "' title='" . $user->name . "' rel='" . $user->guid . "'>" . $user->name . "</a></div></td>";
		} else { 
				$result .= "<td class='chatmemberinfo'>". $user->name . "</td>";
		}
	
	} else {
		
		if(empty($iconSize) || !in_array($iconSize, array("tiny", "small", "medium", "large", "profile"))){
			$iconSize = "tiny";
		}
		
		$result .= "<tr class='chat_member'>";
	
		if($icon){
			$result .= "<td><img src='" . $user->getIcon($iconSize) . "' alt='" . $user->name . "' /></td>";
		 }
	
		if($link){
				$result .= "<td class='chatmemberinfo'><a href='" . $user->getUrl() . "' title='" . $user->name . "' rel='" . $user->guid . "'>" . $user->name . "</a></td>";
		} else { 
				$result .= "<td class='chatmemberinfo'>". $user->name . "</td>";
		}
	}
	
	if($onlineStatus){
		$diff = time() - $user->last_action;
		
		$inactive = (int) get_plugin_setting("onlinestatus_inactive", "elggchat");
		$active = (int) get_plugin_setting("onlinestatus_active", "elggchat");
		
		$title = sprintf(elgg_echo("elggchat:session:onlinestatus"), friendly_time($user->last_action));
		
		if($diff <= $active){
			$result .= "<td><div class='online_status_chat' title='" . $title . "'></div></td>";
		}elseif($diff <= $inactive){
			$result .= "<td><div class='online_status_chat online_status_idle' title='" . $title . "'></div></td>";
		}else{
			$result .= "<td><div class='online_status_chat online_status_inactive' title='" . $title . "'></div></td>";
		}
	}
	
	$result .= "</tr>";
	
	echo $result;
}
?>