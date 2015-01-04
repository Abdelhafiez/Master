<?php

include_once("quiz.php");
include_once("connection.php");

$_SESSION['Username'] = 'mrtempo';

$connection = connectToDatabase();
$quizzes = executeSelectQuery($connection, buildSelectQueryByKeyValue(DB_QUIZ_TABLE, 'EdUserName', $_SESSION['Username']));

?>

<html>
	<head>
		<title> View Quizzes </title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>
		<h2> My Quizzes </h2>
		<table border = 2 width = '30%'>
			<thead> 
				<th> Quiz </th>
			</thead>
			<tbody>
				<?php
					foreach($quizzes as $tuple) {
						echo "<tr> <td> <a href = 'quizVersions.php?QuizName=".$tuple['QuizName']."'>".$tuple['QuizName']."</a> </td> </tr>";
					}
				?>
			</tbody>
		</table>
	</body>
</html>