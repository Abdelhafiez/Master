<?php

include('template.php');
include_once('authorization.php');


verifyLogin();

if(!isset($_SESSION['Username'])){

echo "Access denied!";

}else{
include("connection.php") ; 

echo "<h3>Choose Your Test</h3><p>";

$connection = connectToDatabase() ; 

echo "<table width=\"90%\" align=center border=2>";
echo "<tr>
<td width=\"40%\" align=center >Educator User Name</td>
<td width=\"40%\" align=center >Quiz Name</td> </tr>" ; 


$query = mysqli_query($connection , "SELECT * FROM quiz" );

while($row=mysqli_fetch_assoc($query)) {

	$id=$row['QuizId'];
	$name=$row['QuizName'];
	$edname=$row['EdUserName'];
	
echo "<tr>
<td align=center>$edname</td><td align=center><a href=\"takequiz.php?names=$name\">$name</a></td></tr>";	
	
} echo "</table>";


}

// INSERT INTO `quiz`( `EdUserName`, `Points`, `NumOfQuestions`, `QuizName`) VALUES ("Mostafa",25,5,"Math") ;
