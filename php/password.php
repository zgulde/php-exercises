<?php

$all_chars = [
    ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'],
    ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'],
    ['1','2','3','4','5','6','7','8','9','0'],
    ['!','#','$','%','&','‘','(',')','*','+',',','-','.','/',':',';','<','=','>','?','@','[',']','^','_','`','{','|','}','~']
];

$password = '';
$password_length = 0;

if ($argc === 2) {
    $password_length = (int) $argv[1];
}

if ($password_length < 5) {
    echo "Password must be at least 6 digits\n";
    echo "Defaulting to 10...\n";
    $password_length = 10;
}


for($i = 0; $i < $password_length; $i++){
    $index = mt_rand(0,3);
    $char = $all_chars[$index][mt_rand(0, count($all_chars[$index]) - 1) ];
    $password .= $char;
}

echo $password . PHP_EOL;