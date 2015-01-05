<?php
 session_start(); 
if(!isset($_SESSION['UserName'])&&isset($_COOKIE['mathtest'])){
	$_SESSION['UserName'] = $_COOKIE['mathtest'];
}



?>

<html>
<head>
</head>

<body>
<center>
<form method="GET" action="search.php">

	<input type="text" name="search">
	<input type="submit" name="submit" value="search database">

</form>
</center>
<hr />
<u>Results:</u>&nbsp

<?php

if(!isset($_SESSION['UserName'])){

echo "Access denied!";

}else{
	if(isset($_REQUEST['submit'])) {



	$search = $_GET['search'];
	$terms = explode(" ", $search);
	$query = "SELECT * FROM user WHERE ";
	
	$i=0;
	foreach($terms as $each){		
		$i++;
		if($i==1){
			$query .= "UserName LIKE '%$each%' ";
		}else{
			$query .= "OR UserName LIKE '%$each%' ";
		}
	}

	include ("connection.php");
	$connection = connectToDatabase();

	$query = mysqli_query($connection , $query);
	$num = mysqli_num_rows($query);

	if($num > 0 && $search!=""){
	
		echo "$num result(s) found for <b>$search</b>!";
	
		while($row = mysqli_fetch_assoc($query)){
		
			$name = $row['UserName'];
			$email = $row['Email'];
			$institution = $row['Institution'];
			$type = $row['Type'];
		
			echo "<br /><h3>User Name: $name </h3>Email: $email<br />Institution: $institution<br />Type: $type<br /><br />";
		
		}
	
	} else {
	
		echo "No results found!";
	
	}

	mysqli_close($connection);
	}
	else {

	echo "Please type any word...";

	}





}

?>

</body>


</html>


























