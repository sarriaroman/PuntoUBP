<?php
	global $CONFIG;
?>

<html>
<head>

<script type="text/javascript" src="curvycorners.js"></script>
<style type="text/css">
body{
	/*background:#B1D0E0;*/
	color:#444;
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	font-size:11px;
}
label{display:block; margin-bottom:2px;}

.myBox {
    width: 300px;
    padding: 10px;
	left: 50%;
	top: 100px;
	margin-left: -150px;
    background-color: #CA464B;
    border: 1px solid #333;

    /* Do rounding (native in Firefox and Safari) */
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
}

.myInput {
    margin: 2px auto;
    color: #333;
    width: 280px;
    background-color: #FFF;
    border: 1px solid #AACCEE;
	padding:6px;
	margin-bottom:10px;
	
    /* Do rounding (native in Firefox and Safari) */
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
  
}
.button{
	border:0; margin:0; padding:0;
	background: #BF2834;
	border:solid 1px #333;
	color:#FFFFFF;
	font-weight:bold;
	padding:4px;
	
    /* Do rounding (native in Firefox and Safari) */
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;

}
</style>
<script type="text/JavaScript">

  addEvent(window, 'load', initCorners);

  function initCorners() {
    var setting = {
      tl: { radius: 6 },
      tr: { radius: 6 },
      bl: { radius: 6 },
      br: { radius: 6 },
      antiAlias: true
    }
    curvyCorners(setting, "#myBox");
	curvyCorners(setting, "myInput");
	curvyCorners(setting, "button");
  }
  
  
</script>

<style>

body {
	background-image:url(fnd.png);
	background-position: bottom;
	background-repeat: repeat-x;
}

#log_in {
	background-image:url(fnd_login.png);
	background-position:center;
	background-repeat:no-repeat;
	position: absolute;
	right: 10%;
	top: 0px;
	width: 486px;
	height: 48px;
}

#loguito {
	background: url(loguito.png);
	width: 32px;
	height: 41px;
	bottom: 2px;
	right: 10px;
	position:absolute;
}

</style>
</head>
<body>
<div id="loguito"></div>
<div class="myBox" id="myBox">
  <form id="form1" name="form1" method="post" action="http://ciadeit.changeip.net/puntoubp/actions/dologin.php">

	<label for="user">Nombre de usuario o e-mail</label>
	<input type="text" class="myInput" id="user" name="username"/>
	
	<label for="psw">Clave</label>
	<input type="password" class="myInput" id="psw" name="password"/>

	<br /><input type="button" value="Submit" class="button"/>
  </form>
</div>

</body>
</html>