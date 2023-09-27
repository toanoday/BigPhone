<?php 
    $num = $_POST['num_order'];
    $pro_id = $_POST['id'];
    echo "<a href='?mod=cart&act=add&pro_id={$_POST['id']}&num=$num&pro_id=$pro_id' title='Thêm giỏ hàng' class='add-cart'>Thêm giỏ hàng</a>";
?>