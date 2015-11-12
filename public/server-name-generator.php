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
        'cranked-to-eleven'
    ];

    $serverName .= $adjectives[array_rand($adjectives)];
    $serverName .= '-';
    $serverName .= $nouns[array_rand($nouns)];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Server Name Generator</title>
    <style>
    button{
        padding: 5px 10px;
        border-radius: 3px;
        background: black;
        color: white;
    }
    </style>
</head>
<body>
    <h1>Server Name Generator</h1>
    <h2><?= echo $serverName?></h2>
    <button id="btn">Try Again!</button>

    <script>
        (function(){
            var btn=document.getElementById("btn");
            btn.addEventListener('click',function(){
                window.location.reload();
            });
        })();
    </script>
</body>
</html>