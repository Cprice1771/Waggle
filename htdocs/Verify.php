

<html>
<head> 
<title>Verification page</title>
<link rel="stylesheet" href="stylesheet.css" 
      type="text/css"/> 	  
</head>
<body>
<img src="img/logo.jpg" name="logo" id="logo" >
<h3> 
<?php
	$servername="localhost";
	$username="login";
	$password = '1231'; 
	$conn=mysql_connect($servername,$username, $password)or die(mysql_error());
	mysql_select_db("waggle", $conn);
	mysql_query("UPDATE users SET Verified='1' WHERE Email='".$_GET["email"]."' AND Verified='0'") or die(mysql_error());
	echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
?>
</h1>
</body>
</html>