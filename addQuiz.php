<?php

include_once("connection.php");
include_once("validation.php");
session_start();
if (verifyUniqueName($_POST['QuizName'])) {
	$connection = connectToDatabase();
	$_POST['EdUserName'] = $_SESSION['UserName'];
	$query = buildInsertQuery(DB_QUIZ_TABLE, $_POST);
	mysqli_query($connection, $query);

	header('location: addQuizVersion.php?QuizName='.$_POST['QuizName']);
}

?>