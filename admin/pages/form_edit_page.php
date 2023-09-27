
<?php
$id=$_GET['id'];
$sql="SELECT * FROM tbl_page WHERE page_id='$id'";
$rs=mysqli_query($con,$sql);
$r=mysqli_fetch_array($rs);
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa trang</h3>
                    <p class="success" style="color:lawngreen"><?php if (isset($success1)) echo $success1 ?></p>
                </div>
               
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                <form action="?page=edit_page&id=<?=$id?>"method="post" enctype="multipart/form-data">
                <table>
                <tr>
                    <td> <label for="page_id">Mã trang:</label></td>
                    <td><input type="text" name="page_id" id="page_id" value="<?=$id?>" readonly="False"></td>
                </tr>
                <tr>
                    <td><label for="page_name">Tiêu đề:</label></td>
                    <td><input type="text" name="page_name" id="page_name" value="<?=$r['page_name']?>"></td>
                </tr>
                <tr>
                <td><label for="page-slug">Slug ( Friendly_url )</label></td>
                <td><input type="text" name="page_slug" id="page_slug" value="<?=$r['page_slug']?>"></td>
                </tr>
                <tr>
                    <td><label for="page_desc">Mô tả chi tiết</label></td>
                    <td><textarea name="page_desc" id="page_desc" class="ckeditor"><?=$r['page_desc']?></textarea></td> 
                </tr>
                <tr>
                    <td><label>Hình ảnh</label></td>
                    <td class="img_hienthi_sp"><img src="../<?=$r['page_image']?>" width="80" height="120"/>
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