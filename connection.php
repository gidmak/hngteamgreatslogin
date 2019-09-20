<?php
define('DB_SERVER', 'eu-cdbr-west-02.cleardb.net');
define('DB_USERNAME', 'b7fe411ce1a9c4');
define('DB_PASSWORD', '9402fae8');
define('DB_NAME', 'heroku_896b25a506e0a77');
define();
define();
define();
define();
define();

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>