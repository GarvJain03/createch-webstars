<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database_name = 'webstars';
$conn = new mysqli($server, $username, $password, $database_name);

if($conn->connect_errno) {
    echo 'Failed to connect to the database! '.$conn->connent_errno;
}
?>