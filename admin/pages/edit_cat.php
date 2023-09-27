<?php
    $id=$_GET['id'];
    $cat_name=$_POST['cat_name'];
    $sql_update="UPDATE tbl_category SET cat_name='$cat_name' WHERE cat_id='$id'";
    mysqli_query($con,$sql_update);
    echo "<script>alert('Bạn đã sửa thành công!')</script>";
    require("list_cat.php");
?>
