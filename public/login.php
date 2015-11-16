<?php 

function isAuthorized($usnm, $pwd)
{
    return ($usnm != '' && $pwd == 'password') ? true : false;
}

function redirect(){
    header('Location: authorized.php');
    die();
}

//redirects if logged in, otherwise returns a message
function checkAuthorization()
{
    $username = isset($_POST['username']) ? $_POST['username'] : '' ;
    $password = isset($_POST['password']) ? $_POST['password'] : '' ;
    $message  = '';

    if (isset($_SESSION['IS_LOGGED_IN']) && $_SESSION['IS_LOGGED_IN']) {
        redirect();
    } else {
        $_SESSION['IS_LOGGED_IN'] = false;
    }

    if (isAuthorized($username, $password)) {
        $_SESSION['USERNAME']     = $username;
        $_SESSION['IS_LOGGED_IN'] = true;
        redirect();
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
</head>
<body>
    <h1><?= $message; ?></h1>
    <form method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" autofocus>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <input type="submit">
    </form>
</body>
</html>