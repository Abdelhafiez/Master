<?php

include_once('validation.php');

session_start();

?>

<html>
	<head>
		<title>Math Test</title>
	</head>
	<body>
		<?php
			if(isset($_SESSION['Username'])){ 
				if ($_SESSION['Type'] == "Student"){ // student
					echo "&nbsp <a href = 'index.php'>Home</a><br/><br/>\n";
					echo "&nbsp <a href = 'viewprofile.php'>View Profile</a><br/><br/>\n";
					echo "&nbsp <a href = 'choosetest.php'>Choose Test</a><br/><br/>\n";
					echo "&nbsp <a href = 'logout.php'>LogOut</a><br/><br/>\n";
				}
				else { // Educator
					echo "&nbsp <a href = 'index.php'>Home</a><br/><br/>\n";
					echo "&nbsp <a href = 'viewprofile.php'>View Profile</a><br/><br/>\n";
					echo "&nbsp <a href = 'viewQuizzes.php'>My Quizzes</a>\n";
					echo "&nbsp <a href = 'logout.php'>LogOut</a><br/><br/>\n";
				}
			}else{ 
				header("location:loginForm.php");
			}
		?>
	</body>
</html>
