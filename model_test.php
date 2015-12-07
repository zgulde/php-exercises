<?php
require_once 'parks_dbc.php';
require_once 'model.php';

class User extends Model
{
    protected static $table = 'national_parks';
}

$u = User::find('4');

$u->name = 'Not So Badlands';

$u->save();
