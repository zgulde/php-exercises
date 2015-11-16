<?php 

function endSession()
{
    // Unset all of the session variables.
    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finally, destroy the session.
    session_destroy();
}

function redirectToLogin(){
    header('Location: login.php');
    die();
}

session_start();

if ( !($_SESSION['is_logged_in']) ) {
    redirectToLogin();
}

if (!empty($_POST['reset']) ) {
    endSession();
    redirectToLogin();
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authorized Page</title>
</head>
<body>
    <h1>Authorized</h1>
    <h2>Hello, <?= $_SESSION['logged_in_user']; ?></h2>
    <form method="POST">
        <input type="hidden" name="reset" value="reset">
        <input type="submit" value="Log Out">
    </form>
</body>
</html>