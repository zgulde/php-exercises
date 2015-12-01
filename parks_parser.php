<?php

/**
 * This is a work in progress!
 * 
 * go to http://wikitables.geeksta.net/url/?url=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FList_of_best-selling_albums
 * download the table you want to parse
 * from your shell run
 *     php album_parser.php "downloadedcsvfile"
 * this script will create a file named formatted_for_sql.txt
 *
 * you will still need to clean up the output a little, eg there is still a ', '
 * in the last entry for each row
 */

// nae, location, date estb., area

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
    unset($park[6]);
    $park[0] = substr($park[0], 1);
    $park[2] = substr($park[2], 0, strpos($park[2], ' '));
    $park[3] = formatDate($park[3]);
    $park[4] = substr($park[4], 0, strpos($park[4], ' '));
    $park[4] = str_replace(',', '', $park[4]);
    $nationalParks[] = $park;
}

unset($nationalParks[0]);

foreach ($nationalParks as $park) {
    echo '[' . PHP_EOL . "    'name' => '${park[0]}', 'location' => '${park[2]}',
    'date established' => '${park[3]}', 'area'  => '${park[4]}'" . PHP_EOL . '],' . PHP_EOL;
}
