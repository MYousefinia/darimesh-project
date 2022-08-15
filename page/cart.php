<?php

error_reporting(0);
include '../database/config2.php';

// Registered user ?
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$userID = $_SESSION['id'];

$isEmpty = null;

global $Conf;
$sql = "SELECT cart.id, allProduct.title , allProduct.image, users.name, allProduct.price FROM cart JOIN allProduct ON product_id = allProduct.id JOIN users ON user_id=users.id WHERE user_id='$userID'";
$query = mysqli_query($Conf, $sql);

$counter = 1;

if(isset($_POST['discount'])){
    $dis_code = "DARIMESH";
    $user_input = $_POST['disc_input'];

    if($user_input == $dis_code){
        $total = round(($total * 40) / 100) - $total;
    }

}


?>


<!DOCTYPE html>
<html lang="fa-ir" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>داریمش | سبد خرید شما</title>
    <link rel="stylesheet" href="../css/bootstrap.rtl.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../fontawesome2/css/all.css">
    <link rel="shortcut icon" href="../img/Darimesh.ico">
    <link rel="stylesheet" href="../css/mains.css">
    <link rel="stylesheet" href="../css/basket.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Header -->
    <?php include_once "../includes/headerr.php"; ?>

    <div class="container cart-box">

        <div class="table-responsive">

            <table class="table">
                <thead class="table-dark">

                    <tr>

                        <th>ردیف</th>
                        <th>نام کالا</th>
                        <th>نام خریدار</th>
                        <th>تصویر کالا</th>
                        <th>قیمت کالا</th>
                        <th>عملیات</th>

                    </tr>

                </thead>
                <tbody>

                    <?php while ($result = mysqli_fetch_array($query)) : ?>

                        <tr>

                            <td><?= $counter++; ?></td>
                            <td><?= $result['title']; ?></td>
                            <td><?= $result['name']; ?></td>
                            <td><img src="<?= $result['image']; ?>" height="70px" alt="product image ..."></td>
                            <td><?php echo $result['price']. ' '. 'تومان' ; ?></td>
                            <td><a href="delete.php?id=<?= $result['id']; ?>" style="font-size: 14px" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></a></td>

                        </tr>

                    <?php

                    $total += $result['price'];

                    endwhile; ?>

                    <tr>
                        <td>

                            <form action="" method="post">
                                <input type="text" class="form-control" name="disc_input" placeholder="کد تخفیف" style="font-size:13px;padding:8px 15px;margin:10px 0;">
                                <input type="submit" name="discount" class="btn btn-primary" style="padding: 10px 50px;" value="بروزرسانی">
                            </form>

                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="alert alert-dark" style="margin: 20px;">جمع کل : <?php echo $total.' '. 'تومان'; ?></div>

            <a href="#" class="btn btn-danger">نهایی کردن خرید</a>
            <a href="mainpage.php" class="btn btn-dark">بازگشت به فروشگاه</a>

        </div>

    </div>

    <!-- Footer -->
    <?php include_once "../includes/footer.php"; ?>
</body>

</html>