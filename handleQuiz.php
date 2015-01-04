<?php
	include("session.php");
	include("quiz.php");
	include_once("connection.php");
	session_start();
	$connection = connectToDatabase();
	$quizname = $_GET['quizname'];
	$username = $_SESSION['Username'];
	$q = Quiz::getQuizByName($quizname);
	$questions = $q->getQuestionsByUserName($username);
	$marks = 0;
	$q = Quiz::getQuizByName($quizname);
	$questions = $q->getQuestionsByUserName($username);
	foreach($_POST['Answer'] as $key => $item){
		if($_POST['Answer'][$key]==$questions[$key]['Answer']){
			$marks = $marks + 1;
		}
	}
	$arr = array();
	$arr['QuizId'] = $q->QuizId;
	$arr['StUserName'] = $username;
	$arr['Passed'] = '1'; 
	$query = buildInsertQuery('Attempt', $arr);
	mysqli_query($connection, $query);
	if($marks==Count($questions)){
		echo "<h1>Passed</h1>";
	}else{
		echo "<h1>Failed</h1>";
	}
	
?>