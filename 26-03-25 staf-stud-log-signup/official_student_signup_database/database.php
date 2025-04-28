<?php

//This code is to connect to Josh's database

$host = "localhost";
$dbname = "db2332364";
$username = "2332364";
$password = "Millymay2005";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;