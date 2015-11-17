<?php 

require 'functions.php';

function pageController()
{
    $counter = inputGet('counter', 0);
    $action  = inputGet('action');

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
     <title>Pong</title>
 </head>
 <body>
     <h1>Pong</h1>
     <h2><?= $action; ?></h2>
     <h2>Counter: <?= $counter;?></h2>
     <a href="ping.php?counter=<?= $counter+1; ?>&action=hit">HIT</a>
     <a href="ping.php?counter=0&action=miss">Miss</a>
 </body>
 </html>