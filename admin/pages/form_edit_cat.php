<?php
$id=$_GET['id'];
$sql="SELECT * FROM tbl_category WHERE cat_id='$id'";
$rs=mysqli_query($con,$sql);
$r=mysqli_fetch_array($rs);
?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
                </div>
                <p class="success" style="color:lawngreen"><?php if (isset($success1)) echo $success1 ?></p>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="?page=edit_cat&id=<?=$id?>"method="POST">
                        <label for="cat_name">Tên danh mục</label>
                        <input type="text" name="cat_name" id="cat_name" value="<?=$r['cat_name']?>">
                        <button type="submit" name="btn-submit" id="btn-submit"> Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>