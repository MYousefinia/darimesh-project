<?php 

    include_once "../database/config2.php";
    if(isset($_SESSION['user-data'])){
        unset($_SESSION['user-data']);
        echo "<script>location.replace('http://localhost/darimesh2/page/login.php');</script>";
    }

?>