<?PHP

	/**
	 * User Contact List - Plugin
	 * 
	 * @package User Contact List
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Michael T Jones
	 * @copyright Michael T Jones 2008
	 * @link http://www.facebake.com/
	 */

function user_contact_list_init()
{
	register_page_handler('user_contact_list','user_contact_list_page_handler');
	extend_view('css','userlist/css');
}

function user_contact_list_pagesetup()
{
	if (get_context() == 'admin' && isadminloggedin()) 
	{
		global $CONFIG;
		add_submenu_item(elgg_echo('userclist:title'), $CONFIG->wwwroot . 'pg/user_contact_list/');
	}
}

function user_contact_list_page_handler($page) 
{
	global $CONFIG;
	if(isset($page[1])) //this allows pagination
		set_input('page', $page[1]);
	include($CONFIG->pluginspath . "user_contact_list/index.php"); 
}

register_elgg_event_handler('init','system','user_contact_list_init');
register_elgg_event_handler('pagesetup','system','user_contact_list_pagesetup');

?>