<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $connection = new PDO("mysql:host=$servername;dbname=darimesh2", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    $connection->exec("set Names 'utf8'  " );

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
