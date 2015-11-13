<?php 

function pageController(){

    $errors = [
        'unexpected',
        'missing',
        'expected',
        'error parsing'
    ];

    $tokens = [
        '[', ']', ';',
        '{', '}', '=',
        '(', ')', '"',
        '.'
    ];

    $message  = 'ERROR: syntax error, ' . $errors[array_rand($errors)] . ' \'' . $tokens[array_rand($tokens)] .
                '\' on line ' . mt_rand(10,80) . '.' . PHP_EOL; 

    $randomError = $errors[array_rand($errors)];
    $randomToken = $token[array_rand($token)];

    return [
        'message' => $message,
    ];
}

extract(pageController());


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Server Name Generator</title>
</head>
<body>
 <h1>Your server name is...</h1>
 <div style="font-family: monospace;font-size: 1.5em;"><?= $message ?></div>
    
</body>
</html>