<?php 
if (isset($_POST['btn_login'])) {
    $error = array();

    # Kiểm tra username
    if (empty($_POST['username'])) {
        $error['username'] = "Không được để trống username!";
    } else {
        $parttern = '/^[A-Za-z0-9_\.]{6,32}$/';
        if (!preg_match($parttern, $_POST['username'])) {
            $error['username'] = "Username không đúng định dạng!!";
        }
        else {
            $user = $_POST['username'];
        }
    }

    # Kiểm tra password
    if (empty($_POST['password'])) {
        $error['password'] = "Không được để trống password!";
    } else {
        $parttern = '/^[A-Za-z0-9_\.!@#$%^&*()]{8,30}$/';
        if (!preg_match($parttern, $_POST['password'])) {
            $error['password'] = "Password không đúng định dạng!!";
        }
        else {
            # Mã hóa mật khẩu
            $pass = md5($_POST['password']);
        }
    }

    # Kết luận
    # Nếu mảng error mà empty
    if (empty($error)) {

        #* Kiểm tra xem username và password đã tồn tại trong database hay chưa
        $sql = "select * from tbl_user where username = '{$user}'";
       
        if (mysqli_num_rows(mysqli_query($con, $sql)) <= 0) 
        {
            $error['username'] = "Tên đăng nhập không tồn tại";
        }
        else
        {
            $sql = "select * from tbl_user where username = '{$user}' and pass = '{$pass}'";
            $result = mysqli_query($con, $sql);
        
            if (mysqli_num_rows($result) == 1) {
                $user = mysqli_fetch_assoc($result); 
            }
            else
            {
                $error['account'] = "Mật khẩu không chính xác";
            }
        }
        
        

        # nếu mảng error rông
        if (empty($error)) {
            if (!empty($user)) {
                if(!empty($_POST["rememPass"]))
                {
                    setcookie("m_username", $_POST["username"], time() + (3600));
                    setcookie("m_password", $_POST["password"], time() + (3600));
                }
                else 
                {
                    if(isset($_COOKIE["m_username"]))
                    {
                        setcookie ("m_username", "");
                    }
                    if(isset($_COOKIE["m_password"]))
                    {
                        setcookie ("m_password", "");
                    }
                }
                $_SESSION['is_login'] = true;
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['is_fullname'] = $user['fullname'];
                $_SESSION['rule_user'] = $user['rule_user'];
                redirect();
            }   
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Đăng nhập</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Đăng nhập</span>

                <form action="" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Username" name="username">
                        <?php if (isset($error)) display_error($error, 'username') ?>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Password" name="password">
                        <?php if (isset($error))  display_error($error, 'password') ?>
                        <?php if (isset($error))  display_error($error, 'account') ?>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" name="rememPass" class="text">Nhớ mật khẩu</label>
                        </div>
                        
                        <a href="?mod=account&forgotPass.php" class="text">Quên mật khẩu?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="btn_login" value="Đăng nhập">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Bạn chưa có tài khoản?
                        <a href="?mod=account&act=register" class="text signup-link">Đăng ký</a>
                    </span>
                </div>
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
          max-width: 430px;
          width: 100%;
          background: #fff;
          border-radius: 10px;
          box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
          overflow: hidden;
          margin: 0 20px;
      }

      .container .forms{
          display: flex;
          align-items: center;
          height: 440px;
          width: 200%;
          transition: height 0.2s ease;
      }


      .container .form{
          width: 50%;
          padding: 30px;
          background-color: #fff;
          transition: margin-left 0.18s ease;
      }

      .container.active .login{
          margin-left: -50%;
          opacity: 0;
          transition: margin-left 0.18s ease, opacity 0.15s ease;
      }

      .container .signup{
          opacity: 0;
          transition: opacity 0.09s ease;
      }
      .container.active .signup{
          opacity: 1;
          transition: opacity 0.2s ease;
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
          height: 50px;
          width: 100%;
          margin-top: 30px;
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
          margin-top: 30px;
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
          margin-top: 30px;
          text-align: center;
      }
          </style>
</body>
</html>
