<?php
isset($_POST['fullname']) ? $fullname = $_POST['fullname']: $fullname ="";
isset($_POST['email']) ? $email = $_POST['email']: $email ="";
isset($_POST['phone']) ? $phone = $_POST['phone']: $phone ="";
isset($_POST['address']) ? $address = $_POST['address']: $address ="";
isset($_POST['note']) ? $note = $_POST['note']: $note ="";

if ($_POST['payment-method'] == "payment-home") $pttt = "Thanh toán tại nhà";
else $pttt = "Thanh toán tại cửa hàng";

if ($_POST['htvc'] == 0) $htvc = "Giao hàng tiết kiệm";
else if ($_POST['note'] == 1) $htvc = "Giao hàng hỏa tốc";
else  $htvc = "Giao hàng nhanh";


$total = get_total_cart(); 

$ngaylap = date("Y/m/d");

$sql = "INSERT INTO tbl_order(total_price, date, transport_fee,status, user_id, email, phone_num, address, note, httt, htvc)
         VALUES ($total, '$ngaylap',0, 'Chờ xử lý', {$_SESSION['user_id']}, '$email', '$phone', '$address', '$note', '$pttt', '$htvc')";

         
if(mysqli_query($con, $sql)){
    $success = true;
    $MaDH = getMaDH();
}

$list_product = get_list_product_in_cart($_SESSION['user_id']);


function addOrderDetail($MaDH, $MaSP, $sl){
    global $con;
    $sql = "INSERT INTO tbl_orderdetail VALUES($MaDH, $MaSP, {$sl})";
    mysqli_query($con, $sql);
}


foreach($list_product as $item){
    addOrderDetail($MaDH, $item['pro_id'], $item['quantity']);
    $success = true;
}

if($success){
    foreach ($list_product as $pro) {
        mysqli_query($con, "update tbl_product set quantity = quantity - 
                            {$pro['quantity']} WHERE pro_id = {$pro['pro_id']}");
    } 

    $sql = "DELETE FROM tbl_cart WHERE user_id = {$_SESSION['user_id']}";
    
    echo "<script>alert('Chúc mừng bạn đã đặt hàng thành công!!')</script>";
    if (mysqli_query($con, $sql)) {
        redirect("?mod=cart", "order_detail&order_id=$MaDH");
    }
}
