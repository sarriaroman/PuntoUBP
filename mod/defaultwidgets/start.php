<?php
/**

 * Elgg default_widgets plugin.
 *
 * @package DefaultWidgets
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU
 * @author Milan Magudia
 * @copyright HedgeHogs.net
 * @link http://www.hedgehogs.net
 * 
 * Code based on the work of:
 * @author Jade Dominguez, Chad Sowald
 * @copyright tastyseed,  2008
 * @copyright Chad Sowald, 2008
 * @link http://www.tastyseed.com
 * @link http://www.chadsowald.com
 * @author Diego Ramirez
 * @links http://www.somosmas.org
 * 
 */

global $CONFIG;

function defaultwidgets_init() {
	
	// Load system configuration
	register_page_handler ( 'defaultwidgets', 'defaultwidgets_page_handler' );
	
	// register create user event hook
	register_elgg_event_handler ( 'create', 'user', 'defaultwidgets_newusers' );

}

function defaultwidgets_newusers($event, $object_type, $object) {
	
	$guid = $object->guid;
	
	// if an admin creates a user we need to store their credentials so they so they can be logged back
	if (isadminloggedin ()) {
		$user_orig = $_SESSION ['user'];
	} else {
		$user_orig = false;
	}
	
	/*
	the add_widgets function only executes if the user has permissions to add widgets to his profile/dashboard.
	Since there is no user yet logged in, we need to artificially login the new user
	*/
	$log_user_in = login ( $object );
	
	if ($log_user_in) {
		
		if (! empty ( $guid )) {
			if ($user = get_entity ( $guid )) {
				if ($user->canEdit ()) {
					$contexts = array ('profile', 'dashboard' );
					
					// get the entities for the module
					$entities = get_entities ( "object", "moddefaultwidgets", 0, "", 9999 );
					
					// check if the entity exists
					if (isset ( $entities [0] )) {
						
						// get the widgets for the context
						$entity = $entities [0];
						
						foreach ( $contexts as $context ) {
							$current_widgets = $entity->$context;
							list ( $left, $middle, $right ) = split ( '%%', $current_widgets );
							
							// split columns into seperate widgets
							$area1widgets = split ( '::', $left );
							$area2widgets = split ( '::', $middle );
							$area3widgets = split ( '::', $right );
							
							// clear out variables if no widgets are available
							if ($area1widgets [0] == "") $area1widgets = false;
							if ($area2widgets [0] == "") $area2widgets = false;
							if ($area3widgets [0] == "") $area3widgets = false;
								
							// generate left column widgets for a new user 
							foreach ( $area1widgets as $i => $widget ) {
								//if (is_plugin_enabled($widget)) {
								add_widget ( $guid, $widget, $context, ($i + 1), 1 );
								//}
							}
							
							// generate middle column widgets for a new user
							foreach ( $area2widgets as $i => $widget ) {
								//if (is_plugin_enabled($widget)) {
								add_widget ( $guid, $widget, $context, ($i + 1), 2 );
								//}
							}
							
							// generate right column widgets for a new user
							foreach ( $area3widgets as $i => $widget ) {
								//if (is_plugin_enabled($widget)) {
								add_widget ( $guid, $widget, $context, ($i + 1), 3 );
								//}
							}
						}
					}
				}
			}
		}
	}
	
	// if an admin created this user, log the new user out, log the admin back in 
	if (! empty ( $user_orig )) {
		if(! login ( $user_orig )) {
			// if there something goes wrong with logging back in then warn the administrator
			register_error(elgg_echo('defaultwidgets:admin:loginfailure'));
		}
	}
}

// simple page handler
function defaultwidgets_page_handler($page) {
	global $CONFIG;
	
	if (isset ( $page [0] )) {
		
		switch ($page [0]) {
			case "profile" :
				@include (dirname ( __FILE__ ) . "/profile.php");
				break;
			case "dashboard" :
				@include (dirname ( __FILE__ ) . "/dashboard.php");
				break;
		}
	} else {
		register_error ( elgg_echo ( "defaultwidgets:admin:notfound" ) );
		forward ( $CONFIG->wwwroot );
	}
	return true;
}

// function to add a submenu to the admin panel. 
function defaultwidgets_pagesetup() {
	if (get_context () == 'admin' && isadminloggedin ()) {
		global $CONFIG;
		add_submenu_item ( elgg_echo ( 'defaultwidgets:menu:profile' ), $CONFIG->wwwroot . 'pg/defaultwidgets/profile' );
		add_submenu_item ( elgg_echo ( 'defaultwidgets:menu:dashboard' ), $CONFIG->wwwroot . 'pg/defaultwidgets/dashboard' );
	}
}

// Make sure the status initialisation function is called on initialisation
register_elgg_event_handler ( 'init', 'system', 'defaultwidgets_init' );
register_elgg_event_handler ( 'pagesetup', 'system', 'defaultwidgets_pagesetup' );
register_action ( "defaultwidgets/update", false, $CONFIG->pluginspath . "defaultwidgets/actions/update.php" );
?>
