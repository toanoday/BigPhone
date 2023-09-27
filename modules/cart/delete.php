<?php
if(isset($_GET['pro_id'])){
    $sql = "DELETE FROM tbl_cart WHERE pro_id = {$_GET['pro_id']}";
}
else $sql = "DELETE FROM tbl_cart WHERE user_id = {$_GET['user_id']}";
if (mysqli_query($con, $sql)) {
    redirect("?mod=cart");
}