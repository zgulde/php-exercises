<?php 
require_once '../lib/Input.php';

    try {
        $first = Input::getDate('first');
    } catch (Exception $e) {
        echo "error with \$first " . $e->getMessage() . PHP_EOL;
        $first = '';
    }
    try {
        $second = Input::getDate('second');
    } catch (Exception $e) {
        echo "error with \$second " . $e->getMessage() . PHP_EOL;
        $second = '';
    }


    if ($first != '' && $second != '') {
        $diff = $first->diff($second);

        $dateDiff = "Difference:";
        $dateDiff.= " {$diff->y} years ";
        $dateDiff.= " {$diff->m} months ";
        $dateDiff.= " {$diff->d} days ";
    } else {
        $dateDiff = '';
    }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Date Difference</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Date Differences!</h1>
        <form method="POST">
            <div class="form-group">
                <label for="">Date1</label>
                <input type="text" class="form-control" name="first">
            </div>
            <div class="form-group">
                <label for="">Date2</label>
                <input type="text" class="form-control" name="second">
            </div>
            <input type="submit" class="btn btn-default">
        </form>
        <br>
        <h3>You Entered</h3>
        <p>Date1: <?= Input::get('first', 'nothing entered'); ?></p>
        <p>Date2: <?= Input::get('second', 'nothing entered'); ?></p>
        <h3>Difference</h3>
        <p><?= $dateDiff; ?></p>
    </div>
</body>
</html>
