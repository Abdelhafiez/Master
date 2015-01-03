<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'mathtest');

define('DB_USER_TABLE', 'user');
define('DB_QUIZ_TABLE', 'quiz');
define('DB_QUESTION_TABLE', 'question');

// lammo akhza memorization
function connectToDatabase() {
	if (isset($GLOBALS['connection'])) {
		return $GLOBALS['connection'];
	}
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die("Problem with connection...");
	mysqli_select_db($connection, DB_NAME) or die('Could not find database');
	return $GLOBALS['connection'] = $connection;
}

function buildInsertQuery($tableName, $arr) {
	$query = "INSERT INTO `".$tableName."`(";
	$first = true;
	foreach($arr as $key => $value) {
		if (!$first) $query = $query . ",";
		$first = false;
		$query = $query."`".$key."`";
	}
	$query = $query . ") VALUES (";
	$first = true;
	foreach($arr as $key => $value) {
		if (!$first) $query = $query . ",";
		$first = false;
		$query = $query."'".$value."'";
	}
	$query = $query . ")";
	return $query;
}

function getuserdetails($connection,$username)
{
	$query = "select * from user where UserName = '".$username."'";
	$result = mysqli_query($connection,$query);
	return mysqli_fetch_assoc($result);
}

function buildSelectQueryByKeyValue($tableName, $key, $value) {
	return "SELECT * FROM `".$tableName."` where `".$key."` = '".$value."'";
}

function buildSelectQueryByTwoKeysValues($tableName, $key1, $value1, $key2, $value2) {
	return buildSelectQueryByKeyValue($tableName, $key1, $value1) . " and `".$key2."` = '".$value2."'";
}

function executeSelectQuery($connection, $query) {
	$ret = array();
	if ($result = mysqli_query($connection, $query)) {
		while ($row = mysqli_fetch_assoc($result)) 
			array_push($ret,$row);
	} else {
		die ("Failed executing query");
	}
	return $ret;
}

?>