<?php

include_once("connection.php");

$connection = connectToDatabase();
$_POST['EdUserName'] = $_SESSION['UserName'];
$query = buildInsertQuery(DB_QUIZ_TABLE, $_POST);
mysqli_query($connection, $query);

header('location: addQuizVersion.php?QuizName='.$_POST['QuizName']);

?>