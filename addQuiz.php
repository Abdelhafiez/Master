<?php

$_SESSION['UserName'] = 'mrtempo';	// remove this shit

include("connection.php");

$connection = connectToDatabase();
$_POST['EdUserName'] = $_SESSION['UserName'];
$query = buildInsertQuery(DB_QUIZ_TABLE, $_POST);
mysqli_query($connection, $query);

header('location: addQuizVersion.html?QuizName='.$_POST['QuizName']);

?>