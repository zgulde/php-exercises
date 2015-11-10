<?php
echo PHP_EOL;

// Output should include:
// - total number of employees
// - total number of units sold
// - avg units sold per employee
// - Then output should share employee production, ordered from highest to lowest # of units
// * Units   |     Full Name       |   Employee Number
// * 5             Bob Boberson        2

// tab = 8 chars

//

//returns true is the line containes ', ' and at least one of the 
//csvs is numeric
function hasCSVs($string)
{
    if (strpos($string, ', ') === false) {
        return false;
    }
    $csvLine = explode(', ', $string);
    foreach ($csvLine as $csv) {
        if (is_numeric($csv)) {
            return true;
        }
    }
    return false;
}


$filename = 'data/sales.txt';
$handle = fopen($filename, 'r');
$contents = trim(fread($handle, filesize($filename) ) );
fclose($handle);

$contents = explode("\n", $contents);
$csvLines = [];

//get the lines that have comma separated values
foreach ($contents as $line) {
    if (strpos($line, ', ') !== false) {
        $csvLines[] = $line;
    }
}

foreach ($csvLines as $entry) {
    $tmp = explode(', ', $entry);
    $entry = [
        'employeeNumber' => $tmp[0],
        'fullName' => $tmp[1] . $tmp[2],
        'salesUnits' => $tmp[3]
    ];

    echo "";
}

echo PHP_EOL;