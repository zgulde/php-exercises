<?php 

require '../lib/Auth.php';

session_start();

$password = Input::get('password', '');
$username = Input::get('username', '');

Auth::attempt($username, $password);

if (Auth::isLoggedIn() ) {
    Auth::redirect('authorized.php');
}

$message = ($username != '' || $password != '') ? 'Invalid Login': 'Please Log In';

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
