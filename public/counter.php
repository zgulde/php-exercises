<?php 

function pageController()
{
    $number = (isset($_GET['number']) && is_numeric($_GET['number']) ) ? 
                $_GET['number'] : '0';

    return [
        'number' => $number
    ];
}

extract(pageController());

 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>counter</title>
 </head>
 <body>
     <h1>Counter: <?= $number; ?></h1>
     <a href="counter.php?number=<?= $number+1; ?>">Up</a>
     <a href="counter.php?number=<?= $number-1; ?>">Down</a>
 </body>
 </html>