<?php

function verifyLogin() {
	if (!isset($_SESSION['Username']))
		header('Location: index.php');
}

function verifyEducator() {
	verifyLogin();
	if ($_SESSION['Type'] != 'Educator')
		header('Location: index.php');
}

?>