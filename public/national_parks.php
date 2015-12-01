<?php 
require_once '../parks_dbc.php';

function getQuery($dbc, $query)
{
    return $dbc->query($query)->fetchAll(PDO::FETCH_ASSOC);
}

$p = isset($_REQUEST['p']) ? $_REQUEST['p'] : 0 ;
$limit = 5;
$offset = $limit * $p;

$query = 
    "SELECT name as 'Name',
    location as 'Location',
    date_established as 'Date Established',
    area_in_acres as 'Area (in acres)',
    description as 'Description'
    FROM national_parks
    LIMIT $limit OFFSET $offset";

$parksResults = getQuery($dbc, $query);

// $maxNumPages = floor(count($parksResults) / $limit);
// 
// hard code for now
$maxNumPages = 11;

$prev = ($p == 0) ? 0: $p - 1;
$next = ($p == $maxNumPages) ? $maxNumPages: $p + 1;


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>National Parks</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h1>National Parks</h1>
    <a href="national_parks.php?p=<?= $prev; ?>">Prev</a>
    <a href="national_parks.php?p=<?= $next; ?>">Next</a>
    <table>
        <tr>
            <?php foreach ($parksResults[0] as $title => $notUsed): ?>
                <th><?= $title; ?></th>
            <?php endforeach; ?>
        </tr>
        <?php foreach ($parksResults as $park): ?>
            <tr>
                <?php foreach ($park as $item): ?>
                    <td><?= $item; ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php include 'footer.php'; ?>
</body>
</html>
