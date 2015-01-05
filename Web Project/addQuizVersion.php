<?php

include('template.php');
include_once("authorization.php");


verifyEducator();

if($_SESSION['Type'] != "Educator") // for type
	header("Location: index.php");
include_once('quiz.php');
$quiz = Quiz::getQuizByName($_GET['QuizName']);
$version = $quiz->getVersions() + 1;

?>

<html>
	<head> 
		<title> Add <?php echo $quiz->QuizName; ?> Quiz Version </title> 
		<script type = "text/javascript">
			function validateNonEmptyFields() {
				var fields = document.getElementsByTagName('textarea');
				for (var i in fields)
					if (fields[i].value == '') {
						alert('Please fill the empty fields');
						return false;
					}
				return true;
			}
		</script>
	</head>
	<body>
		<h2> Add Version <?php echo $version; ?> of <?php echo $quiz->QuizName; ?> Quiz</h2>
		<form method = "post" action = "addQuestions.php?QuizName=<?php echo $quiz->QuizName; ?>" onsubmit = "return validateNonEmptyFields()">
			<?php $quiz->drawQuestionsAnswers(-1); ?>
			<input type = "submit" value = "Submit">
		</form>
	</body>
</html>