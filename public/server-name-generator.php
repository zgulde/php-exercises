<?php
    $serverName = '';
    $nouns = [
        'guitar',
        'keyboard',
        'bass',
        'keytar',
        'drums',
        'violin',
        'banjo',
        'harp',
        'flute',
        'bagpipes',
        'didgeridoo'
    ];
    $adjectives = [
        'electrical',
        'acoustical',
        'out-of-tune',
        'classical',
        'noisy',
        'quietly-played',
        'very-shiny',
        'obnoxiously-loud',
        'cranked-to-eleven',
    ];

    $serverName.= $adjectives[array_rand($adjectives)];
    $serverName.= '-';
    $serverName.= $nouns[array_rand($nouns)];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Server Name Generator</title>
</head>
<body>
    <h1>Your Server Name is: <?php echo $serverName?></h1>
</body>
</html>