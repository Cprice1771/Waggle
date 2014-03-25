<?php
session_start();
?>
<html>
<head>
	<title>Success!</title>
	<link rel="stylesheet" href="stylesheet.css" 
      type="text/css"/> 
<head>
<body>
<a href="Index.php"> <img src="img/logo.jpg" name="logo" id="logo" ></a>
<h3><?php 
	if(isset($_SESSION['SuccessMessage']))
	{
	echo $_SESSION['SuccessMessage'];
	$_SESSION['SuccessMessage'] = '';
	}
?></h3>
							
<a href='index.php'>login</a>
</body>
</html>