<?php
	include("connection.php");	
	$connection = connectToDatabase();
	$username = $_SESSION['UserName'];
	$result = array();
	$result = getuserdetails($connection,$usrname);
	foreach ($array as $key => $item){
		echo $key." : ".$item."<br/>";
	}
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
