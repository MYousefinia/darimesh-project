<?php

error_reporting(0);
include '../database/config2.php';

global $Conf;

$msg = null;

$sql = "SELECT * FROM allProduct";
$query = mysqli_query($Conf, $sql);




?>

<!DOCTYPE html>
<html lang="fa-ir" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داریمش | صفحه محصولات </title>
    <link rel="stylesheet" href="../css/bootstrap.rtl.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../fontawesome2/css/all.css">
    <link rel="shortcut icon" href="../img/Darimesh.ico">
    <link rel="stylesheet" href="../css/mains.css">
    <link rel="stylesheet" href="../css/prod.css">
</head>

<body>

    <!-- header -->
    <?php include_once "../includes/headerr.php"; ?>


    <!-- --------------------------------- -->



    <div class="container" style="text-align: center;">
        <br><br>
        <h2 class="product-title"> <i class="fa-solid fa-circle-check"></i> محصولات سایت</h2>

        <?php if ($query) { ?>

            <div class="row" style="width: 100%;display: flex;justify-content: center;">

                <?php while ($row = mysqli_fetch_array($query)) { ?>

                    <div style="margin: 25px 10px;" class="box col-sm-12 col-md-6 col-lg-4 col-xl-3">

                        <div class="card" style="width: 22rem;">
                            <img src="<?= $row['image']; ?>" style="width: 100%;" class="card-img-top" alt="airdots pro">
                            <div class="card-body">
                                <h3 class="card-title"><?= $row['title']; ?></h3>
                                <p class="card-text"><?= $row['price']; ?></p>

                                <?php if ($row['isExist'] == 0) { ?>

                                    <a href="#" class="btn btn-danger disabled">ناموجود</a>

                                <?php } else { ?>

                                    <a href="single.php?product=<?= $row['slug']; ?>&id=<?= $row['id']; ?>" class="btn btn-success">مشاهده محصول</a>

                                <?php } ?>
                            </div>
                        </div>

                    </div>

                <?php } ?>

            </div>

        <?php } ?>

    </div>

    <br><br>


    <!-- footer -->
    <?php include_once "../includes/footer.php"; ?>


    <!-- Attached files -->

    <script src="../js/jquery-3.5.1.min.js" defer></script>
    <script src="../js/bootstrap.min.js" defer></script>
    <script src="../js/Popper.js" defer></script>
    <script src="../fontawesome/js/all.min.js" defer></script>
    <script src="../fontawesome2/js/all.min.js" defer></script>


</body>

</html>