<?php

class Log
{
    public $handle;
    public $filename;

    public function __construct($prefix = 'log')
    {
        date_default_timezone_set('America/Chicago');
        $this->filename = 'logs/' . $prefix . '-' . date('Y-m-d') . '.log';
        $this->handle   = fopen($this->filename, 'a');
    }

    public function logMessage($level, $message)
    {
        $log_entry = PHP_EOL . date('Y-m-d H:i:s') . ' [' . $level . '] ' . $message;
        fwrite($this->handle, $log_entry);
    }

    public function error($message)
    {
        $this->logMessage('ERROR', $message);
    }

    public function info($message)
    {
        $this->logMessage('INFO', $message);
    }

    public function __destruct()
    {
        fclose($this->handle);
    }
}

?>
