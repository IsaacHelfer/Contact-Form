<?php 
	$title = 'Contact Form Data'; 
	$style = 'styling/info-style.css' 
?>

<?php require 'partials/head.php'; ?>

<p>Data Given:</p>

<?php require '../controllers/info.php' ?>

<a href="/">&#8592 Form</a>
<a href="database-view.php">&#x2192 Database Table</a>

<?php require 'partials/footer.php'; ?>