<?php 

require 'functions.php';

$msg = escape( inputGet('msg') );

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Exercises</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'header.php'; ?>

<?php include 'navbar.php'; ?>

<main>

    <h2>Here is some content</h2>
    <form>

        <input type="text" placeholder="display some stuff on the page" name="msg">
        <input type="submit">
    </form>

    <h3>Your message: <span><?= $msg; ?></span></h3>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
