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

//given a file with newlines, returns an array of lines that have
//comma separated values with at least one csv being a number
function getCSVLines($filename)
{
    $handle = fopen($filename, 'r');
    $contents = trim(fread($handle, filesize($filename) ) );
    fclose($handle);

    $array = explode("\n", $contents);
    $parsedArray = [];

    foreach ($array as $line) {
        if (hasCSVs($line)){
            $parsedArray[] = $line;
        }
    }
    return $parsedArray;
}

function formatForTableColumn($string, $numTabs = 1)
{
    $tabWidth = 8;
    $tabsToInsert = ceil( ( ($numTabs * $tabWidth) - strlen($string) ) / $tabWidth);
    for ($i = 0; $i < $tabsToInsert; $i++){
        $string .= "\t";
    }
    return $string;
}

$filename = 'data/sales.txt';
$salesReport = getCSVLines($filename);
$formattedReport = [];

foreach ($salesReport as $dataEntry) {
    $eachCSV = explode(', ', $dataEntry);
    $formattedLine = [
        'employeeNumber' => $eachCSV[0],
        'fullName' => $eachCSV[1] . ' ' . $eachCSV[2],
        'salesUnits' => $eachCSV[3]
    ];
    $formattedReport[] = $formattedLine;
}

echo formatForTableColumn('| Units');
echo formatForTableColumn('| Full Name', 5);
echo formatForTableColumn('| Employee Number');
echo PHP_EOL;
echo '--------------------------------------------------------';
echo PHP_EOL;
foreach ($formattedReport as $line) {
    echo formatForTableColumn('| ' . $line['salesUnits']);
    echo formatForTableColumn('| ' . $line['fullName'], 5);
    echo formatForTableColumn('| ' . $line['employeeNumber']);
    echo PHP_EOL;
}





echo PHP_EOL;