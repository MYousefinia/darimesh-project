<?php


/*$sql = "SELECT * FROM allProduct WHERE slug='$product'";
$query = mysqli_query($Conf,$sql);
$row = mysqli_fetch_array($query);*/

error_reporting(0);

include "../database/config2.php";

global $Conf;

$isAdd = null;

// Registered user ? -----
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$userID = $_SESSION['id'];

$product = $_GET['product'];
$product_id = $_GET['id'];

$sql = "SELECT * FROM allProduct WHERE slug='$product'";
$query = mysqli_query($Conf, $sql);
$result = mysqli_fetch_array($query);

if(isset($_POST['add-btn'])){
    $sql = "INSERT INTO cart SET user_id='$userID', product_id='$product_id'";
    $query = mysqli_query($Conf, $sql);
    $isAdd = true;
}


?>

<!DOCTYPE html>
<html lang="fa-ir" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داریمش | خرید <?php echo $result['title']; ?></title>
    <link rel="stylesheet" href="../css/bootstrap.rtl.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../fontawesome2/css/all.css">
    <link rel="shortcut icon" href="../img/Darimesh.ico">
    <link rel="stylesheet" href="../css/mains.css">
    <link rel="stylesheet" href="../css/post2.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- HEADER -->
    <?php include_once "../includes/headerr.php"; ?>



    <div class="container post-wrapper">

            <div class=" img-box">

                <img src="<?= $result['image']; ?>" width="400" height="400" alt="Post image">

            </div>

            <div class=" post-content ">

                <h3 class="title"><?= $result['title']; ?></h3>

                <nav class="property-list">

                    <h5 class="property-title">ویژگی های محصول</h5>

                    <ul>
                        <li>سری پردازنده : <span>مقدار ثابت</span></li>
                        <li> میزان حافظه رم : <span>مقدار ثابت</span></li>
                        <li> نوع حافظه رم : <span>مقدار ثابت</span></li>
                        <li> سازنده پردازنده گرافیکی : <span>مقدار ثابت</span></li>
                        <li>اندازه صفحه نمایش : <span>مقدار ثابت</span></li>
                        <li>سیستم عامل : <span>مقدار ثابت</span></li>
                        <li>طبقه بندی محصول : <span><?= $result['tag']; ?></span></li>
                    </ul>

                </nav>
                <br>

                <div class="cart-btn">

                    <?php if (isset($_SESSION['isLog'])) { ?>
                        <form method="post" action="" style="max-width: 100%;">
                            <input type="submit" name="add-btn" style="width: 100%;font-size:14px;padding: 20px 0;border-radius:10px;" class="btn btn-danger cart-prize" value="افزودن به سبد خرید">
                        </form><br>
                    <?php } else { ?>

                        <div class="alert alert-danger" style="font-size:14px;">برای اضافه کردن این محصول به سبد خرید ، ابتدا باید وارد حساب خود شوید ! <a href="login.php">ورود به حساب</a></div>

                    <?php } ?>

                    <div class="alert alert-primary">قیمت : <?= $result['price'].' تومان'; ?></div>

                </div>

            </div>

           <!-- <script>
                Swal.fire({
                    icon: 'error',
                    title: ':(',
                    text: 'خطا در برقراری ارتباط با سرور'

                })
            </script> -->


    </div>

    <!-- FOOTER -->
    <?php include_once "../includes/footer.php"; ?>

    <?php if ($isAdd) { ?>

        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'محصول شما به سبد خرید افزوده شد'
            })
        </script>

    <?php } ?>


</body>

<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/Popper.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
<script src="../fontawesome2/js/all.min.js"></script>

</html>