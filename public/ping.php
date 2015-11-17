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
     <title>Ping</title>
 </head>
 <body>
     <h1>Ping</h1>
     <h2><?= $action; ?></h2>
     <h2>Counter: <?= $counter;?></h2>
     <a href="pong.php?counter=<?= $counter+1; ?>&action=hit">HIT</a>
     <a href="pong.php?counter=0&action=miss">Miss</a>
 </body>
 </html>