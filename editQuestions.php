<?php

include_once('quiz.php');

$quiz = Quiz::getQuizByName($_GET['QuizName']);
$questions = $quiz->getQuestionsByVersion($_GET['version']);

for($i = 0; $i < $quiz->NumOfQuestions; $i++) {
	if ($_POST['Question'][$i] != $questions[$i]['Question']) {
		Quiz::updateQuestion($questions[$i]['QuestionId'], 'Question', $_POST['Question'][$i]);
	}
	if ($_POST['Answer'][$i] != $questions[$i]['Answer']) {
		Quiz::updateQuestion($questions[$i]['QuestionId'], 'Answer', $_POST['Answer'][$i]);
	}
}

header("Location: quizVersions.php?QuizName=".$quiz->QuizName);

?>