<?php
require_once 'lib/User.php';

$u = new User();

echo User::getTableName() . PHP_EOL;
