<?php
echo PHP_EOL;

define("TAB_WIDTH", 8);

//returns true if the string containes ', ' and at least one of the 
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
    if ($handle === false) {
        echo "Error: cant find $filename\n";
        die();
    }
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

//given a string and the width of the column as $numTabs, appends tabs to the 
//string such that the
function formatForTableColumn($string, $numTabs = 1)
{
    $tabsToInsert = ceil( ( ($numTabs * TAB_WIDTH) - strlen($string) ) / TAB_WIDTH);
    for ($i = 0; $i < $tabsToInsert; $i++){
        $string .= "\t";
    }
    return $string;
}

//given a two dimensional array where the elements are arrays with identical
//keys, returns an array of the proper tab size for displaying each key value as
//a table column
function getMaxTabSize($twoDArray)
{
    $biggestString = [];
    $tabSizes = [];

    //find the longest string for each key in the inner arrays
    foreach ($twoDArray as $innerArray) {
        foreach ($innerArray as $key => $string) {
            if (strlen($string) > $biggestString[$key]) {
                $biggestString[$key] = strlen($string);
            }
        }    
    }
    //calculate tab size based on string length
    foreach ($biggestString as $key => $size) {
        $tabSizes[$key] = ceil($size / TAB_WIDTH);
    }
    return $tabSizes;
}

//takes a tabSizes array and calculates the size of the line needed to separate
//the table head from the body and returns that line
function getDashedLine($tabSizes)
{
    $numOfDashes = 0;
    $dashedLine = '';
    foreach ($tabSizes as $size) {
        $numOfDashes += $size * TAB_WIDTH;
    }
    for ($i=0; $i < $numOfDashes; $i++) { 
        $dashedLine .= '-';
    }
    return $dashedLine;
}

//displays a 2d table with elements that are arrays with identical keys using
//the keys as the table head
function displayAsTable($formatted2dArray)
{
    //append |s
    $piped2dArray = [];
    foreach ($formatted2dArray as $innerArray) {
        $pipedInnerArray = [];
        foreach ($innerArray as $key => $value) {
            $pipedInnerArray[$key] = '| ' . $value;
        }
        $piped2dArray[] = $pipedInnerArray;
    }

    $tabSizes = getMaxTabSize($piped2dArray);
    //the keys of tabSizes are also the keys for each table line
    foreach ($tabSizes as $key => $size) {
        echo formatForTableColumn('| ' . $key, $size);
    }
    echo PHP_EOL;

    echo getDashedLine($tabSizes) . PHP_EOL;

    foreach ($piped2dArray as $line) {
        foreach ($line as $key => $column) {
            echo formatForTableColumn($column, $tabSizes[$key]);
        }
        echo PHP_EOL;
    }
}

$filename = $argv[1];
$salesReport = getCSVLines($filename);

foreach ($salesReport as $dataEntry) {
    $eachCSV = explode(', ', $dataEntry);
    $formattedLine = [
        'Units' => $eachCSV[3],
        'Full Name' => $eachCSV[1] . ' ' . $eachCSV[2],
        'Employee Number' => $eachCSV[0]
    ];
    $formattedReport[] = $formattedLine;
}

displayAsTable($formattedReport);






echo PHP_EOL;