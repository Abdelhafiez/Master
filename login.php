<?php

include("connection.php") ; 
$connection = connectToDatabase() ; 


session_start();

if($_POST){

$_SESSION['UserName'] = $_POST['UserName'];
$_SESSION['Password'] = md5($_POST['Password']);


if($_SESSION['UserName'] && $_SESSION['Password']){

	//mysql_connect("localhost", "root", "") or die("problem with connection...");
	//mysql_select_db("mathtest");

	$query = mysqli_query( $connection  , "SELECT * FROM user WHERE UserName='".$_SESSION['UserName']."'" );
	$numrows = mysqli_num_rows($query);

	if($numrows != 0){
		
		while($row = mysqli_fetch_assoc($query)){
		
			$dbname = $row['UserName'];
			$dbpassword = $row['Password'];

		}
		if($_SESSION['UserName']==$dbname){
			if($_SESSION['Password']==$dbpassword){
			
				if(($_POST['remember']) == 'on'){
					$expire = time()+86400;
					setcookie('mathtest', $_POST['UserName'], $expire);
				}
				header("location:enter.php");
			
			}else{
				echo "Your password is incorrect!";
				//echo $_SESSION['Password']." ".$dbpassword ; 
			}
		
		}else{
			echo "Your UserName is incorrect!";
		}
	
	}else{
		echo "This Name is not registered!";	
	}
	
}else{
	echo "You have to type a name and password!";
}
}else{

echo "Access denied!";
exit;
}
?>