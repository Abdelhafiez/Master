<?php

include('connection.php');

class Quiz {
	public $QuizId, $QuizName, $EdUserName, $Points, $NumOfQuestions;
	
	public function __construct($QuizId, $QuizName, $EdUserName, $Points, $NumOfQuestions) {
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
		return count($this->getQuestions()) / $this->NumOfQuestions;	// take care of division .. round or cast
	}
	
	public function getQuestionsByVersion($version) {
		$connection = connectToDatabase();
		$query = buildSelectQueryByTwoKeysValues(DB_QUESTION_TABLE, 'QuizID', $this->QuizId, 'QuizVersion', $version);
		return executeSelectQuery($connection, $query);
	}
	
	public function getQuestions() {
		$connection = connectToDatabase();
		$query = buildSelectQueryByKeyValue(DB_QUESTION_TABLE, 'QuizID', $this->QuizId);
		return executeSelectQuery($connection, $query);
	}
}

?>