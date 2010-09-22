<?php
include('config.php');
//include('start.php');
//require_once('http://ciadeit.changeip.net/puntoubp/engine/start.php');
//global $CONFIG;

//include('http://ciadeit.changeip.net/puntoubp/engine/lib/users.php');


if($_POST)
{

$q=$_POST['searchword'];

$sql_res=mysql_query("select * from elggusers_entity where name like '%$q%' order by name LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{

$name=$row['name'];
//$username=$row['username'];
//$guid=$row['guid'];
//$user = get_user_by_username($username);
//$user = get_user( $guid );

?>
<div class="display_box" align="left"><span style="font-size:15px" style="display:block"><a href="/puntoubp/pg/profile/<?php echo $username ?>"><?php echo $name ?></a></span><img src="<?php //$user->getIcon("tiny"); ?>" style="width:25px; float:left; margin-right:4px; " /><br/>
<span style="font-size:9px; color:#999999"><?php echo "tu carrera"; ?>

</span></div>
<?php
}

}
else
{

}


?>
