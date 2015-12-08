<?php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'contacts_db');
define('DB_USER', 'contacts_user');
define('DB_PASS', 'codeup');

$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
