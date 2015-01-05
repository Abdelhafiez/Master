<?php

include_once('validation.php');

session_start();

?>

<html>
<head>
	<title>
		<title> Login Form </title> 
	</title>
</head>
<body>
	<form method="post" action = "login.php">
		Name: <input type = "text" name = "Username" > <p>
		Password: <input type = "password" name = "Password"> <p>
		<input type = "submit" name = "submit" value = "Login">
	</form>
	<a href ="registerForm.php">Register</a>

</body>
</html>