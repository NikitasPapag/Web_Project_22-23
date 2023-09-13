<?php
	session_start();//Η συνάρτηση session_start() χρησιμοποιείται για την έναρξη μιας νέας συνεδρίας ή για τη συνέχιση μιας υπάρχουσας.
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

	<head>
		<meta charset="utf-8">
		<title>Web Project 22'-23'</title>
		<link rel="stylesheet" href="css/reset.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@450&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<nav>
			<div class="wrapper">
				<a href="index.php"><img class="logo-png" src="logo.png" alt="Project logo"></a>
					<ul>
						<li><a href="index.php">Αρχική</a></li>

						<?php
							if (isset($_SESSION ["userusername"])) {
								echo "<li><a href='profile.php'>Λογαριασμός χρήστη</a></li>";
								echo "<li><a href='includes/logout.inc.php'>Αποσύνδεση</a></li>";
							}

							else {
								echo "<li><a href='signup.php'>Δημιουργία λογαριασμού</a></li>";
								echo "<li><a href='login.php'>Είσοδος</a></li>";
							}
						?>

					</ul>
			</div>
		</nav>
<div class="wrapper">
