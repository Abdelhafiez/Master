<?php

include('template.php');
include_once("quiz.php");
include_once("connection.php");
include_once("authorization.php");

verifyEducator();

$connection = connectToDatabase();
$quizzes = executeSelectQuery($connection, buildSelectQueryByKeyValue(DB_QUIZ_TABLE, 'EdUserName', $_SESSION['Username']));

?>

<html>
	<head>
		<title> View Quizzes </title>
	</head>

	<body>

		
    		<div class="container">

    		<div class="page-header">
    			<div class="col-sm-offset-1 col-sm-10">
    				 <h3>  <font> My Quizzes </font> </h3>
           		 </div>
            </div>
            <div class="col-sm-offset-1 col-sm-6">
		<table  class="table table-bordered">
			
				<thead> 
					<center>
						<th align="center"> <center> Quiz </center> </th>
					</center>
				</thead>
				<tbody>
					<?php
						foreach($quizzes as $tuple) {
							echo "<tr> <td align = center >  <a href = 'quizVersions.php?QuizName=".$tuple['QuizName']."'>".$tuple['QuizName']."</a> </td> </tr>";
						}
					?>
				</tbody>
    				 
           	 
			
		</table>
		</div>
		<p>
		<form action = "addQuizForm.php" method = "post" class="form-horizontal" >
		<div class="form-group">
            <div class="col-sm-offset-1 col-sm-10">
            	<input type = "submit" value = "Add Quiz" class="btn btn-default">
            </div>
          </div> 
		</form>

		<footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2015</p>
                </div>
            </div>
        </footer>

    </div>

    
    

	</body>
</html>



