<?php

    include "header.php"; 
    include '../database/config2.php';
    global $Conf;

    $num_row = 1;

    $sqlQue = "SELECT * FROM menus";
    $result = $Conf->query($sqlQue);

?>

<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

<body>
<div>

    <h4 style="color: red"><?php if(!$result){echo "خطا در برقراری ارتباط با سرور !";} ?></h4>

    <h2>مدیریت منو ها</h2>

    <table class="table table-striped m-0">
        <thead>
            <tr>
                <th>ردیف</th>
                <th>عنوان منو</th>
                <th>سرگروه / بر اساس شماره اولویت</th>
                <th>اولویت منو</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>

            <?php if($result){ ?>

                <?php while($row = $result->fetch_object()){ ?>

                    <tr>
                        <th scope="row"><?php echo $num_row++; ?></th>
                        <td><?php echo $row->title; ?></td>
                        <td><?php echo $row->sub; ?></td>
                        <td><?php echo $row->sort; ?></td>
                        <td><a class="btn btn-primary" href="editmenu.php?id=<?php echo $row->id; ?>">ویرایش منو</a> <a class="btn btn-danger" id="btn" href="deletemenu.php?id=<?php echo $row->id; ?>">حذف منو</a></td>
                    </tr>

                <?php } ?>

            <?php } ?>
            
        </tbody>
    </table>

</div>

</body>

<?php include "footer.php"; ?>

