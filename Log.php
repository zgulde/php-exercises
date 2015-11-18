<?php

class Log
{
    public $handle;
    public $filename;

    /**
     * sets the default timezone, creates a file with the given prefix and opens
     * the file for writing
     * @param string $prefix prefix for the log file
     */
    public function __construct($prefix = 'log')
    {
        date_default_timezone_set('America/Chicago');
        $this->filename = 'logs/' . $prefix . '-' . date('Y-m-d') . '.log';
        $this->handle   = fopen($this->filename, 'a');
    }

    /**
     * writes a message to the log file
     * @param  string $level   level or tag for the message
     * @param  string $message the message itself
     */
    public function logMessage($level, $message)
    {
        $log_entry = PHP_EOL . date('Y-m-d H:i:s') . ' [' . $level . '] ' . $message;
        fwrite($this->handle, $log_entry);
    }

    /**
     * logs an error message
     * @param  string $message the message to log
     */
    public function error($message)
    {
        $this->logMessage('ERROR', $message);
    }

    /**
     * logs and info message
     * @param  string $message the message to log
     */
    public function info($message)
    {
        $this->logMessage('INFO', $message);
    }

    /**
     * closes the log file
     */
    public function __destruct()
    {
        fclose($this->handle);
    }
}

?>
