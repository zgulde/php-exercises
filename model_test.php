<?php
require_once 'parks_dbc.php';
require_once 'model.php';

class User extends Model
{
    protected static $table = 'national_parks';
}


$park = User::find(50);

$park->name = $park->name . ' Park';

$park->save();



// $u::find(20);
