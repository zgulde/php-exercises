<?php

/**
 * Work in progress!!!
 *
 * go here:
 *     http://wikitables.geeksta.net/url/?url=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FList_of_national_parks_of_the_United_States
 *
 * save as 'xxx.csv'
 *
 * run this like so
 *     $ php parks_parser.php xxx.csv > xxx.txt
 *
 * xxx.txt will contain all the data foratted as a php associative array
 *
 * note you may have to clean up the output just a little bit
 */


function formatDate($string)
{
    $date = date_parse($string);
    if ($date['month'] / 10 < 1) {
        $date['month'] = "0${date['month']}";
    }
    if ($date['day'] / 10 < 1) {
        $date['day'] = "0${date['day']}";
    }
    return "${date['year']}-${date['month']}-${date['day']}";
}

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

$nationalParks = [];
$parks = explode("\n", getFileContents($argv[1]) );

foreach ($parks as $park) {
    $park = explode('","', $park);
    unset($park[1]);
    unset($park[5]);
    $park[0] = substr($park[0], 1);
    $park[2] = substr($park[2], 0, strpos($park[2], ' '));
    $park[3] = formatDate($park[3]);
    $park[4] = substr($park[4], 0, strpos($park[4], ' '));
    $park[4] = str_replace(',', '', $park[4]);
    $park[6] = str_replace('"', '', $park[6]);
    $park[6] = str_replace("'", '', $park[6]);
    $nationalParks[] = $park;
}

unset($nationalParks[0]);

foreach ($nationalParks as $park) {
    echo '[' . PHP_EOL . "    'name' => '${park[0]}', 'location' => '${park[2]}', 'date established' => '${park[3]}', 'area'  => '${park[4]}', 'description' => '${park[6]}'" . PHP_EOL . '],' . PHP_EOL;
}
