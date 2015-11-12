<?php
echo PHP_EOL;

define("TAB_WIDTH", 8);

//returns a trimmed string of the file contents
function getFileContents($filename)
{
    $handle = fopen($filename, 'r');
    if ($handle === false) {
        echo "Error: cant find $filename\n";
        die();
    }
    $contents = trim(fread($handle, filesize($filename) ) );
    fclose($handle);
    return $contents;
}

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

//given a string with the contents of a file, returns an array of lines that have
//comma separated values with at least one csv being a number
function getCSVLines($contents)
{
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
//string such that the string's length will equal the column width
function formatForTableColumn($string, $numTabs = 1)
{
    $tabsToInsert = ceil( ( ($numTabs * TAB_WIDTH) - strlen($string) ) / TAB_WIDTH);
    for ($i = 0; $i < $tabsToInsert; $i++){
        $string .= "\t";
    }
    return $string;
}

//given a two dimensional array where the elements are arrays with identical
//keys, returns an array with keys that are the same as the inner arrays keys of
//the proper tab size for displaying each key value as a table column
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

//takes a tabSizes array from getMaxTabSize and calculates the size of the line
//needed to separate the table head from the body and returns that line
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

//writes a 2d table with elements that are arrays with identical keys using
//the keys as the table head to  filename + ._astable.txt.
function writeAsTable($formatted2dArray, $filename)
{
    $filename .='_astable.txt';
    echo 'Writing to ' . $filename . '...' . PHP_EOL;
    $handle = fopen($filename, 'x');
    if ($handle === false) {
        echo 'Error: file already exists, cannot create ' . $filename . PHP_EOL;
        die();
    }
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
        fwrite($handle, formatForTableColumn('| ' . $key, $size));
    }
    fwrite($handle, PHP_EOL);

    fwrite($handle, getDashedLine($tabSizes) . PHP_EOL);

    foreach ($piped2dArray as $line) {
        foreach ($line as $key => $column) {
            fwrite($handle, formatForTableColumn($column, $tabSizes[$key]));
        }
        fwrite($handle, PHP_EOL);
    }

}

$fileContents = getFileContents($argv[1]);
$salesReport = getCSVLines($fileContents);

foreach ($salesReport as $dataEntry) {
    $eachCSV = explode(', ', $dataEntry);
    $formattedLine = [
        'Units' => $eachCSV[3],
        'Full Name' => $eachCSV[1] . ' ' . $eachCSV[2],
        'Employee Number' => $eachCSV[0]
    ];
    $formattedReport[] = $formattedLine;
}

//sort by the value of the first key in each inner array
arsort($formattedReport);

writeAsTable($formattedReport, $argv[1]);
echo 'Success!' . PHP_EOL;



echo PHP_EOL;