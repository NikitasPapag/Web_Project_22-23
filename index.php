<?php
	include_once 'header.php'; //Η λέξη-κλειδί include_once χρησιμοποιείται για την ενσωμάτωση κώδικα PHP από άλλο αρχείο. Εάν το αρχείο δεν βρεθεί, εμφανίζεται μια προειδοποίηση και το πρόγραμμα συνεχίζει να εκτελείται. Εάν το αρχείο είχε ήδη συμπεριληφθεί στο παρελθόν, αυτή η δήλωση δεν θα το συμπεριλάβει ξανά.
?>

	<section class="index-intro">

	<?php
		if (isset($_SESSION["userusername"])) //εαν δοθεί τιμή στο username,εκτελείται η συνθήκη.Το Session αποθηκεύει τα δεδομένα του χρήστη για να χρησιμοποιούνται σε όλες τις σελίδες
		{
			echo "<p>Καλώς ήρθες " . $_SESSION["userusername"] . " !</p>";
		}
	?>

	<div class="map-index">
		<a href="mappage.php"><img src="map-logo.png" alt="Map logo"></a>
		<h2>Πατήστε πάνω στον χάρτη για να περιηγηθείτε στα καταστήματα super-market που βρίσκονται κοντά σας.</h2>
	</div>

	</section>

<?php
	include_once 'footer.php';
?>
