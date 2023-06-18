<?php
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
