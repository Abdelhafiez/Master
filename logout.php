
<?php
session_start();
$expire = time()-86400;
setcookie('mathtest', $_SESSION['UserName'], $expire);
session_destroy();
echo "Session destroyed!";
header("Refresh:3; url=home.php");
?>