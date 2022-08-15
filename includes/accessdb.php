<?php 

    include '../database/config2.php';
    global $Conf;
    $email = $_SESSION['email'];

    $sqlQue = "SELECT * FROM users WHERE email='$email'";
    $check = mysqli_query($Conf, $sqlQue);
    $getData = mysqli_fetch_array($check);

?>