<?php 

require '../lib/Input.php';

function pageController()
{
    $counter = Input::get('counter', 0);
    $action  = Input::get('action');

    return [
        'counter' => $counter,
        'action'  => $action
    ];
}

extract(pageController());

?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Ping</title>
     <link rel="stylesheet" href="css/style.css">
 </head>
 <body>
<?php include 'navbar.php'; ?>
     <h1>Ping</h1>
     <h2><?= $action; ?></h2>
     <h2>Counter: <?= $counter;?></h2>
     <a href="pong.php?counter=<?= $counter+1; ?>&action=hit">HIT</a>
     <a href="pong.php?counter=0&action=miss">Miss</a>
<?php include 'footer.php'; ?>
 </body>
 </html>
