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

	echo "<div class=\"container\">" ; 

	echo "<div class=\"page-header\">
    			<div class=\"col-sm-offset-1 col-sm-10\">
    				 <h3>  <font> My Profile </font> </h3>
           		 </div>
            </div>"  ; 

	 


	echo " <div class=\"col-sm-offset-1 col-sm-6\"> <table class=\"table table-bordered\" >";
	foreach ($result as $key => $item){
		if($key=="Password") continue;
		echo "<tr>";
			echo "<td>".$key."</td>"."<td>".$item."</td>";
		echo "</tr>";
	}
	echo "</table> </div>";


	echo "<footer>
            <div class=\"row\">
                <div class=\"col-lg-12\">
                    <p>Copyright &copy; Your Website 2015</p>
                </div>
            </div>
       </footer>" ; 


       echo"</div>" ; 

?>

