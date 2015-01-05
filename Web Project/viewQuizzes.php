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
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>Modern Business - Start Bootstrap Template</title>

	    <!-- Bootstrap Core CSS -->
	    <link href="css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom CSS -->
	    <link href="css/modern-business.css" rel="stylesheet">

	    <!-- Custom Fonts -->
	    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	</head>

	<body>

		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">MyMathTest</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                         <a href="contact.html">Contact</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Educator <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="addQuiz.php">Add Quiz</a>
                            </li>
                            <li>
                                <a href="viewprofile.php">View Profile</a>
                            </li>
                            <li>
                                <a href="viewQuizzes.php">My Quizzes</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Student <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="choosetest.php">Choose Test</a>
                            </li>
                            <li>
                                <a href="viewprofile.php">View Profile</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="registerForm.php">Register</a>
                    </li>
                    <li>
                        <a href="loginForm.php">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
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

    
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>





	</body>
</html>



