<?php

include('template.php');
include_once('authorization.php');
include_once("quiz.php");
include_once("connection.php");


verifyStudent();

$connection = connectToDatabase();
$quizname = $_GET['names'];
$username = $_SESSION['Username'];
$q = Quiz::getQuizByName($quizname);
$questions = $q->getQuestionsByUserName($username);

?>


<html>
	<head> <title> Quiz <?php echo $q->QuizName; ?> </title> </head>
	<body>
		<?php 
			if (count($questions)) {
		?>
				<h3> <?php echo $q->QuizName; ?> Quiz (<?php echo $q->getAttemptsByUsername($username); ?> attempt(s) remaining) </h3>
				<form action="handleQuiz.php?quizname=<?php echo $quizname; ?>" method = "POST">
					<?php $q->drawQuestions($username); ?>
					<input type="submit" value="Submit" >
				</form>
		<?php
					
			} else {
		?>
				<h1>There is No Attempts Available Now For You</h1> </br>
		<?php
			
			}
		?>
		
	</body>
</html>
