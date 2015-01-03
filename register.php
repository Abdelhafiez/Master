<?php

include('connection.php');

$connection = connectToDatabase();
$_POST['Password'] = md5($_POST['Password']);
$query = buildInsertQuery(DB_USER_TABLE, $_POST);
mysqli_query($connection, $query);


?>