<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        return isset($_REQUEST[$key]);
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        return self::has($key) ? trim($_REQUEST[$key]) : $default ;
    }

    /**
     * sanitizes a string
     * @param  string $string string to be escaped
     * @return string         sanitized string
     */
    public static function escape($string)
    {
        return htmlspecialchars(strip_tags($string));
    }

    /**
     * checks to see if the request has the $key and if the key contains at
     * least one character that is not whitespace
     * @param  [string] $key [the key we are looking for]
     * @return [string]      [the string in the $key]
     */
    public static function getString($key)
    {
        $string = self::get($key);
        if (preg_match('/[^\s]/', $string)) {
            return $string;
        } else {
            throw new Exception('There is not a string here.');
        }
    }

    /**
     * return the request key that is passed casted to an int or a float, respectively
     * if there is something that is not a digit in the input, throws an error
     * @param  string $key key to look for
     * @return int/float      
     */
    public static function getNumber($key)
    {
        $number = self::get($key);

        if (preg_match('/[^\d\.]/', $number)) {
            throw new Exception('Error: expecting a number but found something that isn\'t a number');
        }

        if (preg_match('/\./', $number)) {
            return (float) $number;
        }

        return (int) $number;
    }
    /**
     * returns a DateTime object created from the request key if the request key
     * can be converted to a valid date
     * @param  string $key request key
     * @return DateTime      a DateTime object
     */
    public static function getDate($key)
    {
        $date = self::get($key);
        if (strtotime($date)) {
            return new DateTime($date);
        }

        throw new Exception('Invalid Date Format!');
        
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
