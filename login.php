<?php
	include ("connection.php");
	$connection = connectToDatabase();
	$_POST['Password'] = md5($_POST['Password']);
	$query = buildSelectQueryByTwoKeysValues(DB_USER_TABLE,'Username',$_POST['Username'],'Password',$_POST['Password']);
	$result = executeSelectQuery($connection,$query);
	if(Count($result)){
		session_start();
		$_SESSION['Username'] = $_POST['Username'];
		$_SESSION['Type'] = $result[0]['Type'];
		header("location:index.php");
	}else{
		header("location:register.html");
	}
?>