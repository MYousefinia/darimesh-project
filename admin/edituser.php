<?php

include "header2.php";

include "../database/connect.php";
global $connection;

$id = $_GET['id'];

if(isset($_POST['editUser'])){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $set = $connection->prepare("UPDATE users SET name=?, email=?, role=? WHERE id=?");
    $set->bindValue(1, $name);
    $set->bindValue(2, $email);
    $set->bindValue(3, $role);
    $set->bindValue(4, $id);
    $set->execute();

    echo "<script> location.replace('http://localhost/darimesh2/admin/users.php'); </script>";

}

// ---------------------------------

$result = $connection->prepare("SELECT * FROM users WHERE id=?");
$result->bindValue(1, $_GET['id']);
$result->execute();

$user = $result->fetchObject();

?>

<div>

<?php if(!$connection) { ?>

    <h4 style="color: red;">خطا در برقراری ارتباط با سرور !</h4>

<?php } ?> 

<h2>ویرایش کاربر  <span class="badge bg-secondary">جدید</span></h2><br>

<form method="POST" action="" style="max-width: 500px;">

        <input type="text" name="name" class="form-control" value="<?= $user->name; ?>"><br>
        <input type="email" name="email" class="form-control" value="<?= $user->email; ?>"><br>
        <select name="role" class="form-control">

            <option value="0" <?php if( $user->role == 0 ) { ?> selected <?php } ?> >کاربر عادی</option>
            <option value="1" <?php if( $user->role == 1 ) { ?> selected <?php } ?> >کاربر ادمین</option>

        </select><br>

        <input type="submit" value="ویرایش کاربر" name="editUser" class="btn btn-primary" />
        
</form><br>

</div>

<?php include "footer.php"; ?>