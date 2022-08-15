<?php 

    include "header.php"; 

    $num_row = 1;

    global $Conf;

    $sqlQue = "SELECT id,name,email,phone,role FROM users";
    /*$check = mysqli_query($Conf, $sqlQue);
    $users = mysqli_fetch_all($check);*/

    $users = $Conf->query($sqlQue);



?>

<div>

<span style="color: red;"><?php if(!$users){echo "خطا در برقراری ارتباط با سرور !";} ?></span>

<table class="table table-striped m-0">
    <thead>
        <tr>
            <th> ردیف </th>
            <th> نام کاربر </th>
            <th> ایمیل </th>
            <th> شماره تلفن </th>
            <th> سطح کاربر </th>
            <th> عملیات </th>
        </tr>
    </thead>
    <tbody>

        <?php if($users){ ?>

        <?php while($row = $users->fetch_object()){ ?>

            <tr>

                <th scope="row"><?php echo $num_row++; ?></th>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->phone; ?></td>
                <td><span class="label label-info">
                <?php  

                if($row->role == 0){
                    echo "کاربر عادی";
                } elseif($row->role == 1){
                    echo "کاربر ادمین";
                }

                ?></span></td>

                <td> <?php if($row->role == 0){ ?> <a class="btn btn-primary" href="edituser.php?id=<?php echo $row->id; ?>">ویرایش کاربر</a> <a href="deleteuser.php?id=<?php echo $row->id; ?>" class="btn btn-danger" >حذف کاربر</a> <?php } else { ?> <a class="btn btn-primary disabled" href="">ویرایش کاربر</a> <a href="" class="btn btn-success disabled" >حذف کاربر</a> <?php } ?></td>
                

            </tr>

        <?php } ?>
        
        <?php } ?>
        
    </tbody>
</table>



<?php include "footer.php"; ?>