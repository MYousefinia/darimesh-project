<?php 

    include "header.php"; 
    header('Content-Type: text/html; charset=utf-8');


    if(isset($_POST['addMenu'])){
        $title = $_POST['title'];
        $sub = $_POST['sub'];
        $prior = $_POST['sort'];

        $error = null;
        $success = null;

        global $Conf;

        if(!empty($title) && !empty($sub) && !empty($prior)){

            $sqlQue = "INSERT INTO menus SET title='$title', sub='$sub', sort='$prior'";
            mysqli_query($Conf, $sqlQue);
            $success = 'منوی شما افزوده شد ';

        }else {
            $error = "لطفا همه فیلد ها را پر کنید";
        }
    }

    $sqlQue2 = "SELECT id,title FROM menus";
    $result = $Conf->query($sqlQue2);
    
    

?>

<div>

<h2>ساخت منو</h2><br>

    <form method="POST" action="" style="max-width: 500px;">
        <input type="text" name="title" placeholder="عنوان منو" class="form-control" /><br>
        <select class="form-control" name="sub" >

            <option value="0">بدون سرگروه ...</option>    
            <option value="1">اولین سرگروه</option>

            <?php if($result){ ?>

                <?php  while($object = $result->fetch_object()){ ?>

                    <option value="<?php echo $object->id; ?>"><?php echo $object->title; ?></option>

                <?php } ?>    

            <?php } ?>    

        </select><br>  

        <input type="number" class="form-control" placeholder="اولویت بندی منو" name="sort"><br>
        <input type="submit" value="افزودن منو" name="addMenu" class="btn btn-primary" />
        
    </form><br><br>
        

    <span style="color: red;font-size:15px;"><?php echo $error; ?></span>
    <span style="color: green;font-size:15px;"><?php echo $success; ?></span>

</div>



<?php include "footer.php"; ?>