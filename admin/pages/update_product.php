<?php
$id=$_GET['id'];
$sql="UPDATE tbl_product set status_pro = 1 WHERE pro_id='$id'";
mysqli_query($con,$sql);
require("list_product.php");
?>