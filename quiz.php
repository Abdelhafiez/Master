<?php

include_once('connection.php');

class Quiz {
	public $QuizId, $QuizName, $EdUserName, $Points, $NumOfQuestions;
	
	public function __construct($QuizId, $QuizName, $EdUserName, $Points, $NumOfQuestions) {
		$this->QuizId = $QuizId;
		$this->QuizName = $QuizName;
		$this->EdUserName = $EdUserName;
		$this->Points = $Points;
		$this->NumOfQuestions = $NumOfQuestions;
	}
	
	public static function createQuizFromTuple($tuple) {
		return new Quiz($tuple['QuizId'], $tuple['QuizName'], $tuple['EdUserName'], $tuple['Points'], $tuple['NumOfQuestions']);
	}
	
	// This function is called like that Quiz::getQuizByName('Math') and returns the whole Quiz
	public static function getQuizByName($quizName) {
		$connection = connectToDatabase();
		$query = buildSelectQueryByKeyValue(DB_QUIZ_TABLE, 'QuizName', $quizName);
		return Quiz::createQuizFromTuple(executeSelectQuery($connection, $query)[0]);
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
	
	// returns the questions for the next attempt for this student
	public function getQuestionsByUsername($userName) {
		$query = buildSelectQueryByTwoKeysValues('attempt','StUserName',$userName,'QuizId',$this->QuizId);
		$arr = executeSelectQuery($connection, $query) ;
		return $this->getQuestionsByVersion(Count($arr)+1);
	}
	
	public function drawQuestionsAnswers($version) {
		if ($version != -1) {
			$questions = $this->getQuestionsByVersion($version);
		}
		for ($i=0; $i<$this->NumOfQuestions; $i++) {
			if ($version != -1) {
				$q = $questions[$i]['Question'];
				$a = $questions[$i]['Answer'];
			} else {
				$q = '';
				$a = '';
			}
			echo ($i + 1).")<p>";
			echo 
				"Question: <br/>
				<textarea name = 'Question[]' cols = '100' rows = '5'>".$q."</textarea> <p>
				Answer: <br/>
				<textarea name = 'Answer[]' cols = '100' rows = '5'>".$a."</textarea> <p>";
		}
	}
	
	public static function updateQuestion($questionId, $key, $value) {
		$connection = connectToDatabase();
		// echo buildUpdateQuery(DB_QUESTION_TABLE, 'QuestionId', $questionId, $key, $value)."<br>";
		mysqli_query($connection, buildUpdateQuery(DB_QUESTION_TABLE, 'QuestionId', $questionId, $key, $value));
	}
}

?>