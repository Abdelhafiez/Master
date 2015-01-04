
<?php
	session_start();
	if(!isset($_SESSION['Username'])){
		echo "Access denied!";
	}else{
		include("session.php");
		include("quiz.php");
		include_once("connection.php");
		$connection = connectToDatabase();
		$quizName = $_GET['names'];
		$userName = $_SESSION['Username'];
		$q = Quiz::getQuizByName($quizName);
		$questions = $q->getQuestionsByUsername($userName);
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