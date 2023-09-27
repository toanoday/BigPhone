<?php
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $sql = "update tbl_order set status = 'Đã hủy' where order_id= $order_id";
    if (mysqli_query($con, $sql)) {
        redirect("?mod=cart&order_id=$order_id", "order_detail");
    }
}
?>
