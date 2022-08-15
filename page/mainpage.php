<?php

error_reporting(0);
include_once "../database/config2.php";
include "../database/connect.php";
$username = $_SESSION['username'];
$email = $_SESSION['email'];

global $Conf;
global $connection;

// Check Registered User -----

$sqlQue = "SELECT * from users WHERE email='$email'";
$check = mysqli_query($Conf, $sqlQue);
$getData = mysqli_fetch_array($check);

// get laptop products data --

$laptop_que = "SELECT * FROM allProduct WHERE category='laptop'";
$laptop = $connection->query($laptop_que);
$laptop->execute();

// get mobile products data --

$mobile_que = "SELECT * FROM allProduct WHERE category='mobile'";
$mobile = $connection->query($mobile_que);
$mobile->execute();

// get accessories products data 

$accessories_que = "SELECT * FROM allProduct WHERE category='accessories'";
$accessories = $connection->query($accessories_que);
$accessories->execute();

// get audible products data 

$audible_que = "SELECT * FROM allProduct WHERE category='audible'";
$audible = $connection->query($audible_que);
$audible->execute();

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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

                                <?php if (isset($_SESSION['NewUser']) || isset($_SESSION['isLog'])) { ?> <li class="nav-item dropdown public-dropdown">

                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo $_SESSION['username']; ?>
                                        </a>



                                        <ul class="dropdown-menu dropdown-menu-dark drop" aria-labelledby="navbarDropdown">

                                            <?php if ($getData['status'] == 1) { ?>

                                                <?php if ($getData['role'] == 0) { ?>
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

        <!-- SLIDER -->

        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../img/slides/slide1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>راحتی و آرامــش</h3>
                        <h4>شما نیاز دارید ما <strong style="color: #ffbe0b;font-style: normal;font-weight: normal;">داریــمش</strong> :)</h4>

                    </div>
                </div>

                <div class="carousel-item">
                    <img src="../img/slides/slide4.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h4>ما را در شبکه های اجتماعی دنبال کنید </h4>
                        <span>مسابقات مختلف ، قرعه کشی ، مناسبت های ماهانه و کد تخفیف </span>
                        <a href="#" class="btn btn-info see-prod">دنبال کنید</a>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="../img/slides/slide3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h4>فروش ویژه محصولات <strong style="color: #ffd000">اپل</strong> در اردیبهشت ماه</h4>
                        <span>تخفیف های ویژه گوشی های آیفون در این ماه</span>
                        <a href="#" class="btn btn-info see-prod">مشاهده محصولات و تخفیف ها</a>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="../img/slides/slide2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>تخفیف برای اولین خرید !</h3>
                        <span>برای اولین خرید با کد تخفیف <strong style="font-weight: normal;font-style: normal;color: #ff7b00">DARIMESH</strong> تا سقف 40 درصد تخفیف بگیر</span>
                        <a href="products.php" class="btn btn-warning see-prod">دیدن محصولات</a>
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <section class="services">
            <div class="container ">
                <div class="row boxs d-flex justify-content-between align-items-center">
                    <div class="col-md-3 col-lg-3 col-xl-3  col-sm-6 col-12 service">
                        <div class="item">
                            <i class="fa-solid fa-calendar-check service-icon"></i>
                            <span class="service-text">ضمانت 4 روزه بازگشت کالا</span>
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-3 col-xl-3  col-sm-6 col-12 service">
                        <div class="item">
                            <i class="fa-solid fa-credit-card service-icon"></i>
                            <!--<i class="fa-solid fa-house-circle-check"></i>-->
                            <span class="service-text">پرداخت درب منزل</span>
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-3 col-xl-3  col-sm-6 col-12 service">
                        <div class="item">
                            <i class="fa-solid fa-truck-fast service-icon"></i>
                            <span class="service-text">تحویل سریع</span>
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-3 col-xl-3  col-sm-6 col-12 service">
                        <div class="item">
                            <i class="fa-solid fa-phone service-icon"></i>
                            <span class="service-text">پشتیبانی دائمی</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="amazing-sug">
            <div class="container">
                <h3 class="amazing-title bg-warning">شگفت انگیز</h3>

                <div class="row d-flex justify-content-between align-items-center">

                    <div class="box col-md-4 col-lg-3 col-xl-3 col-sm-6 col-12">
                        <div class="item">
                            <a href="#"><img src="../img/prods/wd-ssd.jpg" alt="amazing img"></a>
                        </div>
                    </div>

                    <div class="box col-md-4 col-lg-3 col-xl-3 col-sm-6 col-12">
                        <div class="item">
                            <a href="#"><img src="../img/prods/samsung-ssd.jpg" alt="amazing img"></a>
                        </div>
                    </div>

                    <div class="box col-md-4 col-lg-3 col-xl-3 col-sm-6 col-12">
                        <div class="item">
                            <a href="#"><img src="../img/prods/Corsair.jpg" alt="amazing img"></a>
                        </div>
                    </div>

                    <div class="box col-md-4 col-lg-3 col-xl-3 col-sm-6 col-12">
                        <div class="item">
                            <a href="#"><img src="../img/prods/Razer.jpg" alt="amazing img"></a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- -------------------------------------------------------------- -->

        <section class="top-laptop-slider" id="laptop" >
            <div class="container">
                <h3 class="top-laptop-title bg-primary">برترین های لپ تاپ</h3>

                <?php if ($laptop) { ?>

                    <div class="owl-carousel owl-theme">

                        <?php while ($row = $laptop->fetchObject()) { ?>

                            <div class="ms-2 me-2">
                                <div class="card">
                                    <a href="#"><img src="<?= $row->image; ?>" width="240" height="240" class="card-img " alt="laptop img"></a>
                                    <div class="card-body">
                                        <a href="single.php?product=<?= $row->slug; ?>" class="card-title">
                                            <h5 style="font-size: 13px"><?= $row->title; ?></h5>
                                        </a>
                                        <div class="details">

                                            <?php if ($row->isExist == 0) { ?>
                                                <span class="isAvailable">ناموجود</span>
                                            <?php } else { ?>
                                                <span class="isAvailable">موجود</span>
                                            <?php } ?>

                                            <span class="price"><?= $row->price; ?></span>

                                        </div>

                                        <?php if ($row->isExist == 0) { ?>

                                            <a class="btn btn-outline-warning see-kala disabled tool" title="متاسفانه این کالا موجود نیست">
                                                مشاهده کالا
                                                <span class="tooltip"></span>
                                            </a>

                                        <?php } else { ?>

                                            <a href="single.php?product=<?= $row->slug; ?>" class="btn btn-outline-warning see-kala tool">
                                                مشاهده کالا
                                                <span class="tooltip"></span>
                                            </a>

                                        <?php } ?>

                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                    </div>

                <?php } ?>
            </div>
        </section>

        <!-- -------------------------------------------------------------- -->

        <section class="top-mobile-slider" id="mobile">

            <div class="container">
                <h3 class="top-mobile-title">برترین های موبایل</h3>

                <?php if ($mobile) { ?>

                    <div class="owl-carousel owl-theme">

                        <?php while ($row = $mobile->fetchObject()) { ?>

                            <div class="ms-2 me-2">
                                <div class="card">
                                    <a href="#"><img src="<?= $row->image; ?>" class="card-img " alt="mobile img"></a>
                                    <div class="card-body">
                                        <a href="single.php?product=<?= $row->slug; ?>" class="card-title">
                                            <h5 style="font-size: 12px;"><?= $row->title; ?></h5>
                                        </a>

                                        <div class="details">

                                            <?php if ($row->isExist == 0) { ?>
                                                <span class="isAvailable">ناموجود</span>
                                            <?php } else { ?>
                                                <span class="isAvailable">موجود</span>
                                            <?php } ?>

                                            <span class="price"><?= $row->price; ?></span>

                                        </div>

                                        <?php if ($row->isExist == 0) { ?>

                                            <a class="btn btn-outline-warning see-kala disabled tool" title="متاسفانه این کالا موجود نیست">
                                                مشاهده کالا
                                                <span class="tooltip"></span>
                                            </a>

                                        <?php } else { ?>

                                            <a href="single.php?product=<?= $row->slug; ?>" class="btn btn-outline-warning see-kala tool">
                                                مشاهده کالا
                                                <span class="tooltip"></span>
                                            </a>

                                        <?php } ?>

                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                    </div>

                <?php } ?>

            </div>

        </section>

        <section class="special">
            <div class="container">

                <h3 class="special-title bg-success">پیشنهاد ویژه</h3>

                <div class="card mb-3" style="max-width: 100%;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="../img/prods/special-asus-ROG-Strix-G15-G513IE-AA.jpg" class="img-fluid rounded img-card" alt="Special suggestion img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <span class="special-text">پیشنهاد ویژه</span>
                                <span class="special-offer">20%</span>
                                <h5 class="card-title"><a href="#">لپ تاپ ایسوس مدل ROG Strix G15-G513IE-AA</a></h5>
                                <div class="card-text">
                                    <p>
                                        لپ ‌تاپ ROG Strix G15 G513IE-AA از محصولات شرکت «ایسوس» محسوب می‌شود که با طراحی زیبا روانه بازار شده است. بدنه‌ شیک ROG Strix G15 G513IE-AA به‌ گونه‌ای طراحی شده که لپ‌ تاپی رده ‌بالا را نوید می‌‌دهد. این لپ تاپ و 2.1 کیلوگرم وزن دارد و برای جا‌به‌‌جایی دائمی آن مشکل خاصی نخواهید داشت ...
                                    </p>
                                </div>
                                <div class="details">
                                    <span class="date-expire">تا پایان تیر ماه 1401</span>
                                    <span class="price"> <strike style="color: #777">35،900،000</strike> | 28،720،000 تومان </span>
                                    <a href="لپ-تاپ-rog-strik-g15.php" class="btn btn-outline-dark see-kala">در مورد کالا / خرید</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="digital-kala" id="menu">

            <div class="container">

                <h3 class="digital-kala-title">کالای دیجیتال</h3>
                <br>

                <nav class="acc-navs">
                    <div class="nav nav-tabs " id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-tools-tab" data-bs-toggle="tab" data-bs-target="#nav-tools" type="button" role="tab" aria-controls="nav-tools" aria-selected="true">لوازم جانبی</button>
                        <button class="nav-link" id="nav-about-ears-tab" data-bs-toggle="tab" data-bs-target="#nav-about-ears" type="button" role="tab" aria-controls="nav-about-ears" aria-selected="false">هندزفری ، هدست و هدفون</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-tools" role="tabpanel" aria-labelledby="nav-tools-tab">

                        <?php if ($accessories) { ?>

                            <div class="owl-carousel owl-theme">

                                <?php while ($row = $accessories->fetchObject()) { ?>

                                    <div class="ms-2 me-2">
                                        <div class="card">
                                            <a href="single.php?product=<?= $row->slug; ?>" ><img src="<?= $row->image; ?>" class="card-img " alt="mobile img"></a>
                                            <div class="card-body">
                                                <a href="single.php?product=<?= $row->slug; ?>" class="card-title">
                                                    <h5 style="font-size: 12px;"><?= $row->title; ?></h5>
                                                </a>

                                                <div class="details">

                                                    <?php if ($row->isExist == 0) { ?>
                                                        <span class="isAvailable">ناموجود</span>
                                                    <?php } else { ?>
                                                        <span class="isAvailable">موجود</span>
                                                    <?php } ?>

                                                    <span class="price"><?= $row->price; ?></span>

                                                </div>

                                                <?php if ($row->isExist == 0) { ?>

                                                    <a class="btn btn-outline-warning see-kala disabled tool" title="متاسفانه این کالا موجود نیست">
                                                        مشاهده کالا
                                                        <span class="tooltip"></span>
                                                    </a>

                                                <?php } else { ?>

                                                    <a href="single.php?product=<?= $row->slug; ?>" class="btn btn-outline-warning see-kala tool">
                                                        مشاهده کالا
                                                        <span class="tooltip"></span>
                                                    </a>

                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>

                            </div>

                        <?php } ?>

                    </div>

                    <div class="tab-pane fade" id="nav-about-ears" role="tabpanel" aria-labelledby="nav-about-ears-tab">

                        <?php if ($audible) { ?>

                            <div class="owl-carousel owl-theme">

                                <?php while ($row = $audible->fetchObject()) { ?>

                                    <div class="ms-2 me-2">
                                        <div class="card">
                                            <a href="single.php?product=<?= $row->slug; ?>" ><img src="<?= $row->image; ?>" class="card-img " alt="mobile img"></a>
                                            <div class="card-body">
                                                <a href="single.php?product=<?= $row->slug; ?>" class="card-title">
                                                    <h5 style="font-size: 12px;"><?= $row->title; ?></h5>
                                                </a>

                                                <div class="details">

                                                    <?php if ($row->isExist == 0) { ?>
                                                        <span class="isAvailable">ناموجود</span>
                                                    <?php } else { ?>
                                                        <span class="isAvailable">موجود</span>
                                                    <?php } ?>

                                                    <span class="price"><?= $row->price; ?></span>

                                                </div>

                                                <?php if ($row->isExist == 0) { ?>

                                                    <a href="single.php?product=<?= $row->slug; ?>+id=<?= $row->id; ?>" class="btn btn-outline-warning see-kala disabled tool" title="متاسفانه این کالا موجود نیست">
                                                        مشاهده کالا
                                                        <span class="tooltip"></span>
                                                    </a>

                                                <?php } else { ?>

                                                    <a href="single.php?product=<?= $row->slug; ?>" class="btn btn-outline-warning see-kala tool">
                                                        مشاهده کالا
                                                        <span class="tooltip"></span>
                                                    </a>

                                                <?php } ?>


                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>

                            </div>

                        <?php } ?>

                    </div>

                </div>

            </div>

        </section>

        <section class="our-support bg-secondary">
            <div class="row d-flex support-content">
                <div class="support-text col-12 col-md-12 col-lg-6 col-xl-6">
                    <p><i class="fa-solid fa-circle-info icon"></i> نیاز به راهنمایی و مشاوره دارید ؟ پشتیبان در خدمت شماست ؛ 24 ساعت و هر روز هفته ! </p>
                </div>

                <div class="support-info col-12 col-md-12 col-lg-6 col-xl-6">

                    <p><i class="fa-solid fa-square-phone icon"></i> شماره تلفن : 09224187498 </p>
                    <p><i class="fa-solid fa-square-envelope icon"></i> ایمیل : sup.info@darimesh.com </p>

                </div>

            </div>
        </section>


        <!-- -------------------- -->




        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-around p-4 border-bottom">
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                    <span class="social-text">در شبکه های اجتماعی ما را دنبال کنید : </span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div class="icons">
                    <a href="#" class="me-4 text-reset" style="font-size: 18px;">
                        <i class="fa-brands fa-telegram icon"></i>
                    </a>
                    <a href="#" class="me-4 text-reset" style="font-size: 18px;">
                        <i class="fa-brands fa-google-plus-g icon"></i>
                    </a>
                    <a href="#" class="me-4 text-reset " style="font-size: 18px;">
                        <i class="fa-brands fa-instagram icon"></i></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 text-center mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fa-brands fa-opencart me-3"></i>درباره داریمش
                            </h6>
                            <p style="font-size: 13px;text-align: justify;">
                                یک خرید اینترنتی مطمئن، نیازمند فروشگاهی است که بتواند کالاهایی متنوع، باکیفیت و دارای قیمت مناسب را در مدت زمانی کوتاه به دست مشتریان خود برساند و ضمانت بازگشت کالا هم داشته باشد؛ ویژگی‌هایی که فروشگاه اینترنتی داریمش بر روی آن‌ها کار کرده و توانسته از این طریق مشتریان ثابت خود را داشته باشد.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 text-center mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold  mb-4">
                                دسته بندی محصولات
                            </h6>
                            <p style="font-size: 14px">
                                <a href="#mobile" class="text-reset">موبایل </a>
                            </p>
                            <p style="font-size: 14px">
                                <a href="#laptop" class="text-reset">لپ تاپ و تبلت</a>
                            </p>
                            <p style="font-size: 14px">
                                <a href="#menu" class="text-reset">لوازم جانبی</a>
                            </p>
                            <p style="font-size: 14px">
                                <a href="#menu" class="text-reset">هندزفری و هدفون</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 text-center">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                دسترسی سریع
                            </h6>
                            <p style="font-size: 14px">
                                <a href="#!" class="text-reset">درباره ما</a>
                            </p>
                            <p style="font-size: 14px">
                                <a href="#!" class="text-reset">تماس با ما</a>
                            </p>
                            <p style="font-size: 14px">
                                <a href="#!" class="text-reset">پشتیبانی</a>
                            </p>
                            <p style="font-size: 14px">
                                <a href="login.php" target="_blank" class="text-reset">ورود / ثبت نام</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 text-center mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                اعتماد الکترونیک
                            </h6>
                            <p>
                                <img src="../img/logo/e-namd-test.png" alt="">
                            </p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="font-size: 15px;background-color: rgba(0, 0, 0, 0.05);">
                © تمامی حقوق مادی و معنوی این سایت محفوظ است
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->



    </div>

    <!-- Main end -->

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/mdb.min.js"></script>
    <script src="../js/Popper.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
    <script src="../fontawesome2/js/all.min.js"></script>
    <script src="../js/script.js"></script>

</body>

</html>