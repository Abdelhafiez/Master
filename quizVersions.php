<?php

include_once('quiz.php');

$quiz = Quiz::getQuizByName($_GET['QuizName']);
$versions = $quiz->getVersions();

?>

<html>
	<head> <title> <?php echo $quiz->QuizName; ?> Quiz </title> </head>
	<body>
		<h2> <?php echo $quiz->QuizName; ?> Quiz </h2>
		<?php
			for ($i = 1; $i <= $versions; $i++)
				echo "<a href = 'editVersion.php?QuizName=".$quiz->QuizName."&version=".$i."'>Version ".$i."</a><p>";
		?>
		<form method = "post" action = "addQuizVersion.php?QuizName=<?php echo $quiz->QuizName; ?>">
			<input type="submit" value="Add Version">
		</form>
	</body>
</html>