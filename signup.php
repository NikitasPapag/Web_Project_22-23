 <?php
	include_once 'header.php';
?>

	<section class="signup-form">
		<h2>Δημιουργία λογαριασμού</h2>
		<div class="signup-form-form">
			<form action="includes/signup.inc.php" method="post">
				<input type="text" name="name" placeholder="Ονοματεπώνυμο...">
				<input type="text" name="email" placeholder="Email...">
				<input type="text" name="username" placeholder="Όνομα χρήστη...">
				<input type="password" name="password" pattern="(?=.*\d)(?=.*[A-Z])(?=.*[#,$,*,&,@]).{8,}"
        title="Must contain at least one number,one uppercase letter,one symbol and at least 8 characters(summing)"placeholder="Κωδικός πρόσβασης...">
				<input type="password" name="passwordrepeat" placeholder="Επανάληψη κωδικού πρόσβασης...">
				<button type="submit" name="submit">Εγγραφή</button>
			</form>
		</div>

<?php

// Error handling in signup form
//Η PHP $_GET είναι μια υπερκαθολική μεταβλητή της PHP που χρησιμοποιείται για τη συλλογή δεδομένων φόρμας μετά την υποβολή μιας φόρμας HTML με τη μέθοδο "get"
	if (isset($_GET["error"])) {
		if ($_GET["error"] == "emptyInput") {
			echo "<p>Συμπληρώστε όλα τα πεδία!</p>";
		}
		else if ($_GET["error"] == "invalidusername") {
			echo "<p>Συμπληρώστε κατάλληλο όνομα χρήστη!</p>";
		}
		else if ($_GET["error"] == "invalidemail") {
			echo "<p>Συμπληρώστε κατάλληλο Email!</p>";
		}
		else if ($_GET["error"] == "passwordsdontmatch") {
			echo "<p>Οι κωδικοί πρόσβασης δεν είναι όμοιοι!</p>";
		}
		else if ($_GET["error"] == "stmtfailed") {
			echo "<p>Κάτι πήγε λάθος! Προσπαθήστε ξανά.</p>";
		}
		else if ($_GET["error"] == "usernametaken") {
			echo "<p>Το όνομα χρήστη που επιλέξατε υπάρχει ήδη!</p>";
		}
		else if ($_GET["error"] == "none") {
			echo "<p>Ο λογαριασμός σας δημιουργήθηκε επιτυχώς!</p>";
		}
	}

?>

	</section>

<?php
	include_once 'footer.php';
?>
