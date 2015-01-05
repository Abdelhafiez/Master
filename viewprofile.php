
<html>
	<head>
		<title>View Profile</title>
		
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>Modern Business - Start Bootstrap Template</title>

	    <!-- Bootstrap Core CSS -->
	    <link href="css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom CSS -->
	    <link href="css/modern-business.css" rel="stylesheet">

	    <!-- Custom Fonts -->
	    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	</head>
	<body>
		<ul>
			<li><a href = "index.php">Home</a></li>
			<li><a href = "logout.php">Logout</a></li>
		</ul>
	</body>
</html>

<?php
	include_once("connection.php");	
	include_once("user.php");
	session_start();
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

