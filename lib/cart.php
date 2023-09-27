<?php 

function get_list_product_in_cart($user_id) {
    global $con;
    $sql = "
        SELECT user_id,tbl_cart.pro_id, pro_image, pro_name, original_price, promotional_price, tbl_cart.quantity 
        FROM tbl_cart INNER JOIN tbl_product ON tbl_cart.pro_id = tbl_product.pro_id AND user_id = {$user_id}
    ";
    $result = mysqli_query($con, $sql);
    $list_pro = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($list_pro, $row);
        }
    }
    return $list_pro;
}

// Tính tổng tiền
function get_total_cart() {
    $total = 0;
    $list_product = get_list_product_in_cart($_SESSION['user_id']);
    foreach($list_product as $item){
        isset($item['promotional_price'])? $price = $item['promotional_price'] : $price = $item['original_price'];
        $total += $price * $item['quantity'];
    }
    return $total;
}

// Đếm số lượng sản phẩm
function get_num_pro_in_cart(){
    global $con;
    $sql = "SELECT quantity FROM tbl_cart WHERE user_id = {$_SESSION['user_id']}";
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result);
}

function getMaDH(){
    global $con;
    $sql = "SELECT max(order_id) order_id FROM tbl_order WHERE user_id = {$_SESSION['user_id']}";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            return $row['order_id'];
        }
    }
    return false;
}


function getPrice($item){
    return $item['promotional_price']>0 ? $item['promotional_price']: $item['original_price']; 
}

function update_num_order($sl, $ma){
    global $con;
    $sql = "UPDATE tbl_cart SET quantity = $sl where pro_id = $ma AND user_id = {$_SESSION['user_id']}";
    mysqli_query($con, $sql);
}
?>