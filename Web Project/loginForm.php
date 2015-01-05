<?php

include('template.php');
include_once('validation.php');

?>

<html>
<head>
	<title>
		<title> Login Form </title> 
	</title>	
</head>
<body>

	<div class="container">
		<form class="form-horizontal" method="post" action = "login.php">
            <div class="page-header">
                 <h3>  <font>Login </font> </h3>
            </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-4">
                <input type = "text" name = "Username" id = "Username" class="form-control"> 
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-4">
                <input type = "password" name = "Password" id = "Password" class="form-control" /> 
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
             <input type = "submit" name = "submit" value = "Sign in" title="Login" id = "subBtn" class="btn btn-default" >
            </div>
          </div>
        
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