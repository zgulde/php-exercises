<?php
echo PHP_EOL;
// A narcissistic number is a non-negative integer (n) with m digits where the sum of all the individual digits raised to the power m is equal to n.

// For example:

// If n is 153, then m (the number of digits) is 3 and:

// 1^3 + 5^3 + 3^3 = 1 + 125 + 27 = 153
// So, 153 is a narcissistic number.

// Objective: Write a script to generate and output the first 25 narcissistic integers.

function isNumberNarc($num){
    $sum = 0;
    $array  = array_map('intval', str_split($num));

    foreach($array as $digit){
        $sum += pow($digit, count($array));
    }
    return ($sum === $num);
}

$numbersFound = 0;
$i = 1;

while ($numbersFound < 25) {
    if (isNumberNarc($i)) {
        $numbersFound++;
        echo "---------------------------------------\n";
        echo "Found one! $i\n";
        echo "numberFound: $numbersFound\n";
    }
    $i++;
}

echo PHP_EOL;