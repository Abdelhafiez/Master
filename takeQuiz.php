
<?php
	session_start();
	if(!isset($_SESSION['Username'])){
		echo "Access denied!";
	}else{
		include("session.php");
		include("quiz.php");
		include_once("connection.php");
		$connection = connectToDatabase();
		$quizname = $_GET['names'];
		$username = $_SESSION['Username'];
		$q = Quiz::getQuizByName($quizname);
		$questions = $q->getQuestionsByUserName($username);
		echo "<form action=\"handleQuiz.php?quizname = $quizname\" method = \"POST\">";	
			echo "<ul>";
				foreach($questions as $key => $item){
					echo "<li>";
					echo "Question".$key."<br/>".$item['Question']." : ";
					echo "<input type=\"text\" name=\"Answer[]\">" ;
					echo "</li>";
				}
			echo "</ul>";
			echo "<input type=\"submit\" value=\"Submit\" >";
		echo "</form>";
	}
?>