<?php 

include "../database/connect.php";
global $connection;

$result = $connection->prepare("DELETE FROM allProduct WHERE id=?");
$result->bindValue(1, $_GET['id']);
$result->execute();
header("location:post-tab.php");

?>