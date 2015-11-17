<?php

require_once 'Log.php';

$log = new Log('cli');

$log->logError('This is an error message.');
$log->logInfo('This is an info message.');

?>
