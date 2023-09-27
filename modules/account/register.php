<?php 
if (isset($_POST['btn_register'])) {

    #* Mảng lưu lỗi
    $error = array();
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $re_password = md5($_POST['re_password']);
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone_num'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $ckpassword = $_POST['password'];
    $address = $_POST['address'];

    if ($password != $re_password) {
        $error["password"] = "Password nhập lại không khớp!!";
        $password = md5($password);
    }

    if (empty($_POST["username"])) {
        $error["username"] = "Username không được để trống";
    } 
    else {
        // check if name only contains letters and whitespace
        $parttern = '/^[A-Za-z0-9_\.]{6,32}$/';
        if (!preg_match($parttern,$username)) {
            $error["username"] = "Username phải có 6 - 32 ký tự, chứa a-z, A-Z, 0-9!!";
        }
    }

    if (empty($_POST["email"])) {
        $error["email"] = "Email không được để trống";
    } 
    else {
        // check if e-mail address is well-formed
        if (!preg_match("/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/",$email)) {
            $error["email"] = "Email không hợp lệ!!";
        }
    }

    if (empty($_POST["phone_num"])) {
        $error['phonenum'] = "Số điện thoại không được để trống";
    } 
    else 
    {
        // check if phone only number
        if (!preg_match("/^[0-9 ]*$/",$phone)) {
            $error['phonenum'] = "Số điện thoại phải là các số!!";
        }
    }

    if (empty($_POST["password"])) {
        $error['password'] = "Mật khẩu không được bỏ trống!!";
    } 
    else {
        $parttern = '/^[A-Za-z0-9_\.!@#$%^&*()]{8,30}$/';
        if (!preg_match($parttern, $_POST['password'])) {
            $error['password'] = "Mật khẩu không đúng định dạng!!";
        }
    }

    if (empty($_POST["fullname"])) {
        $error['fullname'] = "Họ và tên không được để trống!!";
    }

    if (empty($_POST["gender"])) {
        $error['gender'] = "Giới tính không được bỏ trống";
    }

    if (empty($_POST["address"])) {
        $error['address'] = "Địa chỉ không được bỏ trống!!";
    }

    if (empty($error)) {
        $value = "'{$username}', '{$password}', '{$fullname}', '{$email}', '{$gender}' , '{$phone}', '{$address}'" ;
        $sql = "INSERT INTO tbl_user(username, pass, fullname, email, gender, phone_num, address) values ($value)";
        
        //* Nếu đăng ký thành công sẽ chuyển tới trang đăng nhập
        if(mysqli_query($con,$sql)){
            header("Location: ?mod=account&act=login");
        } 
    }

}
?>



<!DOCTYPE html>
<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
         
    <title>Đăng ký</title>
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <!-- Registration Form -->
            <div class="form signup">
                <span class="title">Đăng ký</span>

                <form action="" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Tên đăng ký"  name="username">
                        <?php if (isset($error)) display_error($error, 'username') ?>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Họ và tên"  name="fullname">
                        <?php if (isset($error)) display_error($error, 'fullname') ?>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Giới tính"  name="gender">
                        <?php if (isset($error)) display_error($error, 'gender') ?>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Số điện thoại"  name="phone_num">
                        <?php if (isset($error)) display_error($error, 'phonenum') ?>
                        <i class="uil uil-phone"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Địa chỉ"  name="address">
                        <?php if (isset($error)) display_error($error, 'address') ?>
                        <i class="uil uil-home"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Email"  name="email">
                        <?php if (isset($error)) display_error($error, 'email') ?>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Tạo mật khẩu"  name="password">
                        <?php if (isset($error)) display_error($error, 'password') ?>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Xác nhận mật khẩu"  name="re_password">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="input-field button">
                        <input name="btn_register" type="submit" value="Đăng ký">
                    </div>
                    <div class="input-question">
                        <span class="text">Bạn đã có tài khoản?</span><a class="text" href="?mod=account&act=login">Đăng nhập</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
      const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

      //   js code to show/hide password and change icon
      pwShowHide.forEach(eyeIcon =>{
          eyeIcon.addEventListener("click", ()=>{
              pwFields.forEach(pwField =>{
                  if(pwField.type ==="password"){
                      pwField.type = "text";

                      pwShowHide.forEach(icon =>{
                          icon.classList.replace("uil-eye-slash", "uil-eye");
                      })
                  }else{
                      pwField.type = "password";

                      pwShowHide.forEach(icon =>{
                          icon.classList.replace("uil-eye", "uil-eye-slash");
                      })
                  }
              }) 
          })
      })

      // js code to appear signup and login form
      signUp.addEventListener("click", ( )=>{
          container.classList.add("active");
      });
      login.addEventListener("click", ( )=>{
          container.classList.remove("active");
      });

    </script>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .error {
        position: absolute;
        top: 111%;
        font-size: 12px;
        font-weight:500;
        font-style: italic;
        color: red;
        }

        body{
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #4070f4;
        }

        .container{
            position: relative;
            width: 600px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 0 20px;
        }

        .container .forms{
            display: flex;
            align-items: center;
            
            width: 200%;
            transition: height 0.2s ease;
        }


        .container .form{
            width: 50%;
            padding: 30px;
            background-color: #fff;
            transition: margin-left 0.18s ease;
        }

        .container .signup{
            opacity: 1;
            transition: opacity 0.09s ease;
            height:100%;
        }
        .container.active .signup{
            opacity: 1;
            transition: opacity 0.2s ease;
            width: 100%;
        }

        .container.active .forms{
            height: 600px;
        }
        .container .form .title{
            position: relative;
            font-size: 27px;
            font-weight: 600;
        }

        .form .title::before{
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            background-color: #4070f4;
            border-radius: 25px;
        }

        .form .input-field{
            position: relative;
            height: 40px;
            width: 100%;
            margin-top: 20px;
        }

        .input-field input{
            position: absolute;
            height: 100%;
            width: 100%;
            padding: 0 35px;
            border: none;
            outline: none;
            font-size: 16px;
            border-bottom: 2px solid #ccc;
            border-top: 2px solid transparent;
            transition: all 0.2s ease;
        }

        .input-field input:is(:focus, :valid){
            border-bottom-color: #4070f4;
        }

        .input-field i{
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 23px;
            transition: all 0.2s ease;
        }

        .input-field input:is(:focus, :valid) ~ i{
            color: #4070f4;
        }

        .input-field i.icon{
            left: 0;
        }
        .input-field i.showHidePw{
            right: 0;
            cursor: pointer;
            padding: 10px;
        }

        .form .checkbox-text{
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
        }

        .checkbox-text .checkbox-content{
            display: flex;
            align-items: center;
        }

        .checkbox-content input{
            margin: 0 8px -2px 4px;
        }

        .form .text{
            color: #333;
            font-size: 14px;
        }

        .form a.text{
            color: #4070f4;
            text-decoration: none;
        }
        .form a:hover{
            text-decoration: underline;
        }

        .form .button{
            margin-top: 30px;
        }

        .form .button input{
            border: none;
            color: #fff;
            font-size: 17px;
            font-weight: 500;
            letter-spacing: 1px;
            border-radius: 6px;
            background-color: #4070f4;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .button input:hover{
            background-color: #265df2;
        }

        .form .login-signup{
            margin-top: 20px;
            text-align: center;
        }
        .input-question {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</body>

</body>
</html>