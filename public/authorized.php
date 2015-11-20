<?php 

require('../lib/Auth.php');
require '../lib/Input.php';

function pageController()
{
    if (!Auth::isLoggedIn() ) {
        Auth::redirect('login.php');
    }

    if (Input::has('reset')) {
        Auth::logout();
        Auth::redirect('login.php');
    }

    return [];
}

session_start();
extract(pageController());

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authorized Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'navbar.php'; ?>
    <h1>Authorized</h1>
    <h2>Hello, <?= Input::escape(Auth::getUsername()); ?></h2>
    <form method="POST">
        <input type="hidden" name="reset" value="reset">
        <input type="submit" value="Log Out">
    </form>
<?php include 'footer.php'; ?>
</body>
</html>
