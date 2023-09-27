<?php
    global $con;
    $sql="SELECT * FROM tbl_page";
    $rs=mysqli_query($con,$sql);
    $list=array();
    while($r=mysqli_fetch_array($rs))
    {
        $list[]=$r;
    }
    $count=count($list);
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">           
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách trang</h3>
                    <a href="?page=form_add_page" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>            
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count"><?=$count?></span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count"><?=$count?></span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt <span class="count"></span> |</a></li>
                            <li class="trash"><a href="">Thùng rác <span class="count"></span></a></li>
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
                                <option value="2">Bỏ vào thủng rác</option>
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
                                    <th><span class="thead-text">Mô tả</span></th>
                                    <th><span class="thead-text">Người tạo</span></th>
                                    <th><span class="thead-text">Tùy chọn</span></th>
                                </tr>
                                <tr>
                                <?php
                                 global $con;
                                 $sql="SELECT * FROM tbl_page";
                                 $rs=mysqli_query($con,$sql);
                                 $count=0;
                                 while($r=mysqli_fetch_assoc($rs))
                                 {
                                     $count++;
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                        <td><?=$count?></td>
                                        <td><?=$r['page_name']?></td>
                                        <td><img src="../<?php echo $r['page_image']?>" width="300px" heigh="300px"></td>
                                        <td><?=$r['page_desc']?></td>
                                        <td>Admin</td>
                                        <td class="clearfix">
                                                <a href="?page=form_edit_page&id=<?=$r['page_id']?>" title="Sửa" class="edit" style=margin:10px><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <a href="?page=delete_page&id=<?=$r['page_id']?>" title="Xóa" class="delete" style=margin:10px><i class="fa fa-trash" aria-hidden="true" onclick=" return confirm ('Bạn chắc chắn muốn xóa tiếp không?')"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                 }
                                 ?>
                                </tr>
                        </table>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title=""><</a>
                        </li>
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title=""></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>