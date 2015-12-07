<?php

class Log
{
    private $handle;
    private $filename;

    /**
     * sets the default timezone, creates a file with the given prefix and opens
     * the file for writing
     * @param string $prefix prefix for the log file
     */
    public function __construct($prefix = 'log')
    {
        date_default_timezone_set('America/Chicago');
        $this->setFilename('/vagrant/sites/php.dev/logs/' . $prefix . '-' . date('Y-m-d') . '.log');
        $this->handle   = fopen($this->filename, 'a');
    }

    /**
     * writes a message to the log file
     * @param  string $level   level or tag for the message
     * @param  string $message the message itself
     */
    private function logMessage($level, $message)
    {
        $log_entry = PHP_EOL . date('Y-m-d H:i:s') . ' [' . $level . '] ' . $message;
        fwrite($this->handle, $log_entry);
    }

    /**
     * logs an error message
     * 
     * @param  string $message the message to log
     */
    public function error($message)
    {
        $this->logMessage('ERROR', $message);
    }

    /**
     * logs and info message
     * 
     * @param  string $message the message to log
     */
    public function info($message)
    {
        $this->logMessage('INFO', $message);
    }

    /**
     * writes a new line and closes the log file
     */
    public function __destruct()
    {
        fwrite($this->handle, PHP_EOL);
        fclose($this->handle);
    }

    /**
     * checks that the filename is a string, creates the file and ensures it 
     * is writable
     * @param string $f the filename
     */
    private function setFilename($f)
    {
        if (is_string($f) && !empty($f)) {
            $this->filename = $f;
        } else {
            echo 'Error: expected a string for filename!' . PHP_EOL;
            die();
        }

        if (!touch($f)) {
            echo "Error accessing $f" . PHP_EOL;
            die();
        }

        if (!is_writable($f)){
            echo "Error: $f is not writable!" . PHP_EOL;
            die();
        }
    }
}

?>
