<?php

class Log
{
    public $handle;
    public $filename;

    public function __construct($prefix = 'log')
    {
        echo 'new Log created' . PHP_EOL;
        $this->filename = 'logs/' . $prefix . '-' . date('Y-m-d') . '.log';
        $this->handle   = fopen($this->filename, 'a');
    }

    public function logMessage($level, $message)
    {
        $log_entry = PHP_EOL . date('Y-m-d H:i:s') . ' [' . $level . '] ' . $message;
        fwrite($this->handle, $log_entry);
    }

    public function logError($message)
    {
        $this->logMessage('ERROR', $message);
    }

    public function logInfo($message)
    {
        $this->logMessage('INFO', $message);
    }

    public function __destruct()
    {
        fclose($this->handle);
        echo 'Log destroyed' . PHP_EOL;
    }
}

?>
