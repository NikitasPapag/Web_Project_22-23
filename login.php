<?php
	include_once 'header.php';
?>

	<section class="login-form">
		<h2>Είσοδος</h2>
		<div class="login-form-form">
			<form action="includes/login.inc.php" method="post">
				<input type="text" name="username" placeholder="Όνομα χρήστη ή Email...">
				<input type="password" name="password" placeholder="Κωδικός πρόσβασης...">
				<button type="submit" name="submit">Είσοδος</button>
			</form>
		</div>

<?php

// Error handling in login form

	if (isset($_GET["error"])) {
		if ($_GET["error"] == "emptyInput") {
			echo "<p>Συμπληρώστε όλα τα πεδία!</p>";
		}
		else if ($_GET["error"] == "wronglogin") {
			echo "<p>Λανθασμένα στοιχεία εισόδου!</p>";
		}
	}

?>

	</section>

<?php
	include_once 'footer.php';
?>