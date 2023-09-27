<?php 

if (!isset($_POST['btn_search'])) {
    $list_order = get_detail_ordered_customer();
}
else {
    $info = $_POST['info'];



    $sql = "
    with tab as (
        select tbl_user.user_id, sum(tbl_orderdetail.quantity) sl 
        from tbl_orderdetail 
             inner join tbl_order on tbl_orderdetail.order_id = tbl_order.order_id
             inner join tbl_user on tbl_order.user_id = tbl_user.user_id
        GROUP by tbl_user.user_id
    )
    select distinct * 
    from tbl_user inner join tbl_order on tbl_user.user_id = tbl_order.user_id
        inner join tab on tab.user_id = tbl_user.user_id
    where fullname like '%$info%' or tbl_user.phone_num like '%$info%'
    or tbl_user.email like '%$info%' or tbl_user.address like '%$info%'";


    $result = mysqli_query($con, $sql);
    $list_order = array();
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($list_order, $row);
        }
    }
}

?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách khách hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(69)</span></a></li>
                        </ul>
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="info" id="s">
                            <input type="submit" name="btn_search" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Xóa</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Địa chỉ</span></td>
                                    <td><span class="thead-text">Đơn hàng</span></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if (count($list_order) > 0) { $count=0; foreach ($list_order as $item) { $count++;?>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?= $count; ?></h3></span>
                                    <td>
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?= $item['fullname'] ?></a>
                                        </div>
                                    </td>
                                    <td><span class="tbody-text"><?= $item['phone_num'] ?></span></td>
                                    <td><span class="tbody-text"><?= $item['email'] ?></span></td>
                                    <td><span class="tbody-text"><?= $item['address'] ?></span></td>
                                    <td><span class="tbody-text"><?= $item['sl'] ?></span></td>
                                </tr>
                                </td>
                                </tr>
                                <?php }}?>
                                
                                
                            </tfoot>
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