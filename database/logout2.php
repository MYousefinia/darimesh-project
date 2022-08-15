<?php 

include '../database/config2.php';
if(isset($_SESSION['isLog'])){
    unset($_SESSION['NewUser']);
    unset($_SESSION['isLog']);
    unset($_SESSION['user-data']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    header('Location: http://localhost/darimesh2/page/mainpage.php');
}


?>