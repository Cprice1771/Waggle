<head>
<title>Waggle Login Page</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen" />
</head>
<body>
<a href="Index.php"> <img src="img/logo.jpg" name="logo" id="logo" ></a>
<div id="container">
<div class="container1">
<form action="login.php" method=get id="my_form">

   <table>
        <tr>
          <td>Email:</td>
          <td><input type="text" name="email"></td>
        </tr>
        <tr>
          <td>password:</td>
          <td><input type="password" name="password"> </td>
        </tr>
        <tr>	
          <td></td>
          <td align="right"><input type="submit" value="Login"></td>
		</tr>
	    <tr align="right">
		   <td align="right">
		   <input type="button" onclick="window.location.href='recoverForm.php'" value="Forgot Password">
		   </td>
		   <td align="right">
		   <input type="button" onclick="window.location.href='registrationForm.php'" value="Register">
		   </td>
	    </tr>
   </table>
   <div id="error" align="center">
		<?php 
		session_start();
		if(isset($_SESSION['loginError']))
		{
			echo $_SESSION['loginError'];  
			$_SESSION['loginError'] = '';
		}

		?>
	</div>


</form>    

</div>
</div>
</body>
</html> 
