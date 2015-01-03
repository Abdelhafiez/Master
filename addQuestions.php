<?php

include('quiz.php');

$quiz = Quiz::getQuizByName($_GET['QuizName']);

foreach($_POST['Question'] as $key => $value)
	echo $key."<br/>".$value."<p>";
	
foreach($_POST['Answer'] as $key => $value)
	echo $key."<br/>".$value."<p>";
	


?>