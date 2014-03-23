<?php
session_start();
$host = "localhost";
$user="login";
$pass = "1231"; 
$db = "waggle";

$conn=mysql_connect($host,$user, $pass)or die(mysql_error());
mysql_select_db($db, $conn); 

if (isset($_GET['email'], $_GET['password'])) {
   $email = $_GET['email'];
   $password = $_GET['password'];
   $sql = "SELECT * FROM users WHERE email= '".$email."' AND password='".$password."' LIMIT 1";
   $res = mysql_query($sql,$conn);
   
if (mysql_num_rows($res) > 0) {
while($row = mysql_fetch_array($res))
{	
	if($row['Verified'] == "0")
	{
		$_SESSION['loginError'] = "You must first verify your email address before logging in!";
		header('Location: Index.php');
		exit();
	}
	if($row['Banned'] == "1")
	{
		$_SESSION['loginError'] = "You have been banned, please contact an administrator to be unbanned";
		header('Location: Index.php');
		exit();
	}
}
    header('Location: home.html');

    //echo "Login successful " ;
	
	//exit();
	
}else{
    $_SESSION['loginError'] = "Incorrect user name or password" ;
	header('Location: Index.php');
}
}
else 
{
$_SESSION['loginError'] = "Login failed, email or password not entered";
header('Location: Index.php');
}
?>