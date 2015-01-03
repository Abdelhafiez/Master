
<?php

if(!isset($_SESSION['UserName'])&&isset($_COOKIE['mathtest'])){
	$_SESSION['UserName'] = $_COOKIE['mathtest'];
}


echo "<a href='logout.php'>Logout</a>";

//include('links.php');

?>