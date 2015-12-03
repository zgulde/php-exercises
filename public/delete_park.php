<?php
require_once '../parks_dbc.php';

var_dump($_POST);

$query =
    'DELETE FROM national_parks
    WHERE name = :park_to_delete';

$stmt = $dbc->prepare($query);
$stmt->bindValue(':park_to_delete', $_POST['park_to_delete'], PDO::PARAM_STR);
$stmt->execute();

header("Location: national_parks.php");
die();
