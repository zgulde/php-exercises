<?php

require 'Log.php';
require 'Input.php';

class Auth
{
     public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

     /**
      * Takes a username and password, if the username is 'guest' and the
      * password matches the hashed password, sets the LOGGED_IN_USER session
      * variable and logs an info message that the user logged in 
      * if the username and password do not match, logs an error
      * 
      * @param  string $username username
      * @param  string $password password
      */
     public static function attempt($username, $password)
     {

     }

     /**
      * returns a boolean whether or not the user is logged in
      * @return bool true if logged in, false otherwise
      */    
     public static function check()
     {

     }

     /**
      * returns the username of the logged in user
      * @return string username
      */
     public static function user()
     {

     }

     /**
      * ends the current session
      * @return [type] [description]
      */
     public static function logout()
     {

     }
}
