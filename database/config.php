<?php

$host = 'localhost';
$username = 'root';
$password = '';

$Conf = mysqli_connect("$host","$username","$password", "darimesh");

if(!$Conf){
    echo "Connection Lost : ". mysqli_connect_error();
} else{
    echo "Connected";
}