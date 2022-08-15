<?php 

include "../database/connect.php";
global $connection;

$result = $connection->prepare("DELETE FROM menus WHERE id=?");
$result->bindValue(1, $_GET['id']);
$result->execute();
header("location:menu-tab.php");

?>