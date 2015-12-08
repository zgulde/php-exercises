<?php
require_once 'parks_dbc.php';
require_once 'model.php';

class User extends Model
{
    protected static $table = 'national_parks';
}

$newPark = new User();

$newPark->name = 'another park!';
$newPark->location = 'atlantis';
$newPark->date_established = '1990-12-12';
$newPark->area_in_acres = '123.01';
$newPark->description = 'underwater';

$newPark->save();
