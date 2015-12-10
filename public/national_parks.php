<?php 
require_once '../parks_dbc.php';
require_once '../lib/Input.php';

function getQueryResults($dbc, $query)
{
    return $dbc->query($query)->fetchAll(PDO::FETCH_ASSOC);
}

function escape($string)
{
    return htmlspecialchars(strip_tags($string));
}

function postHandler($dbc)
{

    try {

        $name = Input::getString('name');
        $location = Input::getString('location');
        $area = Input::getNumber('area');
        $description = Input::getString('description');
        $date = Input::getDate('date-estb');

        $date = $date->format('Y-m-d');

    } catch (Exception $e) {
        echo $e->getMessage();
        // header("Refresh:0");
        exit();
    }

    $query  = 'INSERT INTO national_parks (name, location, date_established, area_in_acres, description) ';
    $query .= 'VALUES (:name, :location, :date, :area, :description)';

    $stmt = $dbc->prepare($query);

    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':location', $location, PDO::PARAM_STR);
    $stmt->bindValue(':date', $date, PDO::PARAM_STR);
    $stmt->bindValue(':area', $area, PDO::PARAM_STR);
    $stmt->bindValue(':description', $description, PDO::PARAM_STR);

    $stmt->execute();

    header("Refresh:0");
    exit();
}

function pageController($dbc)
{
    $p     = (isset($_REQUEST['p']) && is_numeric($_GET['p'])) ? floor($_GET['p']) : 0;
    $limit = (isset($_GET['limit']) && is_numeric($_GET['limit'])) ? floor($_GET['limit']) : 5;

    if (3 > $limit || $limit > 8){
        $limit = 5;
    }

    $numRows = $dbc->query('SELECT count(id) FROM national_parks;')->fetch()[0] - 1;

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
        ORDER BY name
        LIMIT $limit OFFSET $offset";

    $parksResults = getQueryResults($dbc, $query);

    foreach ($parksResults as &$park) {
        $date = strtotime($park['Date Established']);
        $park['Date Established'] = date("F d, Y", $date);
    }

    // $parksResults = array_map(function($park){
    //     $park['Date Established'] = 
    // }, $parksResults);

    return [
        'parksResults' => $parksResults,
        'p' => $p,
        'limit' => $limit,
        'maxNumPages' => $maxNumPages
    ];
}

extract(pageController($dbc));

if(!empty($_POST)){
    postHandler($dbc);
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>National Parks</title>
    <link rel="icon" type="image/png" href="/img/favicon.ico">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="/js/moment.js"></script>
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
                        <td><?= escape($item); ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
    </table>

    <div class="delete">
        <h2>Delete a Park!</h2>
        <form method='post' action='delete_park.php'>
            <select name="park_to_delete">
                <option selected disabled>Park Name</option>
                <?php foreach ($parksResults as $park): ?>
                    <option value="<?= $park['Name']; ?>"><?= $park['Name']; ?></option>
                <?php endforeach; ?>
            </select>
            <input class='submit-btn' type="submit">
        </form>
    </div>

    <h2>Add A Park!</h2>
    <br>
    <button class="submit-btn" data-toggle="modal" data-target="#add-park-modal">Add A Park!</button>

<div class="modal fade" id="add-park-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action='national_parks.php' method="post" id='add-park-form' class="insert-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title" id="myModalLabel">Enter Park Information</h2>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name: </label>
                            <input id='name' type="text" name='name' class="form-control">
                            <p class="help-block">Name of the Park</p>
                        </div>
                        <div class="form-group">
                            <label for="location">Location: </label>
                            <input id='location' type="text" name='location' class="form-control">
                            <p class="help-block">Where the park is located</p>
                        </div>
                        <div class="form-group">
                            <label for="date-estb">Date Established: </label>
                            <input id='date-estb' type="text" name='date-estb' class="form-control">
                            <p class="help-block">&nbsp;</p>
                        </div>
                        <div class="form-group">
                            <label for="area">Area: </label>
                            <input id='area' type="text" name='area' class="form-control">
                            <p class="help-block">in acres</p>
                        </div>
                        <br>
                        <div class="form-group">
                        <label for="description">Description: </label>
                            <textarea id='description' type="text" name='description'></textarea>
                            <p class="help-block">park description</p>
                        </div>
                </div>
                <div class="modal-footer">
                    <input id="clear-form" type="reset" class="submit-btn pull-left" value="Clear">
                    <button type="button" class="submit-btn red" data-dismiss="modal">Close</button>
                    <input class='submit-btn' type="submit">
                </div>
            </form>
        </div>
    </div>
</div>

    <?php include 'footer.php'; ?>

    <script>
        var limit = <?= $limit;?>;
        var currentPage = <?= $p; ?>;
        var maxNumPages = <?= $maxNumPages;?>;
    </script>
    <script src=/js/parks.js></script>

</body>
</html>
