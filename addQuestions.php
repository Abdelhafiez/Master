<?php

	include_once('quiz.php');
	include_once('connection.php');
	session_start();
	if (!isset($_SESSION['Username'])) // for login
		header("Location: login.php");
	if($_SESSION['Type'] != "Educator") // for type
		header("Location: index.php");
$quiz = Quiz::getQuizByName($_GET['QuizName']);
$version = $quiz->getVersions() + 1;

$question = array();
$question['QuizID'] = $quiz->QuizId;
$question['QuizVersion'] = $version;

$connection = connectToDatabase();

for ($i=0; $i<$quiz->NumOfQuestions; $i++) {
	$question['Question'] = $_POST['Question'][$i];
	$question['Answer'] = $_POST['Answer'][$i];
	$query = buildInsertQuery(DB_QUESTION_TABLE, $question);
	mysqli_query($connection, buildInsertQuery(DB_QUESTION_TABLE, $question));
}
	
foreach($_POST['Question'] as $key => $value)
	echo $key."<br/>".$value."<p>";
	
foreach($_POST['Answer'] as $key => $value)
	echo $key."<br/>".$value."<p>";
	

?>