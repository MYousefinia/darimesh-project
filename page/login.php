<?php

error_reporting(0);
include_once "../database/config2.php";

if (isset($_SESSION['user-data'])) {
    header("Location: user-panel.php");
}

$userData = array(
    "email" => $_POST['email'],
    "username" => $_POST['username'],
    "password" => $_POST['password']
);

$dataErr = array(
    "emailErr" => 'لطفا ایمیل خود را وارد کنید *',
    "usernameErr" => "وارد کردن نام کاربری الزامی است *",
    "passwordErr" => "وارد کردن رمز عبور الزامی است *"
);

$emailErr = $usernameErr = $passwordErr = '';

if (isset($_POST['submit'])) {
    if (empty($userData["email"])) {
        $emailErr = $dataErr["emailErr"];
    } else if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
        $emailErr = 'لطفا یک ایمیل معتبر وارد کنید *';
    }

    if (empty($userData['username'])) {
        $usernameErr = $dataErr['usernameErr'];
    }

    if (empty($userData['password'])) {
        $passwordErr = $dataErr['passwordErr'];
    } else {

        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        global $Conf;
        $sqlCheck = mysqli_query($Conf, "SELECT * FROM users WHERE email = '$email' AND username='$username' AND password = '$password' ");
        $getData = mysqli_fetch_array($sqlCheck);

        $msgtxt = '';

        if (mysqli_num_rows($sqlCheck) > 0) {
            $msgtxt = 'شما با موفقیت وارد شدید';
            $_SESSION['isLog'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $getData['id'];
            echo "<script> location.replace('http://localhost/darimesh2/page/user-panel.php') </script>";
        } else {
            $msgtxt = 'نام کاربری یا رمز عبور اشتباه است * لطفا دوباره امتحان کنید';
            $_SESSION['isLog'] = false;
        }
    }
}

?>

<!doctype html>
<html lang="fa-ir" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>داریمش | ورود به سایت </title>
    <link rel="stylesheet" href="../css/bootstrap.rtl.css">
    <link rel="stylesheet" href="../css/mdb.rtl.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../fontawesome2/css/all.css">
    <link rel="shortcut icon" href="../img/Darimesh.ico">
    <link rel="stylesheet" href="../css/reg-style.css">
    <link rel="stylesheet" href="../css/mains.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>


    <div class="container-fluid">
        <div class="row px-3">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">


                <div class="card-body">
                    <h4 class="title text-center mt-4">ورود به سایت</h4>

                    <form class="form-box px-3" action="" novalidate method="post">

                        <div class="form-input">
                            <span><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" style="text-align: right;" placeholder="* ایمیل" required name="email" id="email" tabindex="10" />
                        </div>

                        <span class="err" style="font-size: 10px; color: red;margin: 10px 0"><?php echo $emailErr; ?></span>

                        <div class="form-input">
                            <span><i class="fa-solid fa-user-pen"></i></span>
                            <input type="username" placeholder="نام کاربری *" required name="username" id="username" tabindex="10" />
                        </div>

                        <span class="err" style="font-size: 10px; color: red;margin: 10px 0"><?php echo $usernameErr; ?></span>

                        <div class="form-input">
                            <span><i class="fa-solid fa-key"></i></span>
                            <input type="password" placeholder="رمز عبور *" required name="password" id="password" tabindex="10" />
                        </div>

                        <span class="err" style="font-size: 10px; color: red;margin: 10px 0"><?php echo $passwordErr; ?></span>

                        <div class="mb-3 remember-me">
                            <div class="custom-control custom-check">
                                <input type="checkbox" class="custom-control-input" name="checkBox-reg" id="checkBox-reg" />
                                <label class="custom-control-label" for="checkBox-reg">مرا به خاطر بسپار !</label>
                            </div>
                        </div>

                        <div class="mb-3 submit-box">
                            <button class="btn btn-block btn-outline-success" name="submit" type="submit">ورود به سایت</button>
                        </div>

                        <span class="err" style="font-size: 13px; color: red;margin: 10px 0"><?php echo $msgtxt; ?></span>

                        <hr class="my-4">

                        <div class="mb-2 text-center have-acc">
                            <span>حساب ندارید ؟</span><a href="register.php" target="_blank">یکی بسازید !</a>
                        </div>

                    </form>

                </div>

                <div class="img-left log-img d-none d-md-flex "></div>
            </div>
        </div>
    </div>

</body>

<?php if (isset($_SESSION['NewUser'])) { ?>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
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
            title: 'حساب کاربری شما با موفقیت ثبت شد'
        })
    </script>

<?php } ?>

<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/mdb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="../js/Popper.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
<script src="../fontawesome2/js/all.min.js"></script>
<script src="../js/script.js"></script>

</html>