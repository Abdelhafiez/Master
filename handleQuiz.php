<?php
	session_start();
	if(!isset($_SESSION['UserName'])){
		echo "Access denied!";
	}else{
		include("session.php");
		include("connection.php") ; 
		$connection = connectToDatabase() ; 
		foreach($_POST['Answer'] as $key => $item){
			echo $key." ".$item;
		}
	}
?>