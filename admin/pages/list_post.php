<!--fix-->
<?php
global $con;
$sql = "SELECT * FROM tbl_post";
$rs = mysqli_query($con, $sql);
$list = array();
while ($r = mysqli_fetch_array($rs)) {
    $list[] = $r;
}
$count = count($list);
?>

<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách bài viết</h3>
                    <a href="?page=form_add_post" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?=$count?>)</span></a> |</li>
                            <!--Thêm các trạng thái khác nếu cần-->
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Chỉnh sửa</option>
                                <option value="2">Bỏ vào thùng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <tr>
                                <th><input type="checkbox" name="checkAll" id="checkAll"></th>
                                <th><span class="thead-text">STT</span></th>
                                <th><span class="thead-text">Tiêu đề</span></th>
                                <th><span class="thead-text">Hình ảnh</span></th>
                                <th><span class="thead-text">Nội dung</span></th>
                                <th><span class="thead-text">Người tạo</span></th>
                                <th><span class="thead-text">Tùy chọn</span></th>
                            </tr>
                            <?php
                            global $con;
                            $sql = "SELECT * FROM tbl_post";
                            $rs = mysqli_query($con, $sql);
                            $count = 0;
                            while ($r = mysqli_fetch_assoc($rs)) {
                                $count++;
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><?= $count ?></td>
                                    <td><?= $r['post_title'] ?></td>
                                    <td><img src="../<?= $r['post_image'] ?>" width="300px" height="300px"></td>
                                    <td><?= nl2br(substr($r['post_content'], 0, 200)) ?><?= strlen($r['post_content']) > 200 ? '...' : '' ?></td>
                                    <td><?= $r['post_author'] ?></td>
                                    <td class="clearfix">
                                        <a href="?page=form_edit_post&id=<?= $r['post_id'] ?>" title="Sửa" class="edit" style="margin: 10px"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="?page=delete_post&id=<?= $r['post_id'] ?>" title="Xóa" class="delete" style="margin: 10px" onclick="return confirm('Bạn chắc chắn muốn xóa tiếp không?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>

                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <ul id="list-paging" class="fl-right">
                        <!--Thêm phân trang nếu cần-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
