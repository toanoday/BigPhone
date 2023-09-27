<?php

    if (!isset($_POST['btn_search'])) {
        global $con;
        $sql="SELECT *
            FROM tbl_product";
        $rs=mysqli_query($con,$sql);
        $list=array();
        while($r=mysqli_fetch_array($rs))
        {
            array_push($list, $r);
        }
    }
    else {
        $info = $_POST['info'];
        $sql = "
            select * from tbl_product
            where pro_id like '%$info%' or pro_name like '%$info%'
            or promotional_price like '%$info%' or original_price like '%$info%'";


        $result = mysqli_query($con, $sql);
        $list = array();
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($list, $row);
            }
        }
    };
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                  
                    <a href="?page=form_add_product" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count"></span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count"></span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt<span class="count">(0)</span> |</a></li>
                            <li class="pending"><a href="">Thùng rác<span class="count">(0)</span></a></li>
                        </ul>
                        <form method="POST" class="form-s fl-right" action="">
                            <input type="text" name="info" id="s">
                            <input type="submit" name="btn_search" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions" >
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Công khai</option>
                                <option value="1">Chờ duyệt</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp" border="1">
                                <tr>
                                    <th><input type="checkbox" name="checkAll" id="checkAll"></th>
                                    <th>STT</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá cũ</th>
                                    <th>Giá mới</th>
                                    <th>Trạng thái</th>
                                    <th>Người tạo</th>
                                    <th>Tùy chọn</th>
                                </tr>
                                <?php
                                $count = 0;
                                    if(count($list) > 0) {                             
                                     foreach($list as $r) {
                                        $count++;
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                        <td><?=$count?></td>
                                        <td><?=$r['pro_id']?></td>
                                        <td><img src="../<?php echo $r['pro_image']?>" width="50px" heigh="50px"></td>
                                        <td style=width:400px;>
                                            <?=$r['pro_name']?>
                                        </td>
                                        <td><?=$r['original_price']?></td>
                                        <td><?=$r['promotional_price']?></td>
                                        <td><p style="padding: 2px 5px; display:inline-block; background-color: #2ecc71;color:#fff"><?=$r['status_pro'] == 1 ? 'Ngừng kinh doanh': 'Đang bán'?></p></td>
                                        <td>Admin</td>
                                        <td class="clearfix">
                                            <a href="?page=form_edit_pro&id=<?=$r['pro_id']?>" title="Sửa" class="edit" style=margin:10px><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="?page=update_product&id=<?=$r['pro_id']?>" title="Xóa" class="delete" style=margin:10px><i class="fa fa-trash" aria-hidden="true" onclick=" return confirm ('Bạn chắc chắn muốn xóa tiếp không?')"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                 } }
                                 ?>

                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>