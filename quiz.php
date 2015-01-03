<?php

include('connection.php');

class Quiz {
	public $QuizId, $QuizName, $EdUserName, $Points, $NumOfQuestions;
	
	// This function is called like that Quiz::getQuizByName('Math') and returns the whole Quiz
	public static function getQuizByName($quizName) {
		
	}
	
	// it returns the current number of versions this quiz contains
	public function getVersions() {
		
	}
}

?>