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
	<a href ="registerForm.php">Register</a>
	<form method="post" action = "login.php">
		Name: <input type = "text" name = "Username" ><br / >
		Password: <input type = "password" name = "Password"> <br / >
		Remeber me ? :<input type = "checkbox" name = "remember"><br / >
		<input type = "submit" name = "submit" value = "Login">
	</form>

</body>
</html>
