<?php

include('template.php');

?>


<html>
	<head>
		<title>View Profile</title>
	</head>
	
</html>

<?php
	include_once("connection.php");	
	include_once("user.php");
	
	if (!isset($_SESSION['Username'])) // for login
		header("Location: login.php");
	$connection = connectToDatabase();
	$username = $_SESSION['Username'];
	$result = array();
	$result = getuserdetails($connection,$username);
	if ($_SESSION['Type'] == 'Student') {
		$points = calculatePoints($_SESSION['Username']);
		$result['Points'] = $points;
	}
	echo "<table>";
	foreach ($result as $key => $item){
		if($key=="Password") continue;
		echo "<tr>";
			echo "<td>".$key."</td>"."<td>".$item."</td>";
		echo "</tr>";
	}
	echo "</table>";

?>

