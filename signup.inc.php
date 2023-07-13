<?php

// Form submitted correctly pressing submit button 

if (isset($_POST['submit'])) {
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$passwordrepeat = $_POST['passwordrepeat'];

// Error handling in signup form

	require_once 'database.inc.php';
	require_once 'functions.inc.php';

	if (emptyInputSignup($name, $email, $username, $password, $passwordrepeat) !== false) {
		header("location: ../signup.php?error=emptyinput");
		exit();
	}
	if (invalidUsername($username) !== false) {
		header("location: ../signup.php?error=invalidusername");
		exit();
	}
	if (invalidEmail($email) !== false) {
		header("location: ../signup.php?error=invalidemail");
		exit();
	}
	if (passwordMatch($password, $passwordrepeat) !== false) {
		header("location: ../signup.php?error=passwordsdontmatch");
		exit();
	}
	if (usernameExists($conn, $username, $email) !== false) {
		header("location: ../signup.php?error=usernametaken");
		exit();
	}

createUser($conn, $name, $email, $username, $password);

}
else{
	header("location: ../signup.php");
}