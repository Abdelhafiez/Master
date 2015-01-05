<?php

include('template.php');
include_once('quiz.php');
include_once('authorization.php');


verifyEducator();

$quiz = Quiz::getQuizByName($_GET['QuizName']);
$version = $_GET['version'];

?>

<html>
	<head> 
		<title> Edit <?php echo $quiz->QuizName; ?> </title> 
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
		<h2> Edit Version <?php echo $version; ?> </h2>
		<form 	method = "post" action = "editQuestions.php?QuizName=<?php echo $quiz->QuizName; ?>&version=<?php echo $version; ?>" 
				onsubmit = "return validateNonEmptyFields()">
			<?php $quiz->drawQuestionsAnswers($version) ?>
			<input type = "submit" value = "Save">
		</form>
	</body>
</html>