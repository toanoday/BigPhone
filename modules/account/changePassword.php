<?php 
$errorOld = $errorNew = $passwordErr = "";
$user = get_info_user_ordered();
$name = $user['username'];
$pass = $user['pass'];
if(isset($_POST['btn-submit']))
{
    $oldpass = md5($_POST['oldpass']);
    $newpass = md5($_POST['newpass']);
    $cknewpass = $_POST['newpass'];
    $repass = md5($_POST['confirmpass']);
    if($pass != $oldpass)
    {
        $errorOld = "Mật khẩu không đúng";
    }
    if (empty($_POST["newpass"])) {
        $passwordErr = "Bạn phải nhập mật khẩu mới!!";
        } else {
        if (strlen($cknewpass) < 6) {
        $passwordErr = "Độ dài mật khẩu phải lớn hơn 6";
        }
    }
    if($newpass != $repass)
    {
        $errorNew = "Mật khẩu không khớp!!";
    }

    if(empty($errorNew) && empty($errorOld) && empty($passwordErr))
    {
        $sql = "UPDATE tbl_user SET pass = '{$newpass}' where username = '{$name}'";
        $result = mysqli_query($con, $sql);
        echo "Successfully";
        echo "<script>alert('Đổi mật khẩu thành công!')</script>";
        redirect();
    }
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form {
            width: 50%;
            margin: auto;
            padding: 80px 0;
        }
        span.label {
            font-size: 16px;
            width: 200px;
            display: inline-block;
        }
        .input-form {
            width: 100%;
            margin: 15px 0;
        }
        .input-text {
            width: 70%;
            display: inline-block;
        }
        .form-title {
            font-size:24px;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 60px;
        }
        .noi-dung {
            background-color: #F7F7F7;
            
            padding: 80px auto 40px;
        }
    </style>
</head>
</html>
<?php get_component('header'); ?>
<?php $user = get_info_user_ordered();?>
<section>
     <!--Bắt Đầu Phần Nội Dung-->
     <div class="noi-dung">
         <div class="form">
             <h2 class="form-title">Đổi mật khẩu</h2>
             <form method="POST" action="">
                 <div class="input-form">
                     <span class="label">Tên đăng nhập</span>
                     <input class="input-text" type="text" name="username" value="<?= isset($user['username'])?$user['username']:"" ?>">
                 </div>
             	<div class="input-form">
                     <span class="label">Mật khẩu cũ</span>
                     <input class="input-text" type="password" name="oldpass" value="">
                     <span class="error"> <?php echo $errorOld;?></span><br><br>
                 </div>
                <div class="input-form">
                     <span class="label">Mật khẩu mới</span>
                     <input class="input-text" type="password" name="newpass" value="" ?>
                     <span class="error"> <?php echo $passwordErr;?></span><br><br>
                 </div>
                 <div class="input-form">
                     <span class="label">Xác nhận mật khẩu</span>
                     <input class="input-text" type="password" name="confirmpass" value="" ?>
                     <span class="error"> <?php echo $errorNew;?></span><br><br>
                 </div>
                <button type="submit" class="" name="btn-submit" style="margin-left: 605px;">Cập nhật mật khẩu</button>
            </form>
         </div>
     </div>
     <!--Kết Thúc Phần Nội Dung-->
 </section>
 <?php get_component('footer'); ?>


