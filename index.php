
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
				header("location:homeLogin.html");
			}
		?>
	</body>
</html>
