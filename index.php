<?php

include_once('validation.php');

session_start();

?>

<html>
	<head>
		<title>Math Test</title>
		<style>
			ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
			}
			li {
				display: inline;
			}
		</style>
	</head>
	<body>
		<?php
			if(isset($_SESSION['Username'])){ 
				if ($_SESSION['Type'] == "Student"){ // student
					echo "<ul>";
					echo "<li><a href = 'index.php'>Home</a></li>";
					echo "&nbsp&nbsp<li><a href = 'viewprofile.php'>View Profile</a></li>";
					echo "&nbsp&nbsp<li><a href = 'choosetest.php'>Choose Test</a></li>";
					echo "&nbsp&nbsp<li><a href = 'logout.php'>LogOut</a><br/><br/></li>";
					echo "</ul>";
				}
				else { // Educator
					echo "<ul>";
					echo "<li><a href = 'index.php'>Home</a></li>";
					echo "&nbsp&nbsp<li><a href = 'viewprofile.php'>View Profile</a></li>";
					echo "&nbsp&nbsp<li><a href = 'viewQuizzes.php'>My Quizzes</a></li>";
					echo "&nbsp&nbsp<li><a href = 'logout.php'>LogOut</a></li>";
					echo "</ul>";
				}
			}else{ 
				header("location:loginForm.php");
			}
		?>
	</body>
</html>
