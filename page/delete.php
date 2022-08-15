<?php

include '../database/connect.php';
global $connection;

$result = $connection->prepare("DELETE FROM cart WHERE id=?");
$result->bindValue(1, $_GET['id']);
$result->execute();

header("Location:http://localhost/darimesh2/page/cart.php");

?>