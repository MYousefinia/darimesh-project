<?php 

include "../PHPMailer/class.phpmailer.php";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $mail=new PHPMailer(true);
        $mail->IsSMTP();



        try
        {
        	$mail->Host='smtp.outlook.com';
        	$mail->SMTPAuth=true;
        	$mail->SMTPSecure="ssl";
        	$mail->Port=465;
        	$mail->Username="Darimesh@outlook.com";
        	$mail->Password="3371747631a";
        	$mail->AddAddress($email);
        	$mail->SetFrom("Darimesh@outlook.com");
        	$mail->Subject= "فعالسازی حساب کاربری شما :";
        	$mail->CharSet="UTF-8";
            $mail->ContentType="text/htm";
            
            $mail->MsgHTML("<div style='text-align:center;direction:rtl;font-family:iransans;'><h1 style='font-size: 45px;'>کاربر محترم ، به داریمش خوش آمدید</h1> <br> <h2 style='font-size: 35px;'>کد فعالسازی حساب کاربری شما :</h2> <br> <h1 style='font-size: 40px;color:red;'>33717</h1></div>");
            $mail->Send();
        }
        catch(phpmailerException $e)
        {
        	echo $e->errorMessage();
        }
}


?>

<form action="" method="post">

    <input type="email" name="email">
    <input type="submit" value="submit" name="submit">

</form>