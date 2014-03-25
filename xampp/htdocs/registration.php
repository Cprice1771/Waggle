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
	<img src="img/logo.jpg" name="logo" id="logo" >
		<form action="register.php" method=get>
		<h1>Register</h1>
		<div align="center">
		  <table border="2">
		    <tr>
		      <td>First Name:</td><td><input name="firstName" type="text" size"20"></input></td>
		      </tr>
		    <tr>
		      <td>Last Name:</td><td><input name="lastName" type="text" size"20"></input></td>
		      </tr>
		    <tr>
		      <td>Email:</td><td><input name="email" type="text" size"20"></input></td>
		      </tr>
		    <tr>
		      <td>Password*:</td><td><input name="password" type="password" size"20"></input></td>
		      </tr>
		    <tr>
		      <td>Re-type Password:</td><td><input name="password2" type="password" size"20"></input></td>
		      </tr>
	      </table>
		  <input type="submit" value="Register!">
		  </div>
		</input>
		</form>
		<div id="content">
		*Your password must be at least 8 characters long and contain one number and letter.
		
		<div id="error">
		<?php 
		echo $_SESSION['error'];  
		$_SESSION['error'] = ''
		?>
		</div>
		</div>
	</body>
</html>
