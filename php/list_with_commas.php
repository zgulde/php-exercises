<?php

$physicistsString = 'Gordon Freeman, Samantha Carter, Sheldon Cooper, Quinn Mallory, Bruce Banner, Tony Stark';

function humanized_list($string, $sort = false)
{
    $names_array = explode(', ', $string);
    $last_name = '';

    if ($sort) {
        sort($names_array);
    }

    $last_name = ', and ' . array_pop($names_array);

    return implode(', ', $names_array) . $last_name;
}

echo PHP_EOL;
echo "==========================================================\n";
echo "initial string:\n";
echo "-----------------------------------\n";
echo "$physicistsString\n";
echo PHP_EOL;
echo "calling humanized_list on \$physicistsString without sorting...\n";
echo "-----------------------------------\n";
echo humanized_list($physicistsString) . PHP_EOL;
echo PHP_EOL;
echo "calling humanized_list on \$physicistsString with sorting...\n";
echo "-----------------------------------\n";
echo humanized_list($physicistsString, true) . PHP_EOL;
echo "==========================================================\n";
echo PHP_EOL;