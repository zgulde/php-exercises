<?php 
require_once '../parks_dbc.php';

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
    $park = $_POST;

    $query  = 'INSERT INTO national_parks (name, location, date_established, area_in_acres, description) ';
    $query .= 'VALUES (:name, :location, :date, :area, :description)';

    $stmt = $dbc->prepare($query);

    $stmt->bindValue(':name', $park['name'], PDO::PARAM_STR);
    $stmt->bindValue(':location', $park['location'], PDO::PARAM_STR);
    $stmt->bindValue(':date', $park['date-estb'], PDO::PARAM_STR);
    $stmt->bindValue(':area', $park['area'], PDO::PARAM_STR);
    $stmt->bindValue(':description', $park['description'], PDO::PARAM_STR);

    $stmt->execute();
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
    <div class="insert-form container">
        <h2>Add a Park!</h2>
        <form action='national_parks.php' method="post" id='add-park-form'>
            <label for="name">Name: 
                <input id='name' type="text" name='name'>
                <p>Name of the Park</p>
            </label>
            <label for="location">Location: 
                <input id='location' type="text" name='location'>
                <p>Where the park is located</p>
            </label>
            <label for="date-estb">Date Established: 
                <input id='date-estb' type="text" name='date-estb'>
                <p>YYYY-MM-DD</p>
            </label>
            <label for="area">Area: 
                <input id='area' type="text" name='area'>
                <p>in acres</p>
            </label>
            <br>
            <label for="description">Description: 
                <textarea id='description' type="text" name='description'></textarea>
                <p>park description</p>
            </label>
            <br>
            <input class='submit-btn' type="submit">
        </form>
    </div>
    <?php include 'footer.php'; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    
    <script>
        var limit = <?= $limit;?>;
        var currentPage = <?= $p; ?>;
        var maxNumPages = <?= $maxNumPages;?>;
    </script>
    <script src=/js/parks.js></script>
</body>
</html>
