<?php 
if (isset($_POST['btn-submit'])) {
    $email = $_POST['email'];
    $sdt = $_POST['phone_num'];
    $address = $_POST['address'];
    if (update_info_user($email, $sdt, $address)) {
        echo "<script>alert('Cập nhật thành công!!');</script>";
    }
    else {
        echo "<script>alert('Cập nhật không thành công!!');</script>";
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
             <h2 class="form-title">Thông tin tài khoản</h2>
             <form method="POST" action="">
                 <div class="input-form">
                     <span class="label">Tên đăng nhập</span>
                     <input disabled class="input-text" type="text" name="username" value="<?php echo isset($user['username'])?$user['username']:"" ?>">
                 </div>
             	<div class="input-form">
                     <span class="label">Họ tên</span>
                     <input disabled class="input-text" type="text" name="fullname" value="<?php echo isset($user['fullname'])?$user['fullname']:"" ?>">
                 </div>
                <div class="input-form">
                     <span class="label">Giới tính</span>
                     <input disabled class="input-text" type="text" name="gender" value="<?php echo isset($user['gender'])?$user['gender']:"" ?>">
                 </div>
                 <div class="input-form">
                     <span class="label">Email</span>
                     <input class="input-text" type="text" name="email" value="<?php echo isset($user['email'])?$user['email']:"" ?>">
                 </div>
                 <div class="input-form">
                     <span class="label">Số điện thoại</span>
                     <input class="input-text" type="text" name="phone_num" value="<?php echo isset($user['phone_num'])?$user['phone_num']:"" ?>">
                 </div>
                 <div class="input-form">
                     <span class="label">Địa chỉ</span>
                     <input class="input-text" type="text" name="address" value="<?php echo isset($user['address'])?$user['address']:"" ?>">
                 </div>
                <button type="submit" class="" name="btn-submit" style="margin-left: 605px;">Cập nhật thông tin</button>
            </form>
            <p><a href="?mod=account&act=changePassword">Đổi mật khẩu</a></p>
         </div>
     </div>
     <!--Kết Thúc Phần Nội Dung-->
 </section>
 <?php get_component('footer'); ?>
