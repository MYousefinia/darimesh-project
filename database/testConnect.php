<?php

$servername = "localhost";
$username = "root";
$password = " ";

try {
    $connection = new PDO("mysql:host=$servername;dbname=darimesh", "root", "");
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    //echo "Connected ";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


