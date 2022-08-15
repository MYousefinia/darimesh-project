<?php 

include "header2.php";
include "../database/connect.php";

global $connection;

if(isset($_POST['submit'])){

	$error = null;
	$success = null;

	$title = $_POST['title'];
	$content = $_POST['content'];
	$slug = $_POST['slug'];
	$image = $_POST['image'];
	$tag = $_POST['tag'];
	$price = $_POST['price'];
	$exist = $_POST['exist'];
	$category = $_POST['category'];
	$check = $_GET['id'];

	if(!empty($title) || !empty($content) || !empty($slug) || !empty($image) || !empty($tag) || !empty($price) || !empty($exist) || !empty($category) ){

		$sqlQue = "UPDATE allProduct SET title=?, content=?, slug=?, image=?, tag=?, price=?, isExist=?, category=? WHERE id=? ";
		$setData = $connection->prepare($sqlQue);
		$setData->bindValue(1, $title);
		$setData->bindValue(2, $content);
		$setData->bindValue(3, $slug);
		$setData->bindValue(4, $image);
		$setData->bindValue(5, $tag);
		$setData->bindValue(6, $price);
		$setData->bindValue(7, $exist);
		$setData->bindValue(8, $category);
		$setData->bindValue(9, $check);
		$setData->execute();

		$success = "اطلاعات مورد نظر ثبت شد *";
		
		echo "<script>location.replace('http://localhost/darimesh2/admin/post-tab.php');</script>";

	} else {
		$error = "خطا * لطفا همه فیلد ها را پر کنید";
	}

}

?>

<div>

<?php if(!$connection) { ?>

    <h4 style="color: red;">خطا در برقراری ارتباط با سرور !</h4>

<?php } ?>

<h2>ویرایش پست </h2><br>

<form method="POST" action="" >

        <label for="title">عنوان : </label>
		<input id="title" type="text"  name="title" class="form-control"><br>
		
        <label for="content">توضیحات : </label>
        <textarea id="editor" name="content" placeholder="متن شما ...">
			
		</textarea> <br>
		
		<label for="slug">لینک کوتاه : </label>
		<input id="slug" type="text"  name="slug" class="form-control"><br>
		
		<label for="image">آدرس عکس : </label>
		<input id="image" type="text"  name="image" class="form-control"><br>
		
		<label for="tag">برچسب ها : </label>
		<input id="tag" type="text"  name="tag" class="form-control"><br>

		<label for="price">قیمت : </label>
		<input id="price" type="text"  name="price" class="form-control"><br>
		
		<label for="exist">موجودیت کالا : </label>
		<input id="exist" type="number" placeholder="0 به معنی ناموجود بودن و 1 به معنی موجود بودن کالا مبیاشد" name="exist" class="form-control"><br>

		<label for="category">دسته بندی کالا : </label>
		<input id="category" type="text" placeholder="laptop , mobile , audible , accessories (لپ تاپ ، موبایل ، لوازم شنیدنی و لوازم جانبی)" name="category" class="form-control"><br>

		<input type="submit" value="ارسال" name="submit" class="btn btn-primary" /><br><br>
		
		<?php if($success != null){ ?>

			<div class="alert alert-success"><?= $success; ?></div>

		<?php } elseif($error != null){ ?>
			
			<div class="alert alert-danger"><?= $error; ?></div>

		<?php } ?>	
        
</form><br>

<script src="../scripts/build/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

</div>