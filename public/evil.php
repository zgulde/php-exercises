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
    $randomToken = $tokens[array_rand($tokens)];

    return [
        'message' => $message,
        'randomToken' => $randomToken,
        'randomError' => $randomError
    ];
}

extract(pageController());


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Server Name Generator</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'navbar.php'; ?>
    <h1>Your server name is...</h1>
    <div style="font-family: monospace;font-size: 1.5em;"><?= $message ?></div>
<?php include 'footer.php'; ?>
</body>
</html>
