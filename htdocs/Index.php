<?php
 

 session_start();
 

 if (isset($_SESSION['username'])) {
 header('Location:Scan.php');
 }
 
?>


<html>
<head> 
<title>Login page</title>	  
</head>
<body>
<h1> Test! </h1>
<form action="register.html">
    <input type="submit" value="Register">
</form>
</body>
</html>
