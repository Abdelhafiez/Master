<?php

include_once('connection.php');

function calculatePoints($Username) {
	$query = "select sum(q.points) as SumOfPoints from quiz q where q.quizid in ";
	$query = $query . "(select a.quizid from attempt a where a.verdict = 'Passed' and a.StUserName = '".$Username."')";
	return executeSelectQuery(connectToDatabase(), $query)[0]['SumOfPoints'];
}

?>