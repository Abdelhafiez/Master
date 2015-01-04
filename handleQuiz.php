<?php
	session_start();
	include("session.php");
	include("connection.php") ; 
	$connection = connectToDatabase() ; 
	$count = 0;
	foreach($_POST['Answer'] as $key => $item){
		echo $_POST['Answer'][$key];
	}
?>