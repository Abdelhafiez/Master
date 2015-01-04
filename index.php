
<html>
	<head>
		<title>Math Test</title>
	</head>
	<body>
		<?php
			session_start();
			if(isset($_SESSION['Username'])){ 
				if ($_SESSION['Type'] == 'Student'){ // student
					echo "&nbsp <a href = 'index.php'>Home</a><br/><br/>\n";
					echo "&nbsp <a href = 'viewprofile.php'>View Profile</a><br/><br/>\n";
					echo "&nbsp <a href = 'choosetest.php'>Choose Test</a><br/><br/>\n";
					echo "&nbsp <a href = 'logout.php'>LogOut</a><br/><br/>\n";
				}
				else { // Educator
					echo "&nbsp <a href = 'index.php'>Home</a><br/><br/>\n";
					echo "&nbsp <a href = 'viewprofile.php'>View Profile</a><br/><br/>\n";
					echo "&nbsp <a href = 'addQuiz.html'>Add Quiz</a>\n";
					echo "&nbsp <a href = 'editQ..html'>EditQuiz</a>\n";	
					echo "&nbsp <a href = 'logout.php'>LogOut</a><br/><br/>\n";
				}
			}else{ 
				header("location:login.html");
			}
		?>
	</body>
</html>
