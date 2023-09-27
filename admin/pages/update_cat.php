<?php
$id=$_GET['id'];
$delete_pro="UPDATE tbl_category set status_cat = 1 WHERE cat_id=$id";
mysqli_query($con,$delete_pro);
require("list_cat.php");
?>
