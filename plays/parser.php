<?php

function getFileContents($filename)
{
    if ($filename == '') {
        echo 'Error: no filename given!' . PHP_EOL;
        die();
    }
    $handle = fopen($filename, 'r');
    if ($handle === false) {
        echo "Error: cant find $filename\n";
        die();
    }
    $contents = trim(fread($handle, filesize($filename) ) );
    fclose($handle);
    return $contents;
}

$isCharSpeaking = false;
$play = explode("\n", getFileContents('muchado.txt'));
$lines = [];
$character = 'CLAUDIO';

foreach ($play as $i => $line) {
    if ($line == "$character.") {
        
        for ($j=$i-1; $j > 0; $j--) { 
            if (preg_match('/^[A-Z]+\.$/', $play[$j]) == 1) {
                $lines[] = $play[$j];
                break;
            }
        }

        $isCharSpeaking = true;
    }

    if ($line == '' && $isCharSpeaking) {
        

        if (end($lines) != '-------------------') {
            $lines[] = '-------------------';
        }
        $isCharSpeaking = false;
    }

    if ($isCharSpeaking) {
        $lines[] = $line;
    }
}

print_r($lines);
