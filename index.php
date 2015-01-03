
<html>
	<head>
		<title>Math Test</title>
	</head>
	<body>
		<?php
			if(isset($_SESSION['login'])){ 
				if ($_SESSION['type'] == 'Student'){ // student
					echo "&nbsp <a href = 'index.php'>Home</a><br/><br/>\n";
					echo "&nbsp <a href = 'viewprofile.php'>View Profile</a><br/><br/>\n";
					echo "&nbsp <a href = 'takequiz.php'>Take Quiz</a><br/><br/>\n";
					echo "&nbsp <a href = 'logout.php'>LogOut</a><br/><br/>\n";
				}
				else { // Educator
					echo "&nbsp <a href = 'index.php'>Home</a><br/><br/>\n";
					echo "&nbsp <a href = 'viewprofile.php'>View Profile</a><br/><br/>\n";
					echo "&nbsp <a href = 'addQ.php'>Add Quiz</a>\n";
					echo "&nbsp <a href = 'logout.php'>LogOut</a><br/><br/>\n";
				}
			}else{ 
				header("location:login.php");
			}
		?>
	</body>
</html>
