<?php 

include "../database/connect.php";
global $connection;

$result = $connection->prepare("DELETE FROM users WHERE id=?");
$result->bindValue(1, $_GET['id']);
$result->execute();
header("location:users.php");

?>