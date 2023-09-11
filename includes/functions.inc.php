<?php

// Error handling functions

function emptyInputSignup($name, $email, $username, $password, $passwordrepeat) {
	$result;
	if (empty($name) || empty($email) || empty($username) || empty($password) || empty($passwordrepeat)) {
		$result = true;
	}

	else {
		$result = false;
	}

	return $result;
}

function invalidUsername($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	}

	else { 
		$result = false;
	}
	
	return $result;
}

function invalidEmail($email) {
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}

	else {
		$result = false;
	}
	
	return $result;
}

function passwordMatch($password, $passwordrepeat) {
	$result;
	if ($password !== $passwordrepeat) {
		$result = true;
	}

	else {
		$result = false;
	}

	return $result;
}

function usernameExists($conn, $username, $email) {
	$sql = "SELECT * FROM users WHERE usersUsername = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}

	else{
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $password) {
	$sql = "INSERT INTO users (usersName, usersEmail, usersUsername, usersPassword) VALUES (?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPassword);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../signup.php?error=none");
	exit();
}

function emptyInputLogin($username, $password) {
	$result;
	if (empty($username) || empty($password)) {
		$result = true;
	}

	else {
		$result = false;
	}

	return $result;
}

function loginUser($conn, $username, $password) {
	$usernameExists = usernameExists($conn, $username, $username);

	if ($usernameExists === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}

	$passwordHashed = $usernameExists["usersPassword"];
	$checkPassword = password_verify($password, $passwordHashed);

	if ($checkPassword === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	else if ($checkPassword === true) {
		session_start();
		$_SESSION["userid"] = $usernameExists["usersId"];
		$_SESSION["userusername"] = $usernameExists["usersUsername"];
		header("location: ../index.php");
		exit();
	}
}
