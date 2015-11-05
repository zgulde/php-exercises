<?php

$a = 10;
$b = 5;

function add($a, $b)
{
    echo "$a plus $b equals " . ($a + $b) . PHP_EOL;
}

function subtract($a, $b)
{
    echo "$a minus $b equals " . ($a - $b) . PHP_EOL;
}

function multiply($a, $b)
{
    echo "$a times $b equals " . ($a * $b) . PHP_EOL;
}

function divide($a, $b)
{
    echo "$a divided by $b equals " . ($a / $b) . PHP_EOL;
}

add($a,$b);
subtract($a,$b);
multiply($a,$b);
divide($a,$b);