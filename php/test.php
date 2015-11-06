<?php

echo PHP_EOL;

function add_five(&$number)
{
    $number += 5;
}

$my_number = 10;

add_five($my_number);

echo $my_number . PHP_EOL;


echo PHP_EOL;

?>