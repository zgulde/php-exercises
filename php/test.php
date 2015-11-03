<?php

echo PHP_EOL;

$x = 0;
$y = 5;
$z = 10;

echo "2.\n";
var_dump( $x < $y && $y < $z );
echo "3.\n";
var_dump( $x > $y && $y < $z );
echo "4.\n";
var_dump( $x > $y || $y < $z );
echo "5.\n";
var_dump( $x > $y || !($y < $z) );

echo PHP_EOL;

?>