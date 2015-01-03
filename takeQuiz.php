
<?php
	session_start();
	if(!isset($_SESSION['UserName'])){
		echo "Access denied!";
	}else{
		include("session.php");
		include("quiz.php");
		$quizName = $_GET['names'];
		$q =  Quiz::getQuizByName($quizName);
		$questions = $q->getQuestions();
		echo "<form action=\"handleQuiz.php\" method = \"POST\">";	
			echo "<ul>";
				foreach($questions as $key => $item){
					echo "<li>";
					echo "Question".$key."<br/>".$item['Question']." : ";
					echo "<input type=\"text\" name=\"Answer[]\">" ;
					echo "</li>";
				}
			echo "</ul>";
			echo "<input type=\"submit\" value=\"Submit\" onsubmit=\"return validate();\">";
		echo "</form>";
	}
?>