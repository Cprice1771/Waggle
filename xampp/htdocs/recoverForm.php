<?php
	session_start();
?>

<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" href="stylesheet.css" 
      type="text/css"/> 
	</head>
	<body>
	<a href="Index.php"> <img src="img/logo.jpg" name="logo" id="logo" ></a>
		<form action="recover.php" method=get>
		<h1>Recover Password</h1>
		<div align="center">
		  <table border="2">
		    <tr>
		      <td>Email:</td><td><input name="email" type="text" size"20"></input></td>
		    </tr>
	      </table>
		  <input type="submit" value="Register!">
		  </div>
		</input>
		</form>
		<div id="content">
		<div id="error">
		<?php 
		if(isset($_SESSION['recoverError']))
		{
			echo $_SESSION['recoverError'];  
			$_SESSION['recoverError'] = '';
		}
		?>
		</div>
		</div>
	</body>
</html>
