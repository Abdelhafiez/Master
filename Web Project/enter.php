<?php

session_start();

if(isset($_SESSION['UserName'])||isset($_COOKIE['mathtest'])){

	include('session.php');

}else{

	echo "Access denied!";

}


?>