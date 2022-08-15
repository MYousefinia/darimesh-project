<?php

include "header2.php";

if(isset($_POST['editMenu'])){
    $title = $_POST['title'];
    $sub = $_POST['sub'];
    $prior = $_POST['sort'];

    $error = null;
    $success = null;

    global $connection;

    if(!empty($title) && !empty($sub) && !empty($prior)){

        /*$sqlQue = "UPDATE menus SET title='$title', sub='$sub', sort='$prior WHERE ";
        mysqli_query($Conf, $sqlQue);*/
        //$success = 'منوی شما افزوده شد ';

        $setmenu = $connection->prepare("UPDATE menus SET title=? ,sub=? ,sort=? WHERE id=?");
        $setmenu->bindValue(1, $title);
        $setmenu->bindValue(2, $sub);
        $setmenu->bindValue(3, $prior);
        $setmenu->bindValue(4, $_GET['id']);
        $setmenu->execute();

        echo "<script>window.location='menu-tab.php'</script>";

    }else {
        $error = "لطفا همه فیلد ها را پر کنید";
    }
}

$sqlQue2 = "SELECT id,title FROM menus";
$result = $Conf->query($sqlQue2);

?>

<form method="POST" action="" style="max-width: 500px;">

        <input type="text" name="title" placeholder="عنوان منو" class="form-control" /><br>
        <select class="form-control" name="sub" >

            <option value="0">بدون سرگروه ...</option>    

            <?php if($result){ ?>

                <?php  while($object = $result->fetch_object()){ ?>

                    <option value="<?php echo $object->id; ?>"><?php echo $object->title; ?></option>

                <?php } ?>    

            <?php } ?>    

        </select><br>  

        <input type="number" class="form-control" placeholder="اولویت بندی منو" name="sort"><br>
        <input type="submit" value="ویرایش منو" name="editMenu" class="btn btn-primary" />
        
</form><br><br>

<?php include "footer.php"; ?>