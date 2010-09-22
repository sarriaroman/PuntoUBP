<?php
/**
 * Start the Elgg engine
 */
//define('externalpage',true);
require_once("../../../engine/start.php");


//if (!trigger_plugin_hook('search','system',null,false)) {
include('config.php');

global $CONFIG;


if ($_POST) {
    $q = $_POST['searchword'];

    $sql_res = mysql_query("select guid from elggusers_entity where name like '%$q%' order by name LIMIT 5");

    while ($row = mysql_fetch_array($sql_res)) {
        //$name=$row['name'];
        //$username=$row['username'];
        $guid = $row['guid'];
        $user = get_user($guid);
        //$user = get_user( $guid );

        $profile = $user->getUrl();
        ///puntoubp/pg/profile/<?php echo $user->username
?> <div class="display_box" align="left" onclick="document.location.href='<? echo $profile ?>';">
            <span style="font-size:15px" ><?php echo $user->name ?></span><img src="<?php echo $user->getIcon('small'); ?>" style="width:35px; float:left; margin-right:4px; " /><br/>
            <span style="font-size:9px; color:#999999"><?php echo "Tu carrera"; ?>
            </span>
        </div>
<?php
    }
} else {

}

//	}
?>
