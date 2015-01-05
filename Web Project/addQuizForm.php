<?php

include('template.php');
include_once('authorization.php');
include_once('validation.php');



viewError();
verifyEducator();


	
?>

<html>
	<head> <title> Add Quiz </title> </head>
	<script type = "text/javascript"> 
		function validateNonEmptyFields() {
			var elements = document.getElementsByTagName('input');
			for (i in elements) {
				if (elements[i].value == '') {
					alert('Please fill all fields');
					return false;
				}
			}
			return true;
		}
		
		
		function isNumeric(n) { 
			return !isNaN(parseFloat(n)) && isFinite(n) && n > 0; 
		}
		
		function validateNumeric(fieldName) {
			var field = document.getElementsByName(fieldName)[0];
			if (!isNumeric(field.value)) {
				alert('Please enter a positive number in ' + fieldName);
				return false;
			}
			return true;
		}
		
		function validate() {
			return validateNonEmptyFields() && validateNumeric('Points') && validateNumeric('NumOfQuestions');
		}
	</script>
	<body>
		<h2>Add Quiz</h2>
		<form method = "post" action = "addQuiz.php" onsubmit = "return validate()">
			Name: <input type = "text" name = "QuizName"> <p>
			Points: <input type = "text" name = "Points"> <p>
			Number of Questions: <input type = "text" name = "NumOfQuestions"> <p>
			<input type = "submit" value = "Add Questions">
		</form>
	</body>
</html>