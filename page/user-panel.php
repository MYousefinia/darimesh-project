<?php
    include_once "../database/config2.php";
    error_reporting(0);

    $email = $_SESSION['email'];

    global $Conf;
    $sqlQue = "SELECT * FROM users WHERE email='$email'";
    $checkData = mysqli_query($Conf, $sqlQue);
    $getData = mysqli_fetch_array($checkData);

?>


<!doctype html>
<html lang="fa-ir" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>داریمش | پنل کاربر </title>
    <link rel="stylesheet" href="../css/bootstrap.rtl.css">
    <link rel="stylesheet" href="../css/mdb.rtl.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../fontawesome2/css/all.css">
    <link rel="shortcut icon" href="../img/Darimesh.ico">
    <link rel="stylesheet" href="../css/mains.css">
    <link rel="stylesheet" href="../css/profile.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <?php if(!isset($_SESSION['isLog']) && !isset($_SESSION['NewUser'])){ ?>

        <script>

            Swal.fire({
              icon: 'error',
              title: 'خطا !',
              text: 'کاربر محترم ، برای داشتن پنل کاربری ، ابتدا باید وارد سیستم شوید !',
              footer: '<a href="login.php">ورود به سایت</a>'
            });
            

        </script>

        <div style="text-align: center;">
            <h1 style="display: block;">صفحه مورد نظر یافت نشد   </h1><br>
            <h3><a href="mainpage.php" style="color: #cc5803">بازگشت به صفحه اصلی</a></h3>
        </div>
        

    <?php exit(); }  ?>

    <!-- header -->
    <?php include_once "../includes/headerr.php"; ?>

    <div class="container panel-box">
        <div class="row d-flex justify-content-center ">

            <div class="col-md-10 ">
                <div class="row z-depth-3">

                    <div class="col-sm-4 bg-info rounded-right" style="border-radius: 0 8px 8px 0;">
                        <div class="card-block text-center text-white">
                            <i class="fa-solid fa-user-check fa-7x mt-5"></i>
                            <h2 class="font-weight-normal mt-4 user-name"><i class="fa-solid fa-pen"></i>    <?php echo $getData['username']; ?></h2>
                            <br>
                        </div>
                    </div>

                    <div class="col-sm-8 bg-white " style="border-radius: 8px 0 0 8px;">

                        <h4 class="mt-3 text-center">اطلاعات کاربر</h4>
                        <hr class=" mt-0">
                        <div class="row user-information">
                            
                            <div class="col-sm-6">
                                <p class="font-weight-normal">نام و نام خانوادگی : </p>
                                <span class="text-muted field-val"><?php echo $getData['name']; ?></span>
                            </div>
                            <div class="col-sm-6">
                                <p class="font-weight-normal">ایمیل : </p>
                                <span class="text-muted field-val"><?php echo $getData['email']; ?></span>
                            </div>
                            <br><br><br>
                            <div class="col-sm-6">
                                <p class="font-weight-normal">شماره تلفن : </p>
                                <span class="text-muted field-val"><?php echo $getData['phone']; ?></span>
                            </div>
                            <div class="col-sm-6">
                                <p class="font-weight-normal">آدرس منزل  : </p>
                                <span class="text-muted field-val"><?php echo $getData['address']; ?></span>
                            </div>
                        </div>
                        <hr>

                        <div class="row items text-center">
                            <div class="col-sm-3">
                                <h6><a href="mainpage.php">مشاهده فروشگاه</a></h6>
                            </div>

                            <div class="col-sm-3">
                                <h6><a href="#">سفارش های من</a></h6>
                            </div>

                            <div class="col-sm-3">
                                <h6><a href="../database/logout2.php">خروج</a></h6>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- footer -->
    <?php include_once "../includes/footer.php"; ?>

</body>

<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="../js/mdb.min.js"></script>
<script src="../js/Popper.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
<script src="../fontawesome2/js/all.min.js"></script>

</html>