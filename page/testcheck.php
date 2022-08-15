<?php 

    include_once "../database/config2.php";
    if(isset($_GET['submit'])){
        global $Conf;
        $active = $_GET['code'];
        
        $sqlQue = "UPDATE users SET status='1' WHERE activeCode='$active'";
        if($sqlQue){
            mysqli_query($Conf, $sqlQue);
            header("Location: http://localhost/darimesh2/page/login.php");
        }

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check</title>
    <style>
        body{
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form input{
            width: 250px;
            padding: 8px 12px;
            margin: 0 15px;
        }

        button{
            padding: 8px 20px;
        }
    </style>
</head>
<body>
    
    <form action="" method="GET">
        <input type="number" name="code" placeholder="کد تایید را وارد کنید " />
        <button type="submit" name="submit">ارسال</button>
    </form>

</body>
</html>