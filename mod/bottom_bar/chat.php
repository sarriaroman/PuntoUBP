<?php

        /**
         * Facebook-esque bottom bar
         *
         * @package bottom_bar
         * @author Jay Eames - Sitback
         * @link http://sitback.dyndns.org
         * @copyright (c) Jay Eames 2009
         * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
         */


  require_once(dirname(dirname(dirname(__FILE__))) . '/engine/start.php');

  if (get_plugin_setting("database_type", "bottom_bar") != "MySQL" && get_plugin_setting("database_type", "bottom_bar") != "ELGG") {

    if ($bbdb = new SQLiteDatabase('data/bbchatdb', 0666, $sqliteerror)) {
      $q = $bbdb->query("PRAGMA table_info('chat')");
      if ($q->numRows() < 6) {
        $query = "CREATE TABLE 'chat' (
          'id' INTEGER AUTO_INCREMENT PRIMARY_KEY,
          'from' VARCHAR(255) NOT NULL DEFAULT '',
          'to' VARCHAR(255) NOT NULL DEFAULT '',
          'message' TEXT NOT NULL,
          'sent' INTEGER NOT NULL,
          'recd' INTEGER NOT NULL DEFAULT 0);";
        $bbdb->query($query, SQLITE_ASSOC, $sqliteerror) or die ($sqliteerror);
      }
    } else {
      die ("<h1>Please make sure the \"data\" directory in \"mod/bottom_bar\" is writeable by the web server user!</h1>");
    }

    if (isloggedin() && !is_null($_REQUEST['action'])) {
      if ($_REQUEST['action']=="rx") {
        $q = $bbdb->query("SELECT * FROM 'chat' WHERE chat.to = '" . $SESSION['user']->guid . "' AND chat.recd = 0 ORDER BY sent LIMIT 1", SQLITE_ASSOC, $error);
        if ($q->numRows()) {
  	  $row = $q->fetch();
 	  if ($bbdb->queryExec("UPDATE chat SET recd = 1 WHERE id='" . $row['id'] . "'", $error)) {
	    $user = get_entity($row['from']);
   	    echo $row['from'] . "|" . $user->name . "|" . stripslashes($row['message']);
	  } else {
	    echo $error;
          }
//        } else {
//	  echo "no messages!";
        }
      } else if ($_REQUEST['action']=="tx") {
        $message = addslashes(html_entity_decode($_REQUEST['message']));
        $bbdb->query("INSERT INTO 'chat' VALUES ('" . md5(time().$message) . "','" . $_REQUEST['from'] . "', '" . $_REQUEST['to'] . "','" . $message . "'," . time() . ", 0)", SQLITE_ASSOC, $error);
        echo $error;
      }
    
    }
  } else if (get_plugin_setting("database_type", "bottom_bar") == "ELGG") {
    if (isloggedin() && !is_null($_REQUEST['action'])) {
      if ($_REQUEST['action']=="rx") {
        $chat = $SESSION['user']->getObjects("bb_chat");

        if (!is_null($chat) && $chat) {
	  $objCount = 0;
  	  foreach ($chat as $c) {
	    if ($objCount++ > 0) {
	      $c->delete;
	    } else {
	      $messages = $c->getAnnotations('messages');
	      foreach ($messages as $msg) {
	        $user = get_entity($msg['owner_guid']);
	        echo $msg['owner_guid'] . "|" . $user->name . "|" . stripslashes($msg['value']);
	        $msg->delete();
	      }
	    }

	    //$c->delete();
	  }
        } else {
	  echo "No object";
  	  $test = new ElggObject();
//	  $test->owner_guid = $_REQUEST['to'];
//	  $test->container_guid = $_REQUEST['to'];
  	  $test->subtype = "bb_chat";
	  $test->access_id = 2;
  	  $test->save();
	}
      } else if ($_REQUEST['action']=="tx") {
        $message = addslashes(html_entity_decode($_REQUEST['message']));
	$target = get_entity($_REQUEST['to']);
	$test = $target->getObjects("bb_chat");
	if ($test) {
	  $count = 0;
	  foreach ($test as $t) {
	    if ($count++ == 0) {
	      $t->annotate('messages', $message, 2);
	    } else {
	      $t->delete();
	    }
	  }
	}
      }
    }
  } else {
    $bbdbhost = get_plugin_setting("database_host", "bottom_bar");
    $bbdbuname = get_plugin_setting("database_username", "bottom_bar");
    $bbdbpword = get_plugin_setting("database_password", "bottom_bar");
    $bbdbdbase = get_plugin_setting("database_dbname", "bottom_bar");
    $bbdbtable = get_plugin_setting("database_prefix", "bottom_bar") . "bbchat";


    $bbdb = mysql_connect($bbdbhost,$bbdbuname,$bbdbpword);

    if ($bbdb) {
      //mysql_select_db($bbdbdbase, $bbdb) or die("Unable to select database");


      $query = "SELECT count(*) FROM information_schema.tables WHERE table_schema = '$bbdbdbase' AND table_name = '$bbdbtable';";
      $result = mysql_query($query);
      if ($result) {
	$check = mysql_fetch_row($result);
	if ($check[0]==0) {
	  // No table - create!
	  $query = "CREATE TABLE $bbdbdbase.$bbdbtable (
          `id` INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
          `from` VARCHAR(255) NOT NULL,
          `to` VARCHAR(255) NOT NULL,
          `message` TEXT NOT NULL,
          `sent` INTEGER NOT NULL,
          `recd` INTEGER NOT NULL DEFAULT 0
	  );";
	  mysql_query($query) or die (mysql_error());
	}
      }


      if (isloggedin() && !is_null($_REQUEST['action'])) {
        if ($_REQUEST['action']=="rx") {
	  $query = "SELECT * FROM `$bbdbdbase`.`$bbdbtable` WHERE `to` = '" . $SESSION['user']->guid . "' AND `recd` = 0 ORDER BY sent LIMIT 1";;
          $result = mysql_query($query) or die (mysql_error());
          if (mysql_numrows($result)) {
            $row = mysql_fetch_array($result, MYSQL_ASSOC);

//	    $q = "UPDATE `$bbdbdbase`.`$bbdbtable` SET `recd` = 1 WHERE id='" . $row['id'] . "'";
	    $q = "DELETE FROM `$bbdbdbase`.`$bbdbtable` WHERE id='" . $row['id'] . "'";
            if (mysql_query($q) or die (mysql_error())) {
	      $user = get_entity($row['from']);
              echo $row['from'] . "|" . $user->name . "|" . stripslashes($row['message']);
            } else {
              echo $error;
            }
//          } else {
//          echo "no messages!";
          }
        } else if ($_REQUEST['action']=="tx") {
          $message = addslashes(html_entity_decode($_REQUEST['message']));
          mysql_query("INSERT INTO `$bbdbdbase`.`$bbdbtable` VALUES ('" . md5(time().$message) . "','" . $_REQUEST['from'] . "', '" . $_REQUEST['to'] . "','" . $message . "'," . time() . ", 0)") or die (mysql_error());
        }
      }      

      mysql_close($bbdb);
    }
  }

?>
