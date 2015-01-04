<?php
	include("connection.php");	
	$connection = connectToDatabase();
	session_start();
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
