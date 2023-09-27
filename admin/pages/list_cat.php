<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                    <a href="?page=form_add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                                <tr>
                                    <th><input type="checkbox" name="checkAll" id="checkAll"></th>
                                    <th><span class="thead-text">STT</span></th>
                                    <th><span class="thead-text">Tiêu đề</span></th>
                                    <th><span class="thead-text">Mã danh mục</span></th>
                                    <th><span class="thead-text">Trạng thái</span></th>
                                    <th><span class="thead-text">Người tạo</span></th>
                                    <th><span class="thead-text">Tùy chọn</span></th>
                                </tr>
                                <?php
                                $sql="SELECT * FROM tbl_category";
                                $rs=mysqli_query($con,$sql);
                                $count=0;
                                while($r=mysqli_fetch_assoc($rs))
                                {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><?=$count?></td>
                                        <td><?=$r['cat_name']?></td>
                                        <td><?=$r['cat_id']?></td>
                                        <td><p style="padding: 2px 5px; display:inline-block; background-color: #2ecc71;color:#fff"><?=$r['status_cat']==0?'Đang bán':'Ngừng kinh doanh'?></p></td>
                                        <td>Admin</td>
                                        <td>
                                        <a href="?page=form_edit_cat&id=<?=$r['cat_id']?>" title="Sửa" class="edit" style=margin:10px><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <a href="?page=update_cat&id=<?=$r['cat_id']?>" title="Xóa" class="delete" style=margin:10px><i class="fa fa-trash" aria-hidden="true"  onclick='return confirm("Bạn chắc chắn muốn tiếp tục xóa không?")'></i></a>
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
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
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
                            <a href="" title="">></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>