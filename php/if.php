<?php

echo PHP_EOL;

 $a = 5;
 $b = 10;
 $c = '10';
echo "\$a: \n";
var_dump($a);
echo "\$b: \n";
var_dump($b);
echo "\$c: \n";
var_dump($c);
echo PHP_EOL;

 if ($a < $b) {
     // output the appropriate result
     echo "$a is less than $b\n";
 }

 if ($b > $a) {
     // output the appropriate result
     echo "$b is greater than $a\n";
 }

 if ($b >= $c) {
     // output the appropriate result
     echo "$b is greater than or equal to $c\n";
 }

 if ($b <= $c) {
     // output the appropriate result
     echo "$b is less than or equal to $c\n";
 }

 if ($b == $c) {
     // output the appropriate result
     echo "$b is equal in type to $c\n";
 }

 if ($b === $c) {
     // output the appropriate result
     echo "$b is equal in type and value $c\n";
 }

 // output the appropriate result
 if ($b != $c) {
     echo "$b is not equal to $c\n";
 }

 // output the appropriate result
 if ($b !== $c) {
     echo "$b is not identical to $c\n";
 }

 echo PHP_EOL;

 ?>