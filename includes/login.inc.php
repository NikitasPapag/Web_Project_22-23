<?php

// Form submitted correctly pressing login button 

if (isset($_POST["submit"])) {


	$username = $_POST["username"];
	$password = $_POST["password"];

	require_once 'database.inc.php';
	require_once 'functions.inc.php';

// Error handling in login form

	if (emptyInputLogin($username, $password) !== false) {
		header("location: ../login.php?error=emptyinput");
		exit();
	}

	loginUser($conn, $username, $password);
}

else {
	header('location: ../login.php');
	exit();
}
