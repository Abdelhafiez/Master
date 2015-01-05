<?php

include_once("connection.php");

function verifyUniqueUsername($Username) {
	if (isAvailableInTable(DB_USER_TABLE, 'Username', $Username)) {
		echo "<h4>Username $Username is not available</h4>";
		header("Refresh: 3 Location: index.php");
	}
}

function verifyUniqueEmail($Email) {
	if (isAvailableInTable(DB_USER_TABLE, 'Email', $Email)) {
		echo "<h4>$Email has been already entered before! </h4>";
		header("Refresh: 3 Location: index.php");
	}
}

?>