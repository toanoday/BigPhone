
<?php
$id=$_GET['id'];
$sql="SELECT * FROM tbl_product WHERE pro_id=$id";
$rs=mysqli_query($con,$sql);
$r=mysqli_fetch_array($rs);
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa sản phẩm</h3>
                    <p class="success" style="color:lawngreen"><?php if (isset($success1)) echo $success1 ?></p>
                </div>
               
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                <form action="?page=edit_pro&id=<?=$id?>" method="post" enctype="multipart/form-data">
                <table>
                <tr>
                    <td> <label for="product_id">Mã sản phẩm</label></td>
                    <td><input type="text" name="product_id" id="product_id" value="<?=$id?>" readonly="False"></td>
                </tr>
                <tr>
                    <td><label for="product_name">Tên sản phẩm</label></td>
                    <td><input type="text" name="product_name" id="product_name" value="<?=$r['pro_name']?>"></td>
                </tr>
                <tr>
                    <td><label for="original_price">Giá gốc</label></td>
                    <td><input type="text" name="original_price" id="original_price" value="<?=$r['original_price']?>"></td>
                </tr>
                <tr>
                    <td><label for="promotional_price">Giá khuyến mại</label></td>
                    <td><input type="text" name="promotional_price" id="promotional_price" value="<?=$r['promotional_price']?>"></td>
                </tr>
                <tr>
                    <td><label for="quantity">Số lượng</label></td>
                    <td><input type="text" name="quantity" id="quantity" value="<?=$r['quantity']?>"></td>
                </tr>
                <tr>
                    <td><label for="short">Mô tả ngắn</label></td>
                    <td><textarea name="short" id="short" ><?=$r['short_desc']?></textarea></td>
                </tr>
                <tr>
                    <td><label for="detail_desc">Mô tả chi tiết</label></td>
                    <td><textarea name="detail_desc" id="detail_desc" class="ckeditor"><?=$r['detail_desc']?></textarea></td> 
                </tr>
                <tr>
                    <td><label>Hình ảnh</label></td>
                    <td class="img_hienthi_sp"><img src="../<?=$r['pro_image']?>" width="80" height="120"/><br />
                    <input type="file" name="file" id="file"></td>
                </tr>
                <tr>
                    <td><button type="submit"name="btn_submit" id="btn-submit">Update</button></td>
                    <td><input type="reset" name="" value="Hủy" /></td>
                </tr>
                </table>
            </form>
            </div>
        </div>
        </div>
</div>
</div>