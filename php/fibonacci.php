<?php
echo PHP_EOL;

function fib($n)
{
    if ($n === 1) {
        return 0;
    }
    if ($n === 2) {
        return 1;
    }
    return fib($n-1) + fib($n-2);
}

function get_postfix($x)
{
    switch($x % 10){
        case 1:
            return "{$x}st";
        case 2:
            return "{$x}nd";
        case 3:
            return "{$x}rd";
        default:
            return "{$x}th";
    }
}
$num = (int) $argv[1];
if ($num > 0) {
    echo '~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~' . PHP_EOL;
    echo '~ Working...' . PHP_EOL;
    echo '~ The ' . get_postfix($num) . ' fibonacci number is ' . fib($num) . PHP_EOL;
    echo '~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~' . PHP_EOL;
} else {
    echo 'Invalid input, expecting int > 0' . PHP_EOL;
}

echo PHP_EOL;