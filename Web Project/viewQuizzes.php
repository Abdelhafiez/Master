<?php

include_once("quiz.php");
include_once("connection.php");
include_once("authorization.php");

session_start();
verifyEducator();

$connection = connectToDatabase();
$quizzes = executeSelectQuery($connection, buildSelectQueryByKeyValue(DB_QUIZ_TABLE, 'EdUserName', $_SESSION['Username']));

?>

<html>
	<head>
		<title> View Quizzes </title>
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
						echo "<tr> <td align = center > <a href = 'quizVersions.php?QuizName=".$tuple['QuizName']."'>".$tuple['QuizName']."</a> </td> </tr>";
					}
				?>
			</tbody>
		</table>
		<p>
		<form action = "addQuizForm.php" method = "post" > 
			<input type = "submit" value = "Add Quiz">
		</form>
	</body>
</html>