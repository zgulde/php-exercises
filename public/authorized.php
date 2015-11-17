<?php 

require('functions.php');

//copypasta from php manual
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

function pageController(){
    return [
        'username' => $_SESSION['USERNAME']
    ];
}

session_start();

if ( !($_SESSION['IS_LOGGED_IN']) ) {
    redirect('login.php');
}

if (!empty($_POST['reset']) ) {
    endSession();
    redirect('login.php');
}

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
    <h2>Hello, <?= $username; ?></h2>
    <form method="POST">
        <input type="hidden" name="reset" value="reset">
        <input type="submit" value="Log Out">
    </form>
<?php include 'footer.php'; ?>
</body>
</html>
