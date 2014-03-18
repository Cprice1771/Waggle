<?php
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
					/*$servername="localhost";
					$username="root";
					$conn=mysql_connect($servername,$username)or die(mysql_error());
					mysql_select_db("my_db", $conn);
					$sql="insert into users (firstName, lastName, email, password, verified)values('$_GET["firstName"]' , '$_GET["lastName"]' , '$_GET["email"]' , '$_GET["password"]', FALSE)";
					$result=mysql_query($sql,$conn) or die(mysql_error());*/
					
					$to      = $_GET["email"];
					$subject = 'Waggle account creation confirmation';
					$message = 'Click this link! spsu.edu \n New line';
					$headers = 'From: webmaster@example.com' . "\r\n" .
						'Reply-To: webmaster@example.com' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();
						
					if(mail($to, $subject, $message, $headers))
					{
						print "<h1>You have registered successfully, please check your email to verify your account</h1>";
						
						print "<a href='index.php'>go to login page</a>";
					}
					else print "Failed to send email!";
				}
				else print "Your password must be at least 8 characters and have at least 1 number and character";
			}
			else print "The passwords don't match!";
		}
		else print "You must register with an spsu.edu email address!";
	}
	else print "You didn't enter all the fields!";
	
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
?>
			