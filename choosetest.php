<?php
session_start();
if(!isset($_SESSION['UserName'])){

echo "Access denied!";

}else{
include("session.php");
include("connection.php") ; 

echo "<h3>Choose Your Test</h3><p>";

$connection = connectToDatabase() ; 

echo "<table width=\"90%\" align=center border=2>";
echo "<tr>
<td width=\"40%\" align=center >Quiz Id</td>
<td width=\"40%\" align=center >Educator User Name</td>
<td width=\"40%\" align=center >Quiz Name</td> </tr>" ; 


$query = mysqli_query($connection , "SELECT * FROM quiz" );

while($row=mysqli_fetch_assoc($query)) {


	$id=$row['QuizId'];
	$name=$row['QuizName'];
	$edname=$row['EdUserName'];
	
echo "<tr><td align=center>
<a href=\"takequiz.php?names=$name\">$id</a></td>
<td>$edname</td><td>$name</td></tr>";	
	
} echo "</table>";


}
