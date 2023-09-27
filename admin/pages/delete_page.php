<?php
$id=$_GET['id'];
$sql="DELETE FROM tbl_page WHERE page_id='$id'";
mysqli_query($con,$sql);
require("list_page.php");
?>