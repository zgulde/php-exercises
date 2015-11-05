<?php
echo PHP_EOL;

$number = 0;
$guess = 0;
$guess_min = 1;
$guess_max = 100;

if ((int) $argv[1] > 0 && (int) $argv[1] <= 100) {
    $number = (int) $argv[1];
} else {
    while($number < 1 || $number > 100){
        echo "Enter a number between 1 and 100: ";
        $number = (int) trim(fgets(STDIN));
    }
}

echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
echo "~ Your number is $number\n";
echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n\n";

while($guess != $number){
    $guess = mt_rand($guess_min,$guess_max);

    echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
    echo "~ \$guess_min: $guess_min | \$guess_max: $guess_max\n";
    echo "~ I guess $guess\n";
    if ($guess < $number) {
        echo "~ That was too low!\n";
        $guess_min = $guess + 1;
    } elseif ($guess > $number){
        echo "~ That was too high!\n";
        $guess_max = $guess - 1;
    }
    echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n\n";
}

echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
echo "~ I win!\n";
echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
echo PHP_EOL;