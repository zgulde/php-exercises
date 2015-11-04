<?php

echo PHP_EOL;

 $a = 5;
 $b = 10;
 $c = '10';

echo "\$a: ";
var_dump($a);
echo "\$b: ";
var_dump($b);
echo "\$c: ";
var_dump($c);
echo PHP_EOL;

 if ($a < $b) {
     echo "\$a is less than \$b\n";
 } elseif ($b > $a) {
     echo "\$b is greater than \$a\n";
 }

 if ($b >= $c) {
     echo "\$b is greater than or equal to \$c\n";
 } else {
     echo "\$b is less than \$c\n";
 }

 if ($b === $c) {
     echo "\$b is equal in type and value \$c\n";
 } elseif ($b == $c) {
     echo "\$b is equal in value to \$c\n";
 }

 if ($b !== $c) {
     echo "\$b is not identical to \$c\n";
 } elseif ($b != $c) {
     echo "\$b is not equal to \$c\n";
 }


 echo PHP_EOL;

 ?>