
<?php
session_start();
$expire = time()-86400;
setcookie('mathtest', $_SESSION['Username'], $expire);
session_destroy();
header("Location: index.php");
?>