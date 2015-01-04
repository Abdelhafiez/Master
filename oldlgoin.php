<?php

	include("connection.php") ; 
	$connection = connectToDatabase() ; 
	//session_start(); Already started in validation
	$_SESSION['login'] = '1';
	$_SESSION['user'] = $username;
	$_SESSION['user_id'] = get_id_from_username($username);
	$_SESSION['type'] = $type;
	session_start();
	$username = "";
	$password = "";
	if (isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$db_handle = mysql_connect("localhost","root","");
		if (mysql_select_db("mathtest",$db_handle)){
				$password = md5($password);
				$query = "select * from users where username = '".$username."' and password = '".$password."'";
				$result = mysql_query($query);
				if ($row = mysql_fetch_assoc($result)){
					if (in_request_queue($username))
						$in_queue = true;
					else {
						login($username,$row['AccountType']);
						header("Location: home.php");
					}
					/*foreach($_SESSION as $key => $value)
					echo $key . "=>" . $value . "<br/>";*/
				}
				else $invalid = true;
			}
			
		}
		
	}



?>