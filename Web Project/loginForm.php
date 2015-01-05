<?php

include('template.php');
include_once('validation.php');



?>

<html>
<head>
	<title>
		<title> Login Form </title> 
	</title>
</head>
<body>
	<form method="post" action = "login.php">
		<table width = "30%">
		<tr> 
		<td> Name: </td> 
		<td> <input type = "text" name = "Username" > </td>
		</tr>
		<tr>
		<td> Password: </td>
		<td> <input type = "password" name = "Password"> </td>
		</tr>
		</table>
		<p>
		<input type = "submit" name = "submit" value = "Login">
	</form>

</body>
</html>