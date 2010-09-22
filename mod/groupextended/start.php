<?php
/**
 * Elgg groupextended plugin
 *
 * @package ElggGroupExtended
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Diego Andrés Ramírez Aragón <diego@somosmas.org>
 * @copyright Corporación Somos más - 2008
 * @link http://www.somosmas.org
 */

/**
 * Group extended initialization
 *
 * Configures the hook for extend profile fields and the proper handler for each new type
 */
function groupextended_init(){

  extend_view('css','groupextended/css');
  extend_view("metatags","groupextended/js");

  register_action("groups/addtogroup-group",false, dirname(__FILE__) . "/actions/addtogroup.php");
  register_action("groups/joingroup",false, dirname(__FILE__) . "/actions/join.php");
  register_action("groups/editmembers",false, dirname(__FILE__) . "/actions/editmembers.php");

  register_plugin_hook("profile:fields","group","groupextended_fields");
  register_plugin_hook("plugin:setting","plugin","group_global_features_handler");

  register_elgg_event_handler("create","group","group_type_handler");
  register_elgg_event_handler("update","group","group_type_handler");

  register_elgg_event_handler("create","group","group_features_handler");
  register_elgg_event_handler("update","group","group_features_handler");

  register_elgg_event_handler("create","group","group_iconprocess_handler");
  register_elgg_event_handler("update","group","group_iconprocess_handler");

  register_page_handler('groupextended','groupextended_page_handler');

  register_page_handler('networks','networks_page_handler');
  register_page_handler('organizations','organizations_page_handler');

  register_elgg_event_handler('join','group','groupextended_user_join_event_listener',0);
  register_elgg_event_handler('leave','group','groupextended_user_leave_event_listener',0);

}

/**
 * Listens to a group join event and adds a user to the group's access control
 *
 */
function groupextended_user_join_event_listener($event, $object_type, $object) {

  $group = $object['group'];
  $user = $object['user'];
  if($user instanceof ElggUser){
    return true;
  }

  $user = $user->getOwner();
  if(!$group->isMember($user)){
    $acl = $group->group_acl;
    add_user_to_access_collection($user, $acl);
  }
  return false;
}

/**
 * Listens to a group leave event and removes a user from the group's access control
 */
function groupextended_user_leave_event_listener($event, $object_type, $object) {
  global $CONFIG;
  $group = $object['group'];
  $user = $object['user'];
  if($user instanceof ElggUser){
    return true;
  }

  $user = $user->getGUID();
  if($group->isMember($user)){
    $acl = $group->group_acl;
    // I have to use this because the remove_user_from_access_collection function need that user_id must a user
    $collections = get_write_access_array();

    if ((array_key_exists($acl, $collections) || $collection->owner_guid == 0)) {
      delete_data("delete from {$CONFIG->dbprefix}access_collection_membership where access_collection_id = {$acl} and user_guid = {$user}");
    }
  }
  return false;
}

/**
 * Plugin hook that add the 'type' field to the groups profile
 *
 * @param string $hook
 * @param string $entity_type Groups
 * @param string $returnvalue Groups profile fields
 * @param mixed $params null
 * @return mixed
 */
function groupextended_fields($hook, $entity_type, $returnvalue, $params){
  //@todo Make this configurable via Web with cache handling
  $options = array(
  elgg_echo("groupextended:type:network")=>"groupextended:type:network",
  elgg_echo("groupextended:type:organization")=>"groupextended:type:organization",
  elgg_echo("groupextended:type:group")=>"groupextended:type:group"
  );
  //External configuration for now
  if(file_exists(dirname(__FILE__)."/config.php")){
    @require_once (dirname(__FILE__))."/config.php";
  }
  $fields = array_merge(array('group_type'=>array("radio",$options)),$returnvalue);
  return $fields;
}

/**
 * Group creation event handler
 *
 * @param string $event
 * @param string $object_type
 * @param mixed $object
 * @return boolean
 */
function group_type_handler($event, $object_type, $object){
  switch($event){
    case "create":
    case "update":
      $type = $object->group_type;
      if(!empty($type)){
        //Registering metadata in all the registered languages for easy localized search
        $translations = get_installed_translations();
        foreach($translations as $key=>$value){
          $var = "group_type_{$key}";
          $object->clearMetadata($var);
          $object->$var = elgg_echo($type,$key);
        }
      }
      break;
  }
  return true;
}

/**
 * Event handler for handle the global groups feature configuration
 * @param string $event
 * @param string $object_type
 * @param mixed $object
 * @return boolean
 */
function group_features_handler($event,$object_type,$object){
  switch($event){
    case "create":
    case "update":
      $object = group_features_update($object);
      break;
  }
  return true;
}

/**
 * Event handler for handle the icon generation process replace
 * @param string $event
 * @param string $object_type
 * @param mixed $object
 * @return boolean
 */
function group_iconprocess_handler($event,$object_type,$object){
  switch($event){
    case "create":
    case "update":
      $squareicon = get_plugin_setting("squareicon","groupextended");
      group_iconprocess_overwrite($object,$squareicon);
      break;
  }
  return true;
}

/**
 * Groupextended settings handler for update the group feature configuration when it changes
 * @param string $event 'plugin_settings_save'
 * @param string $object_type 'groupextended'
 * @param object $object Plugin entity object
 * @return boolean
 */
function group_global_features_handler($hook, $entity_type, $returnvalue, $params){
  if(array_key_exists("plugin",$params) && $params["plugin"]=="groupextended"){
    $groups = get_entities("group","",0,"",null);
    if(!empty($groups)){
      $squareicon = get_plugin_setting("squareicon","groupextended");
      foreach($groups as $group){
        $group = group_features_update($group,true);
        group_iconprocess_overwrite($group,$squareicon);
      }
    }
  }
}

function group_iconprocess_overwrite($object,$square="yes"){
  set_time_limit(0);
  ini_set('memory_limit', '1024M');
  $square = ($square=="yes");
  $prefix = "groups/".$object->guid;
  $filehandler = new ElggFile();
  $filehandler->owner_guid = $object->owner_guid;
  $filehandler->setFilename("{$prefix}.jpg");

  if ($filehandler->exists()) {
    $thumbtiny = get_resized_image_from_existing_file($filehandler->getFilenameOnFilestore(),25,25, $square);
    $thumbsmall = get_resized_image_from_existing_file($filehandler->getFilenameOnFilestore(),40,40, $square);
    $thumbmedium = get_resized_image_from_existing_file($filehandler->getFilenameOnFilestore(),100,100, $square);
    if ($thumbtiny) {

      $thumb = new ElggFile();
      $thumb->owner_guid = $object->owner_guid;
      $thumb->setMimeType('image/jpeg');
      $thumb->setFilename($prefix."tiny.jpg");
      $thumb->delete();
      $thumb->open("write");
      $thumb->write($thumbtiny);
      $thumb->close();

      $thumb->setFilename($prefix."small.jpg");
      $thumb->delete();
      $thumb->open("write");
      $thumb->write($thumbsmall);
      $thumb->close();

      $thumb->setFilename($prefix."medium.jpg");
      $thumb->delete();
      $thumb->open("write");
      $thumb->write($thumbmedium);
      $thumb->close();
    }
  }
}
/**
 * Updates group features taking how reference the global configuration
 *
 * @param object $object Group object to be updated
 * @return object
 */
function group_features_update($object,$globalproperty=false){
  $properties = array("forum_enable",
  					  "files_enable",
  					  "pages_enable");
  foreach($properties as $value){
    $value_old = $value."_old";
    if(get_plugin_setting($value,"groupextended")=="no"){
      $object->set($value_old,$object->get($value));
      $object->set($value,"no");
    }
    if(get_plugin_setting($value,"groupextended")=="yes"){
      $old = $object->get($value_old);
      $new = $object->get($value);
      if($globalproperty && !empty($old)){
        $object->set($value,$old);
      }
    }
  }
  return $object;
}

/**
 * Group extended profile handler
 *
 * @param mixed $page
 */
function groupextended_page_handler($page){
  global $CONFIG;

  if(isset($page[0])){
    if($page[0]=="js"){
      header("Content-type: text/javascript");
      echo file_get_contents(dirname(__FILE__) . "/js/ui.tabs.js");
      exit;
    }
    if($page[0]=="membersadmin"){
      set_context("groups");
      set_input('group_guid', $page[1]);
      include($CONFIG->pluginspath . "groupextended/membersadmin.php");
      exit;
    }
  }
}

/**
 * Group extended page setup
 *
 */
function groupextended_pagesetup(){
  global $CONFIG;
  $page_owner = page_owner_entity();
  if($page_owner instanceof ElggGroup && get_context()=="groups"){

    if (isloggedin() && $page_owner->canEdit()){
      add_submenu_item(elgg_echo('groupextended:members:admin'),$CONFIG->wwwroot."pg/groupextended/membersadmin/" . $page_owner->getGUID(), '1groupsactions');
    }
  }
}

/**
 * Networks page handler
 *
 * @param mixed $page
 */
function networks_page_handler($page){
  global $CONFIG;
  if (isset($page[0])){
    switch($page[0]){
      case "world":
        set_context('networks');
        set_page_owner(0);
        include($CONFIG->pluginspath . "groupextended/networks.php");
        break;
    }
  }
}

/**
 * Organizations page handler
 *
 * @param mixed $page
 */
function organizations_page_handler($page){
  global $CONFIG;
  if (isset($page[0])){
    switch($page[0]){
      case "world":
        set_context('organizations');
        set_page_owner(0);
        include($CONFIG->pluginspath . "groupextended/organizations.php");
        break;
    }
  }
}

register_elgg_event_handler('init','system','groupextended_init');
register_elgg_event_handler('pagesetup','system','groupextended_pagesetup');

?>
