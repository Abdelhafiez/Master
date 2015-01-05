<?php

include_once("connection.php");

function verifyUniqueUsername($Username) {
	if (isAvailableInTable(DB_USER_TABLE, 'UserName', $Username)) {
		$_SESSION['error'] = "Username $Username is not available";
		header("Location:registerForm.php");
		return false;
	}
	return true;
}

function verifyUniqueEmail($Email) {
	if (isAvailableInTable(DB_USER_TABLE, 'Email', $Email)) {
		$_SESSION['error'] = "$Email has been already entered before!";
		header("Location:registerForm.php");
		return false;
	}
	return true;
}

function verifyUniqueName($Name) {
	if (isAvailableInTable(DB_QUIZ_TABLE, 'QuizName', $Name)) {
		$_SESSION['error'] = "There already exists a quiz with name: $Name";
		header("Location:addQuizForm.php");
		return false;
	}
	return true;
}

function viewError() {
	if (isset($_SESSION['error'])) {
		echo "<script type='text/javascript'>alert('".$_SESSION['error']."');</script>";
		unset($_SESSION['error']);
	}
}


?>