<?php
	include_once 'header.php';
?>

	<ul class="menu-member">
		<?php
			if(isset($_SESSION["userid"]))
			{
		
			<li><a href="profile.php"><?php echo $_SESSION["useruid"]; ?></a></li>
			<li><a href="includes/logout.inc.php" class="header-login-a">LOGOUT</a></li>
			}
		?>	
		
	<section class="map-page">
		<h1>Χάρτης Καταστημάτων</h1>
		<p>Επιλέξτε το κατάστημα που επιθυμείτε από τον χάρτη, για να ενημερωθείτε για νέες προσφορές.</p>
	</section>
<?php
  include_once 'map.php'; 
	include_once 'footer.php';
?>
