<?php 
// nếu đã đăng nhập

if (isset($_SESSION['user_id'])) {

    // Neeus chuaw ton tai bien num tren url
    if (!isset($_GET['num'])) {
        if (mysqli_num_rows($result = mysqli_query($con, "SELECT * from tbl_cart where pro_id = {$_GET['pro_id']}
            and user_id = {$_SESSION['user_id']}")) > 0) {

            $pro = mysqli_fetch_assoc($result);
            
            mysqli_query($con, "UPDATE tbl_cart SET quantity = {$pro['quantity']} + 1 WHERE pro_id = {$_GET['pro_id']}");

            if (isset($_GET['num']) && isset($_GET['pro_id'])) {
                redirect("?mod=cart&num={$_GET['num']}&pro_id={$_GET['pro_id']}");
            }
            else redirect("?mod=cart");
        } 
        else { // Nếu chưa có sản phẩm
            $user_id = $_SESSION['user_id'];
            $pro_id = $_GET['pro_id'];
            $rs = mysqli_query($con, "INSERT INTO tbl_cart VALUES($user_id, $pro_id, 1)");
            
            if(!$rs){
                echo  "Thêm sản phẩm vào giỏ hàng thất bại.";
            }
            else 
            {
                if (isset($_GET['num']) && isset($_GET['pro_id'])) {
                    redirect("?mod=cart&num={$_GET['num']}&pro_id={$_GET['pro_id']}");
                }
                else redirect("?mod=cart");
            }

        }
    }
    else {
        $user_id = $_SESSION['user_id'];
        $pro_id = $_GET['pro_id'];
        $rs = mysqli_query($con, "INSERT INTO tbl_cart VALUES($user_id, $pro_id, {$_GET['num']})");
        redirect("?mod=cart");
    }
}

// Chưa đăng nhập chuyển sang trang login
else redirect("?mod=account", "login");
