<?php

error_reporting(0);

include_once "../database/config2.php";
include "../PHPMailer/class.phpmailer.php";

global $Conf;

$userData = array(
    "name" => $_POST['name-family'],
    "phone" => $_POST['ph-number'],
    "email" => $_POST['email'],
    "username" => $_POST['username'],
    "password" => $_POST['password'],
    "re_pass" => $_POST['re-password'],
    "address" => $_POST['user-address']
);

$setError = array(
    "name" => 'وارد کردن نام و نام خانوادگی الزامی است *',
    'phone' => 'وارد کردن شماره تلفن الزامی است *',
    'email' => 'وارد کردن ایمیل الزامی است *',
    'username' => 'انتخاب نام کاربری الزامی است *',
    'password' => 'وارد کردن رمز عبور الزامی است * رمز عبور میبایست حداقل دارای 8 کاراکتر و ترکیبی بین حروف و اعداد باشد',
    're_pass' => 'رمز عبور و تکرار آن یکسان نیست *',
    "address" => 'وارد کردن آدرس دقیق منزل الزامی است *'
);

$nameErr = $phoneErr = $emailErr = $usernameErr = $passwordErr = $re_passErr = $addressErr = '';

// RegEx var ----

$phoneRegEx = '/^(?:98|\+98|0098|0)?9[0-9]{9}$/';
//$usernameRegEx = ;
$passwordRegEx = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/';

if (isset($_POST['submit'])) {
    if (empty($userData['name'])) {
        $nameErr = $setError['name'];
    }

    if (empty($userData['phone'])) {
        $phoneErr = $setError['phone'];
    } else if (!preg_match($phoneRegEx, $userData['phone'])) {
        $phoneErr = 'لطفا یک شماره تلفن معتبر وارد کنید ';
    }

    if (empty($userData['email'])) {
        $emailErr = $setError['email'];
    } else if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
        $emailErr = 'لطفا یک ایمیل معتبر وارد کنید ';
    }

    if (empty($userData['username'])) {
        $usernameErr = $setError['username'];
    }

    if (empty($userData['password'] && !preg_match($passwordRegEx, $userData['password']))) {
        $passwordErr = $setError['password'];
    }

    if (empty($userData['re_pass']) || $userData['re_pass'] !== $userData['password']) {
        $re_passErr = $setError['re_pass'];
    }

    if (empty($userData['address'])) {
        $addressErr = $setError['address'];
    }

    else {
        $nameFamily = $_POST['name-family'];
        $phone = $_POST['ph-number'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $address = $_POST['user-address'];
        $activeCode = rand(10000, 99999);
    
        $Conf;
        $sqlCode = "INSERT INTO users (name,phone,email,username,password,address,activeCode) VALUES ('$nameFamily','$phone','$email','$username','$password','$address','$activeCode')";
    
        $query = mysqli_query($Conf, $sqlCode);

        if (!$query) {
            echo "<br>" . "Error: " . "<br>" . mysqli_error($Conf);
          } else {
            $mail=new PHPMailer(true);
            $mail->IsSMTP();

            try
            {
            	$mail->Host='smtp.outlook.com';
        	    $mail->SMTPAuth=true;
        	    $mail->SMTPSecure="tls";
        	    $mail->Port=587;
        	    $mail->Username="Darimesh@outlook.com";
        	    $mail->Password="3371747631a";
        	    $mail->AddAddress($email);
        	    $mail->SetFrom("Darimesh@outlook.com");
        	    $mail->Subject= "فعالسازی حساب کاربری شما :";
        	    $mail->CharSet="UTF-8";
        	    $mail->ContentType="text/htm";
                $mail->MsgHTML("<div style='text-align:center;direction:rtl;font-family:iransans;'><h1 style='font-size: 45px;'>کاربر محترم ، به داریمش خوش آمدید</h1> <br> <h2 style='font-size: 35px;'>کد فعالسازی حساب کاربری شما :</h2> <br> <h1 style='font-size: 40px;color:red;'>$activeCode</h1></div>");
                $mail->Send();
            }
            catch(phpmailerException $e)
            {
            	echo $e->errorMessage();
            }
            

            // Session Set -------------
            $_SESSION['NewUser'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            // -------------------------

            echo  "<script> location.replace('http://localhost/darimesh2/page/testcheck.php'); </script>"; 
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
    <title>داریمش | عضویت در سایت </title>
    <link rel="stylesheet" href="../css/bootstrap.rtl.css">
    <link rel="stylesheet" href="../css/mdb.rtl.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../fontawesome2/css/all.css">
    <link rel="stylesheet" href="../css/mains.css">
    <link rel="stylesheet" href="../css/reg-style.css">
    <link rel="shortcut icon" href="../img/Darimesh.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>


    <div class="container-fluid">
        <div class="row px-3">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">


                <div class="card-body">
                    <h4 class="title text-center mt-4">عضویت در سایت</h4>

                    <form class="form-box px-3" id="register" action="" method="post">
                        <div class="form-input">
                            <span><i class="fa-solid fa-user-plus"></i></span>
                            <input type="text" placeholder="نام و نام خانوادگی *" name="name-family" id="name-family" tabindex="10" />
                        </div>

                        <span id="name-error" class="err" style="font-size: 10px; color: red;margin: 10px 0"><?php echo $nameErr; ?></span>

                        <div class="form-input">
                            <span><i class="fa-solid fa-phone"></i></span>
                            <input type="text" placeholder="شماره تلفن *" name="ph-number" id="ph-number" tabindex="10" />
                        </div>

                        <span id="phone-error" class="err" style="font-size: 10px; color: red;margin: 10px 0"><?php echo $phoneErr; ?></span>

                        <div class="form-input">
                            <span><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" style="text-align: right;" placeholder="* ایمیل" name="email" id="email" tabindex="10" />
                        </div>

                        <span id="email-error" class="err" style="font-size: 10px; color: red;margin: 10px 0"><?php echo $emailErr; ?></span>

                        <div class="form-input">
                            <span><i class="fa-solid fa-user-pen"></i></span>
                            <input type="username" placeholder="نام کاربری *" name="username" id="username" tabindex="10" />
                        </div>

                        <span id="username-error" class="err" style="font-size: 10px; color: red;margin: 10px 0"><?php echo $usernameErr; ?></span>

                        <div class="form-input">
                            <span><i class="fa-solid fa-key"></i></span>
                            <input type="password" placeholder="رمز عبور *" name="password" id="password" tabindex="10" />
                        </div>

                        <span id="password-error" class="err" style="font-size: 10px; color: red;margin: 10px 0"><?php echo $passwordErr; ?></span>

                        <div class="form-input">
                            <span><i class="fa-solid fa-lock"></i></span>
                            <input type="password" placeholder="تکرار رمز عبور *" name="re-password" id="re-password" tabindex="10" />
                        </div>

                        <span id="repass-error" class="err" style="font-size: 10px; color: red;margin: 10px 0"><?php echo $re_passErr; ?></span>

                        <div class="form-input">
                            <textarea name="user-address" id="user-address" style="resize: none;" class="user-address" placeholder="آدرس دقیق منزل *" cols="30" rows="3" tabindex="10"></textarea>
                        </div>


                        <span id="address-error" class="err" style="font-size: 10px; color: red;margin: 10px 0"><?php echo $addressErr; ?></span>

                        <div class="mb-3 submit-box">
                            <button class="btn btn-block btn-outline-primary" name="submit" id="submit" type="submit">ارسال اطلاعات</button>
                        </div>

                        <hr class="my-4">

                        <div class="mb-2 text-center have-acc">
                            <span>حساب دارید ؟ </span><a href="login.php" target="_blank">وارد شوید !</a>
                        </div>

                    </form>

                </div>

                <div class="img-left reg-img d-none d-md-flex "></div>
            </div>
        </div>
    </div>

</body>

<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="../js/mdb.min.js"></script>
<script src="../js/Popper.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
<script src="../fontawesome2/js/all.min.js"></script>
<script src="../js/script.js"></script>

</html>