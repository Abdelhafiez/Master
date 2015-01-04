<?php
	include("connection.php");	
	session_start();
	if (!isset($_SESSION['Username'])) // for login
		header("Location: login.php");
	$connection = connectToDatabase();
	$username = $_SESSION['Username'];
	$result = array();
	$result = getuserdetails($connection,$username);
	foreach ($result as $key => $item){
		echo $key." : ".$item."<br/>";
	}
?>
<html>
	<head>
		<title>View Profile</title>
	</head>
	<body>
		<ul>
			<li><a href = "index.php">Home</a></li>
			<li><a href = "logout.php">Logout</li>
		</ul>
	</body>
</html>
