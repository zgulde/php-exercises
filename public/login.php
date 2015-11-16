<?php 

function isAuthorized($usnm, $pwd)
{
    return ($usnm != '' && $pwd == 'password') ? true : false;
}

function redirect(){
    header('Location: authorized.php');
    die();
}

function pageController()
{
    $username = isset($_POST['username']) ? $_POST['username'] : '' ;
    $password = isset($_POST['password']) ? $_POST['password'] : '' ;

    $message = '';

    if (isAuthorized($username, $password)) {
        $_SESSION['logged_in_user'] = $username;
        $_SESSION['is_logged_in']   = true;
        redirect();

    } elseif ($username != '' && $password != '') {
        $message = 'You are not authorized!';
        $_SESSION['is_logged_in'] = false;
    } else {
        $message = 'Please Log In.';
        $_SESSION['is_logged_in'] = false;
    }

    return [
        'message' => $message
    ];
}

session_start();

if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
    redirect();
}

$_SESSION['is_logged_in'] = false;

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