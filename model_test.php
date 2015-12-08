<?php
require_once 'parks_dbc.php';
require_once 'model.php';

class ParksUser extends Model
{
    protected static $table = 'national_parks';
}

$user = 'ParksUser';

$park = new $user;


// $park = ParksUser::find(7);

// echo PHP_EOL;
// echo 'Name: ' . $park->name . PHP_EOL;
// echo 'Description: ' . $park->description . PHP_EOL;
// echo PHP_EOL;

// $test = new ParksUser();
// $test->someVar = 'something';

// echo $test->someVar . PHP_EOL;

// User::delete('); DROP TABLE parks;');
