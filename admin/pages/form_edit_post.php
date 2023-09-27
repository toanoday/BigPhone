<!--fix-->
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_post WHERE post_id='$id'";
$rs = mysqli_query($con, $sql);
$r = mysqli_fetch_array($rs);
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa bài viết</h3>
                    <p class="success" style="color: lawngreen"><?php if (isset($success1)) echo $success1 ?></p>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="?page=edit_post&id=<?=$id?>" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><label for="post_id">Mã bài viết:</label></td>
                                <td><input type="text" name="post_id" id="post_id" value="<?=$id?>" readonly="false"></td>
                            </tr>
                            <tr>
                                <td><label for="post_author">Tác giả:</label></td>
                                <td><input type="text" name="post_author" id="post_author" value="<?=$r['post_author']?>"></td>
                            </tr>
                            <tr>
                                <td><label for="post_title">Tiêu đề:</label></td>
                                <td><input type="text" name="post_title" id="post_title" value="<?=$r['post_title']?>"></td>
                            </tr>
                            <tr>
                                <td><label for="post_date">Ngày đăng:</label></td>
                                <td><input type="text" name="post_date" id="post_date" value="<?=$r['post_date']?>"></td>
                            </tr>
                            <tr>
                                <td><label for="post_image">Hình ảnh:</label></td>
                                <td class="img_hienthi_sp">
                                    <img src="../<?=$r['post_image']?>" width="80" height="120" />
                                    <input type="file" name="file" id="file">
                                </td>
                            </tr>
                            <tr>
                                <td><label for="post_content">Nội dung chi tiết:</label></td>
                                <td><textarea name="post_content" id="post_content" class="ckeditor"><?=$r['post_content']?></textarea></td>
                            </tr>
                            <tr>
                                <td><label for="post_slug">Slug (Friendly URL):</label></td>
                                <td><input type="text" name="post_slug" id="post_slug" value="<?=$r['post_slug']?>"></td>
                            </tr>
                            <tr>
                                <td><button type="submit" name="btn_submit" id="btn-submit">Cập nhật</button></td>
                                <td><input type="reset" name="" value="Hủy" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
