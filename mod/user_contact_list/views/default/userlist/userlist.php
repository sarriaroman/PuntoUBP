<?PHP
	
	//Original plugin:

	/**
	 * User Contact List - Plugin
	 * 
	 * @package User Contact List
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Michael T Jones
	 * @copyright Michael T Jones 2008
	 * @link http://www.facebake.com/
	 */

	//Improvements and corrections:	

	/**
	 * @package User Contact List
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Carlos Roberto Brolo
	 * @link http://www.engasado.com
	 * @email carlos@brolotobar.com
	 * Modifications and Improvements shown by *1 after each code line.
	 */

global $CONFIG;

admin_gatekeeper();

//*1 Code explanation: This piece of code validates email
$to_user_guid = get_input(to_user_guid);                        //*1
if ($to_user_guid != "")					//*1
{								//*1
	$access_status = access_get_show_hidden_status();	//*1
	access_show_hidden_entities(true);			//*1
								//*1
	$obj = get_entity($to_user_guid);			//*1
	$obj->enable();						//*1
	set_email_validation_status($to_user_guid, true);	//*1
}								//*1

//*1 I added guid extraction
//$query = "SELECT name, username, email, guid, promo FROM {$CONFIG->dbprefix}users_entity ORDER BY promo, name"; 
$query = "SELECT name, username, email, guid FROM {$CONFIG->dbprefix}users_entity ORDER BY name"; 
$result = get_data($query);



//Page Navigation
{
	$user_per_page = 10;  //users diplayed per page
	
	$total_users = count($result);
	echo "<br /><b>".elgg_echo("userclist:totalpages")."</b> ".$total_users."<br /><br />";
	$page = get_input(page);
	echo "<center>"; //*1 
	if($page=="")
		$page = 1;
	$total_pages = ceil(floatval($total_users)/floatval($user_per_page));
	if($page > 1)
		echo "<a href=\"".$vars['url']."pg/user_contact_list/".($page - 1)."\">".elgg_echo("userclist:lastpage")."</a>"; else echo elgg_echo("userclist:lastpage"); // *1 Erased pg/user_contact_list/page/ & added the else statement
	echo " | ".elgg_echo("userclist:onpage1")." ".$page." ".elgg_echo("userclist:onpage2")." ".$total_pages." ".elgg_echo("userclist:onpage3")." | ";
	if(($total_pages - $page) > 0)
		echo "<a href=\"".$vars['url']."pg/user_contact_list/".($page + 1)."\">".elgg_echo("userclist:nextpage")."</a>"; else echo elgg_echo("userclist:nextpage"); // *1 Erased pg/user_contact_list/page/ & added the else statement
	echo "</center><br />";                 // *1 
	
}


//*1 Some Javascript confirmation for actions on webpage
echo "<script language=\"JavaScript\">";		//*1
echo "function cconfirm (msg,ur,va) {";			//*1
echo "if (confirm(msg)) {document.body.innerHTML += '<form id=\"dynForm\" action=\"'+ur+'\" method=\"post\"><input type=\"hidden\" name=\"to_user_guid\" value=\"'+va+'\"></form>'; document.getElementById(\"dynForm\").submit(); }; "; //*1
echo "}"; 						//*1
echo "</script>";					//*1


//*1 Added some new celds
echo "<table class=\"uv_list\"><tr><td><b>&nbsp;</b></td><td><b>Name</b></td><td><b>Username</b></td><td><b>Email</b></td><td><b>U-Ban</b></td><td><b>E-Val</b></td><td><b>U-Del</b></td></tr>"; // * 1


$offset = ($page-1)*$user_per_page;

for($i=$offset;$i<$offset+$user_per_page;$i++)
{
	$row = $result[$i];
	$guid = $row->guid; // * 1
	$queryBanned = "SELECT enabled FROM {$CONFIG->dbprefix}entities WHERE guid='$guid' "; // * 1
	$resultBanned = get_data($queryBanned); // * 1

	// *1 My personal modification (my site)
	//entity_guid = $guid
	//name_id = 10
	//value_id = 11
	$queryValidation = "SELECT entity_guid, name_id, value_id FROM {$CONFIG->dbprefix}metadata WHERE entity_guid='$guid' AND name_id='10' "; // * 1
	$resultValidation = get_data($queryValidation); // * 1


	echo "<tr>";
	//*1 My personal modification (for my site)	
	 //echo "<td>".$row->promo."</td>"; // *2
	  echo "<td> &nbsp; </td>";	
	echo "<td><a href=\"{$CONFIG->wwwroot}pg/profile/{$row->username}\">".$row->name."</a></td>";
	echo "<td>".$row->username."</td>";
	echo "<td>".$row->email."</td>";

	

	// * 1 = Modifications block start
	echo "<td>";
		if ($resultBanned[0]->enabled == yes) 
		{ 
			echo "<a href=\"javascript:cconfirm('".elgg_echo("userclist:confirm:ban")."','".$vars['url']."actions/admin/user/ban?guid=".$row->guid."','".$row->guid."');\"><img src=\"".$vars['url']."mod/user_contact_list/ok.png\" title=\"".elgg_echo("userclist:title:enabled")."\"></a>";
		}
		//Explanation: if enabled is false and email verified. 
		else if (($resultBanned[0]->enabled == no) && ($resultValidation[0]->value_id == 8))
		{
			echo "<a href=\"".$vars['url']."actions/admin/user/unban?guid=".$row->guid."','".$row->guid."');\"><img src=\"".$vars['url']."mod/user_contact_list/banned.png\" title=\"".elgg_echo("userclist:title:disabled")."\"></a>";
		}
		else echo "--";

	echo "</td>";
	//*1 End modifications block

	

	//*1 Another block
	echo "<td>"; 

		if ($resultValidation[0]->value_id == 8)
		{ 
			echo "<img src=\"".$vars['url']."mod/user_contact_list/ok.png\" title=\"".elgg_echo("userclist:title:validated")."\">";
		} 
		else
		{
			echo "<a href=\"javascript:cconfirm('".elgg_echo("userclist:confirm:validate")."','#','".$row->guid."');\"><img src=\"".$vars['url']."mod/user_contact_list/mail.png\" title=\"".elgg_echo("userclist:title:validate")."\"></a>";
			echo get_email_validation_status($row->guid);
		}
	echo "</td>"; 
	echo "<td> <a href=\"javascript:cconfirm('".elgg_echo("userclist:confirm:delete")."','".$vars['url']."actions/admin/user/delete?guid=".$row->guid."','".$row->guid."');\"><img src=\"".$vars['url']."mod/user_contact_list/del.png\" title=\"".elgg_echo("userclist:title:delete")."\"></a> </td>";
	//*1 End another block
	echo "</tr>";

	//*1 Cycle Break needed on completion detection.
	if ($i == $total_users-1) $i = $offset+$user_per_page;
}

echo "</table>";


?>
