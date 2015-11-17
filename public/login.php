<?php 

require 'functions.php';

function isAuthorized($usnm, $pwd)
{
    return ($usnm != '' && $pwd == 'password') ? true : false;
}

//redirects if logged in, otherwise returns a message
function checkAuthorization()
{
    $username = inputGet('username');
    $password = inputGet('password');
    $message  = '';

    if (isset($_SESSION['IS_LOGGED_IN']) && $_SESSION['IS_LOGGED_IN']) {
        redirect('authorized.php');
    } else {
        $_SESSION['IS_LOGGED_IN'] = false;
    }

    if (isAuthorized($username, $password)) {
        $_SESSION['USERNAME']     = escape($username);
        $_SESSION['IS_LOGGED_IN'] = true;
        redirect('authorized.php');
    } elseif ($username != '' && $password != '') {
        $message = 'You are not authorized!';
    } else {
        $message = 'Please Log In.';
    }

    return $message;
}

function pageController()
{
    return [
        'message' => checkAuthorization()
    ];
}

session_start();
extract(pageController());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'navbar.php'; ?>
    <h1><?= $message; ?></h1>
    <form method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" autofocus>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <input type="submit">
    </form>
<?php include 'footer.php'; ?>
</body>
</html>
