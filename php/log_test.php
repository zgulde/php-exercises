<?php

require_once 'Log.php';

$log = new Log();

echo 'logging....' . PHP_EOL;

$log->error('This is an error message.');
$log->info('This is an info message.');

echo 'done!' . PHP_EOL;

?>

