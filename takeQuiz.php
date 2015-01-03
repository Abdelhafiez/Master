<?php
	session_start();
	if(!isset($_SESSION['UserName'])){
		echo "Access denied!";
	}else{
		include("session.php");
		include("connection.php") ; 
		$connection = connectToDatabase() ; 
		$quizName = $_GET['names'];
		Quiz q =  Quiz::getQuizByName($quizName);
		$questions = q.getQuestions();
		echo "<form action=\"handleQuiz.php\" method = \"POST\">";	
			echo "<ul>";
				foreach($questions as $key => $item){
					echo "<li>";
					echo "Question".$key."<br/>".$item['Question']." : ";
					echo "<input type=\"text\" name=\"Answer\">" ;
					echo "</li>";
				}
			echo "</ul>";
			echo "<input type=\"submit\" value=\"Submit\">";
		echo "</form>";
	}
	
?>