<?php

include('connection.php');

class Quiz {
	public $QuizId, $QuizName, $EdUserName, $Points, $NumOfQuestions;
	
	public function __constructor($QuizId, $QuizName, $EdUserName, $Points, $NumOfQuestions) {
		$this->QuizId = $QuizId;
		$this->QuizName = $QuizName;
		$this->EdUserName = $EdUserName;
		$this->Points = $Points;
		$this->NumOfQuestions = $NumOfQuestions;
	}
	
	// This function is called like that Quiz::getQuizByName('Math') and returns the whole Quiz
	public static function getQuizByName($quizName) {
		$connection = connectToDatabase();
		$query = buildSelectQueryByKeyValue(DB_QUIZ_TABLE, 'QuizName', $quizName);
		$tuple = executeSelectQuery($connection, $query)[0];
		return new Quiz($tuple['QuizId'], $tuple['QuizName'], $tuple['EdUserName'], $tuple['Points'], $tuple['NumOfQuestions']);
	}
	
	// it returns the current number of versions this quiz contains
	public function getVersions() {
		return 0;
	}
}

?>