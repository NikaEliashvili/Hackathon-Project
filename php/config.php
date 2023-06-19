<?php
/*  

CONNECT TO MS SQL DATABASE

$serverName = "DESKTOP-U1UNFD7";
$database = "SocialServicesDB";
$uid = "";
$pass = "";

$connectionOptions = [
    "Database" => $database,
    "UID" => $uid,
    "PWD" => $pass,
    "CharacterSet" => "UTF-8",
];

$conn = sqlsrv_connect($serverName, $connectionOptions);
*/


// MySQL database configuration

$host = 'localhost';
$database = 'socialservicesdb';
$username = 'root';
$password = '';

// Establish a database connection
$conn = mysqli_connect($host, $username, $password, $database);


