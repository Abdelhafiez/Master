
<?php

session_start();
unset($_SESSION['Username']);
unset($_SESSION['Type']);
session_destroy();
if($_SESSION['Username'])
echo $_SESSION['Username'];
header("Location: index.php");
/*
session_start();
$expire = time()-86400;
setcookie('mathtest', $_SESSION['Username'], $expire);
session_destroy();
echo $_SESSION['Username'];
echo "Session destroyed!";
header("Refresh:3; url=index.php");
*/
?>