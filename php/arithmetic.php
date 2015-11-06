<?php

$a = 2;
$b = 8;

function add($a, $b)
{
    return $a + $b;
}

function subtract($a, $b)
{
    return add($a, -$b);
}

function multiply($a, $b)
{
    if ($b === 0) {
        return 0;
    }
    if ($b === 1) {
        return $a;
    }
    return $a + multiply($a, subtract($b, 1) );
}

function divide($a, $b)
{
    if ($b === 1) {
        return $a;
    }
    if ($a === $b) {
        return 1;
    }
    if ($a < $b) {
        return 0;
    }
    return 1 + divide(subtract($a, $b), $b);
    // 1 + divide($a - $b, $b)
}

function power($a, $b)
{
    if ($b === 0) {
        return 1;
    }
    return multiply($a, power($a, subtract($b, 1) ) );
    // $a * power($a, $b-1)
}

echo "$a plus $b equals " . add($a,$b) . PHP_EOL;
echo "$a minus $b equals " . subtract($a,$b) . PHP_EOL;
echo "$a times $b equals " . multiply($a,$b) . PHP_EOL;
echo "$a divided by $b equals " . divide($a,$b) . PHP_EOL;
echo "$a to the power of $b equals " . power($a,$b) . PHP_EOL;