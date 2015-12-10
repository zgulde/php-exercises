<?php 
require_once '../lib/Input.php';

$errors = [];

try {
    $number = Input::getNumber('one');
} catch (Exception $e) {
    $errors[] = $e;
    $number = '';
}

try {
    $string = Input::getString('two');
} catch (Exception $e) {
    $errors[] = $e;
    $string = '';
}

try {
    $date = Input::getDate('three')->format('r');
} catch (Exception $e) {
    $errors[] = $e;
    $date = '';
}

try {
    $else = Input::getDate('four')->format('r');
} catch (Exception $e) {
    $errors[] = $e;
    $else = '';
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exceptions Exercise</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
    <br>
    <br>
    <div class="container">
        <form method="POST">
            <div class="form-group">
                <label for="one">Enter a number</label>
                <input id="one" type="text" class="form-control" name="one">
            </div>
            <div class="form-group">
                <label for="two">Enter a string</label>
                <input id="two" type="text" class="form-control" name="two">
            </div>
            <div class="form-group">
                <label for="three">Enter a date</label>
                <input id="three" type="text" class="form-control" name="three">
            </div>
            <div class="form-group">
                <label for="four">Another date</label>
                <input id="four" type="text" class="form-control" name="four">
            </div>
            <input class="btn btn-default" type="submit">
        </form>
        <h2>Errors</h2>
        <?php foreach($errors as $err): ?>
            <p>Error: <?= $err->getMessage(); ?></p>
        <?php endforeach; ?>
        <h2>You Entered</h2>
        <p>number: <?= $number; ?></p>
        <p>string: <?= $string; ?></p>
        <p>date: <?= $date; ?></p>
        <p>something else: <?= $else; ?></p>
        <h2>$_POST dump</h2>
        <?php var_dump($_POST); ?>
    </div>
</body>
</html>
