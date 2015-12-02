<?php 
require_once '../parks_dbc.php';

function getQueryResults($dbc, $query)
{
    return $dbc->query($query)->fetchAll(PDO::FETCH_ASSOC);
}

function pageController($dbc)
{
    $p = (isset($_REQUEST['p']) && is_numeric($_REQUEST['p'])) ? floor($_REQUEST['p']) : 0;
    $limit = (isset($_GET['limit']) && is_numeric($_GET['limit'])) ? floor($_GET['limit']) : 5;

    if (3 > $limit || $limit > 8){
        $limit = 5;
    }

    $numRows = $dbc->query('SELECT count(id) FROM national_parks;')->fetch()[0];

    $maxNumPages = floor($numRows / $limit);

    if ($p < 0) {
        $p = 0;
    } else if ($p > $maxNumPages){
        $p = $maxNumPages;
    }

    $offset = $limit * $p;

    $query = 
        "SELECT name as 'Name',
        location as 'Location',
        date_established as 'Date Established',
        area_in_acres as 'Area (in acres)',
        description as 'Description'
        FROM national_parks
        LIMIT $limit OFFSET $offset";

    $parksResults = getQueryResults($dbc, $query);

    foreach ($parksResults as &$park) {
        $date = strtotime($park['Date Established']);
        $park['Date Established'] = date("F d, Y", $date);
    }

    return [
        'parksResults' => $parksResults,
        'p' => $p,
        'limit' => $limit,
        'maxNumPages' => $maxNumPages
    ];
}

extract(pageController($dbc));


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>National Parks</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="css/parks.css">
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700|PT+Serif:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h1>National Parks</h1>
    <div class="parks-nav">
        <form id='form'>
            <input type="hidden" id='page' name='p' value=<?= $p; ?>>
            <input type="submit" id='prev' value='Prev'>
            <input type="submit" id='next' value='Next'>
            <label for="limit">results per page</label>
            <select id='limit' name="limit" id="">
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
        </form>
    </div>
    <table class='table table-hover table-bordered'>
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>

        var limit = <?= $limit;?>;
        var currentPage = <?= $p; ?>;
        var maxNumPages = <?= $maxNumPages;?>;

        if (currentPage >= maxNumPages) {
            $('#next').attr('disabled','disabled');
        } else if (currentPage <= 0){
            $('#prev').attr('disabled','disabled');
        }

        $('option').each(function(){
            if ($(this).val() == limit) {
                $(this).attr('selected','selected');
            }
        });

        $('#prev').click(function(){
            $('#page').attr('value', $('#page').attr('value') - 1);
        });

        $('#next').click(function(){
            $('#page').attr('value', parseInt($('#page').attr('value')) + 1);
        });

        $('#limit').change(function(){
            $('#form').submit();
        });

    </script>
</body>
</html>
