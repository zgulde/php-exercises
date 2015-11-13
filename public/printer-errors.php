<?php
function pageController(){
    $nouns = [
        "paper",
        "tray",
        "user",
        "button",
        "ink",
        "toner",
        "rack",
        "spooler",
        "printer",
        "feeder"
    ];

    $errors = [
        "jam",
        "error",
        "fault",
        "overload",
        "spill",
        "failure",
        "spill",
        "low",
        "leak",
        "malfunction"
    ];

    $actions = [
        "remove",
        "reset",
        "recalibrate",
        "push",
        "adjust",
        "reload",
        "dislodge",
        "insert",
        "retrieve",
        "feed"
    ];


    $errorMessage = $nouns[array_rand($nouns)] .' '. $errors[array_rand($errors)] . '!';
    $errorMessage.= ' Please ' . $actions[array_rand($actions)] . ' ' . $nouns[array_rand($nouns)] . '.' . PHP_EOL;

    return [
        'errorMessage' => $errorMessage
    ];
}

extract(pageController());

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Printer Errors</title>
</head>
<body>
    <h1>Printing...</h1>
    <h2>Error Code <?= mt_rand(100,999) ?></h2>
    <h2><?= $errorMessage ?></h2>
</body>
</html>