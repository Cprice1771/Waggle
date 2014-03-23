<?php
	session_start();
	//Check if they filled in all the forms
	if($_GET["firstName"] && $_GET["lastName"] && $_GET["email"] && $_GET["password"] && $_GET["password2"])
	{
		//Make sure its an spsu email
		if(strpos($_GET["email"], '@spsu.edu') !== FALSE)
		{
			//Make sure the passwords match
			if($_GET["password"] == $_GET["password2"])
			{
				if(validPass($_GET["password"]))
				{
					//Do database stuff
					
					$servername="localhost";
					$username="login";
					$password = '1231'; 
					$conn=mysql_connect($servername,$username, $password)or die(mysql_error());
					mysql_select_db("waggle", $conn);
					$sql="INSERT INTO users (FirstName, LastName, Email, Password, Verified, Banned) 
					VALUES
					('$_GET[firstName]' , '$_GET[lastName]' , '$_GET[email]' , '$_GET[password]', FALSE, FALSE)";
					$result=mysql_query($sql,$conn);
					
					if(mysql_errno() == 1062)
					{
						$_SESSION['error'] = "That email already exists!";
					}
					else
					{
						$to      = $_GET["email"];
						$subject = 'Waggle account creation confirmation';
						$email = $_GET["email"];
						$message = 'Activation link: localhost/Verify.php?email='.$email.'';

							
						if(mail($to, $subject, $message))
						{
							header('Location:Success.php');
						}
						else $_SESSION['error'] = "Failed to send email!";
						
					}
				}
				else $_SESSION['error'] = "Invalid password";
			}
			else $_SESSION['error'] = "The passwords don't match!";
		}
		else $_SESSION['error'] = "You must register with an spsu.edu email address!";
	}
	else $_SESSION['error'] = "You didn't enter all the fields!";
	
	function validPass($pass) {
		//If its at least 8 characters
		if(strlen($pass) < 8)
			return false;
		//If it contains a number
		if(strcspn($pass, '0123456789') == strlen($pass))
			return false;
		//If it contains a character
		if(strcspn($pass, '0123456789') == 0)
			return false;
		
		return true;
		
	}
	
	header('Location:Registration.php');
?>
	
		