<?php

$host = 'localhost';
$username = 'root';
$password = '';

$Conf = mysqli_connect("$host","$username","$password", "darimesh2");
mysqli_query($Conf, "set names utf8");

if(!$Conf){
    echo "Connection Lost : ". mysqli_connect_error();
}  

session_start();