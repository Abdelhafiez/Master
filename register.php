<?php
	include_once('connection.php');
	include_once('validation.php');
	session_start();
	if (verifyUniqueUsername($_POST['Username']) && verifyUniqueEmail($_POST['Email'])) {
		$connection = connectToDatabase();
		$_POST['Password'] = md5($_POST['Password']);
		$query = buildInsertQuery(DB_USER_TABLE, $_POST);
		mysqli_query($connection, $query);
		header("Location: index.php");
	}

?>