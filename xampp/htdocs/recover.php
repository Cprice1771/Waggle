<?php
	session_start();
	//Check if they filled in all the forms
	if($_GET["email"])
	{
		$servername="localhost";
		$username="login";
		$password = '1231'; 
		$conn=mysql_connect($servername,$username, $password)or die(mysql_error());
		mysql_select_db("waggle", $conn);
		$sql = "SELECT * FROM users WHERE email= '".$_GET["email"]."' LIMIT 1";
		$res = mysql_query($sql,$conn);
   
		if (mysql_num_rows($res) > 0) 
		{
			while($row = mysql_fetch_array($res))
			{	
				$userPassword = $row['Password'];
			}
			$to      = $_GET["email"];
			$subject = 'Waggle account recover password';
			$email = $_GET["email"];
			$message = 'Your password: '.$userPassword.'';

							
			if(mail($to, $subject, $message))
			{
				$_SESSION['SuccessMessage'] = "An email has been sent with your password!";
				header('Location:Success.php');
				exit();
			}
			else $_SESSION['recoverError'] = "Failed to send password recover email!";
						
		}
		else $_SESSION['recoverError'] = "That email is not registered!";
	}
	else $_SESSION['recoverError'] = "You didn't enter an email!";

	header('Location:RecoverForm.php');
?>
	
		