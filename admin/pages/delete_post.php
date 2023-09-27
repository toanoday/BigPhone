<?php
$id=$_GET['id'];
$sql="DELETE FROM tbl_post WHERE post_id='$id'";
mysqli_query($con,$sql);
require("list_post.php");
?>
