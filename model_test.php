<?php
require_once 'parks_dbc.php';
require_once 'model.php';

class ParksUser extends Model
{
    protected static $table = 'national_parks';
}


$user = 'ParksUser';
$park = new $user;

$park->name = 'Atlantis12345';
$park->area_in_acres = '12345';
$park->date_established = '1970-01-01';
$park->location = 'Unknown';
$park->description = 'Underwater City';
$park->save();


// echo PHP_EOL;
// echo 'Name: ' . $park->name . PHP_EOL;
// echo 'Description: ' . $park->description . PHP_EOL;
// echo PHP_EOL;

// $test = new ParksUser();
// $test->someVar = 'something';

// echo $test->someVar . PHP_EOL;

// User::delete('); DROP TABLE parks;');
