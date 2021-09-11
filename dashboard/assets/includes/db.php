<?php
$server = '127.0.0.1:3306';
$username = 'u711328531_webstars_admin';
$password = '*3rY&bRrK';
$database_name = 'u711328531_webstars';
$conn = new mysqli($server, $username, $password, $database_name);

if($conn->connect_errno) {
    echo 'Failed to connect to the database! '.$conn->connent_errno;
}
?>