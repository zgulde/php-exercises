<?php
echo PHP_EOL;

date_default_timezone_set('America/Chicago');

function log_message($level, $message)
{
    $log_entry = PHP_EOL . date('Y-m-d H:i:s') . ' [' . $level . '] ' . $message;

    $filename= 'logs/log-' . date('Y-m-d') . '.log';
    $handle  = fopen($filename, 'a');

    fwrite($handle, $log_entry);
    fclose($handle);
}

function log_error($message)
{
    log_message('ERROR', $message);
}

function log_info($message)
{
    log_message('INFO', $message);
}

echo 'logging...' . PHP_EOL;

log_info('This is an info message');
log_error('This is an error message');

echo 'done!' . PHP_EOL;

echo PHP_EOL;