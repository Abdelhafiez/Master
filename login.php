<?php
session_start();

if($_POST){

$_SESSION['UserName'] = $_POST['UserName'];
$_SESSION['Password'] = md5($_POST['Password']);


if($_SESSION['UserName'] && $_SESSION['Password']){

	mysql_connect("localhost", "root", "") or die("problem with connection...");
	mysql_select_db("mathtest");

	$query = mysql_query("SELECT * FROM user WHERE UserName='".$_SESSION['UserName']."'");
	$numrows = mysql_num_rows($query);

	if($numrows != 0){
	
		while($row = mysql_fetch_assoc($query)){
		
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
				echo "Your UserName is incorrect!";
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