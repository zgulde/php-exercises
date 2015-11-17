<?php 

require 'functions.php';

$msg = escape( inputGet('msg') );
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Exercises</title>
</head>
<body>
<?php include 'navbar.html'; ?>
<h2>Here is some content</h2>
<form>
    <input type="text" placeholder="display some stuff on the page" name="msg">
    <input type="submit">
</form>
<h3><?= $msg; ?></h3>
<?php include 'footer.html'; ?>
<script src="/arithmetic.js"></script>
</body>
</html>