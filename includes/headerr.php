<?php 

include_once "../database/config2.php";
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];

    // Check Registered User -----
    global $Conf;
    $sqlQue = "SELECT * from users WHERE email='$email'";
    $check = mysqli_query($Conf, $sqlQue);
    $getData = mysqli_fetch_array($check);

?>

<!DOCTYPE html>
<html lang="fa-ir" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داریمش | نو آوری و رویکردی جدید در خرید </title>
    <link rel="stylesheet" href="../css/bootstrap.rtl.css">
    <link rel="stylesheet" href="../css/mdb.rtl.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../fontawesome2/css/all.css">
    <link rel="shortcut icon" href="../img/Darimesh.ico">
    <link rel="stylesheet" href="../css/mains.css">
</head>

<body dir="rtl">

    <!-- Main start -->

    <div class="main">

<div class="topbar">
    <header class="header">

        <nav class="navbar navbar-expand-lg navbar-light sticky-top fixed-top customize-navbar public-nav">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../img/logo/logo4.png" width="250" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon toggeler-color"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="mainpage.php">خانه</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="products.php">محصولات</a>
                        </li>

                        <!--<li class="nav-item dropdown public-dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                دسته بندی کالا
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark drop" aria-labelledby="navbarDropdown">

                                <li><a class="dropdown-item" href="#">  گوشی و تبلت </a></li>
                                <li><a class="dropdown-item" href="#"> لپ تاپ </a></li>
                                <li><a class="dropdown-item" href="#"> لوازم جانبی و سخت افزار </a></li>
                                <li><a class="dropdown-item" href="#"> کامپیوتر </a></li>
                                <li><a class="dropdown-item" href="#"> هندزفری و هدفون </a></li>

                            </ul>
                        </li>-->

                        <li class="nav-item">
                            <a class="nav-link" href="aboutUs.php">درباره ما</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="faq.php">سوالات متداول</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">تماس با ما</a>
                        </li>

                        <?php if(isset($_SESSION['NewUser']) || isset($_SESSION['isLog'])) { ?> <li class="nav-item dropdown public-dropdown">
                            
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['username']; ?>
                            </a>



                                <ul class="dropdown-menu dropdown-menu-dark drop" aria-labelledby="navbarDropdown">

                                    <?php if($getData['status'] == 1) { ?>

                                        <?php if($getData['role'] == 0) { ?>
                                            <li><a class="dropdown-item" href="user-panel.php"> مشاهده پنل کاربری</a></li>
                                        <?php } else { ?>
                                            <li><a class="dropdown-item" href="../admin"> ادمین </a></li>
                                        <?php } ?>    
                                        <li><a class="dropdown-item" href="cart.php"> سبد خرید </a></li>
                                        <li><a class="dropdown-item" href="../database/logout2.php"> خروج از حساب </a></li>
                                
                                    <?php } else { ?>

                                        <li><a class="dropdown-item" href="testcheck.php"> فعالسازی حساب </a></li>

                                    <?php } ?>        
                                </ul> 

                            </li> <?php } else { ?>

                            <li class="nav-item dropdown public-dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    حساب کاربری
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark drop" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="login.php"><i class="fa-solid fa-right-to-bracket"></i> ورود</a></li>
                                    <li><a class="dropdown-item" href="register.php"><i class="fa-solid fa-user-plus"></i> ثبت نام </a></li>
                                </ul>
                            </li>

                        <?php } ?>
                        

                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2 searchBox" type="search" placeholder="جستجوی کالا ..." aria-label="Search">
                        <button class="btn btn-outline-primary search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
            </div>
        </nav>

    </header>

</div>

        

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tooltip.js/1.3.1/tooltip.min.js" integrity="sha512-ZAFwin0nQNXMJRo329TcU4ZyC+ZgKbnaopq/LH/6j7n9zT7ZVLK5BiSmnqgx7jNiewVLgc04geoE62cNN1D8VQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/mdb.min.js"></script>
    <script src="../js/Popper.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
    <script src="../fontawesome2/js/all.min.js"></script>
    <script src="../js/script.js"></script>

</body>
</html>
