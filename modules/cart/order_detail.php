<?php get_component('header'); ?>
<?php

$order_id = $_GET['order_id'];
$sql = "SELECT tbl_order.order_id, tbl_order.date, tbl_order.address,tbl_order.phone_num,
               tbl_order.total_price, tbl_orderdetail.quantity, tbl_product.pro_image,
               tbl_product.pro_name, tbl_order.note, tbl_product.promotional_price, tbl_order.status,
               tbl_order.htvc, tbl_order.httt, tbl_user.*
        from tbl_order inner join tbl_orderdetail 
        on tbl_order.order_id = tbl_orderdetail.order_id
        inner join tbl_product on tbl_product.pro_id = tbl_orderdetail.pro_id
        inner join tbl_user on tbl_order.user_id = tbl_user.user_id
        WHERE tbl_order.order_id='$order_id'";

$sql1 = "SELECT tbl_user.*
        from tbl_order
        inner join tbl_user on tbl_order.user_id = tbl_user.user_id
        WHERE tbl_order.order_id='$order_id'";

$rs = mysqli_query($con, $sql);
$list_ordered = array();


while ($r = mysqli_fetch_assoc($rs)) {
    array_push($list_ordered, $r);
    $item =$r;
}

$rs1 = mysqli_query($con, $sql1);
$count = count($list_ordered);


$status;
?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Chi tiết hóa đơn</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="wrapper" class="wp-inner clearfix">
        <div>
            <h2 style="font-size: 20px;text-transform: uppercase;margin: 20px 0 15px 0">Thông tin người dùng</h2>
            <table style="width: 60%; margin-bottom: 20px">
                <?php
                while ($r = mysqli_fetch_assoc($rs1)) {
                ?>
                    <tr>
                        <td><span>Họ và tên:</span> </td>
                        <td><span><?= $r['fullname'] ?></span></td>
                    </tr>
                    <tr>
                        <td><span>Số điện thoại:</span> </td>
                        <td><span><?= $r['phone_num'] ?></span></td>
                    </tr>
                    <tr>
                        <td><span>Email: </span></td>
                        <td><span><?= $r['email'] ?></span></td>
                    </tr>
                    <tr>
                        <td><span>Địa chỉ: </span> </td>
                        <td><span><?= $r['address'] ?></span></td>
                    </tr>
                <?php

                }
                ?>
            </table>

        </div>
        <div class="section" id="info-cart-wp">
            <h2 style="font-size: 20px;text-transform: uppercase;margin: 20px 0 15px 0">Thông tin sản phẩm</h2>
            <form method="POST" action="?mod=cart&act=order" name="form-checkout" style="width: 100%;">
                <div class="section" id="order-review-wp" style="width: 100%;">
                    <div class="section-detail">
                        <table class="table info-exhibition" style="box-shadow: 0 10px 10px rgba(0,0,0,0.05)">
                            <tr>
                                <td class="thead-text">Mã ĐH</td>
                                <td class="thead-text">Sản phẩm</td>
                                <td class="thead-text">Ngày đặt</td>
                                <td class="thead-text">Trạng thái</td>
                                <td class="thead-text">HTTT, HTVC</td>
                                <td class="thead-text">Ghi chú</td>
                                <td class="thead-text">Tổng tiền</td>
                            </tr>

                            <tr>
                                <td class="thead-text" style="width: 5%"><?= $item['order_id'] ?></td>
                                <td class="thead-text" style="text-align: left; padding-left: 20px; width: 35%;">
                                    <?php
                                    if (count($list_ordered) > 0) {
                                        foreach ($list_ordered as $item) {
                                            $status = $item['status'];
                                    ?>
                                            <div class="content" style="display:flex; align-items:center; justify-content: space-between;">
                                                <div class="left" style="width: 25%;">
                                                    <div class="thumb">
                                                        <img src="<?= $item['pro_image'] ?>" alt="" width="50px" height="50px" style="text-align:center; object-fit: contain; width: 80%;">
                                                    </div>

                                                </div>
                                                <div class="right" style="width: 85%;margin-left: 10px">
                                                    <span> <?= $item['pro_name'] ?></span><br>
                                                    <span>Số lượng: <strong><?= $item['quantity'] ?></strong></span><br>
                                                    <span>Thành tiền: <?= currency_format($item['quantity'] * $item['promotional_price']) ?></span>
                                                </div>
                                            </div>
                                    <?php }}?>
                                </td>
                                <td class="thead-text" style="width: 8%"><?= $item['date'] ?></td>
                                <td class="thead-text" style="width: 15%;">
                                    <p style="display:inline-block; padding: 3px 5px; background-color: #27ae60; color: #fff"><?= $item['status'] ?></p>
                                </td>
                                <td class="thead-text" style="width: 12%">
                                    <p><?= $item['htvc'] ?></p>
                                    <p><?= $item['httt'] ?></p>
                                </td>
                                <td class="thead-text" style="width: 12%"><?= $item['note'] ?></td>
                                <td class="thead-text" style="width: 13%"><?= currency_format($item['total_price']) ?></td>
                            </tr>

                    <?php if (isset($status) && $status == "Chờ xử lý") { ?>
                        <tr>
                            <td colspan="6"></td>
                            <td><a style="background-color: #e74c3c; padding:5px 10px; color:#fff;" href="?mod=cart&act=update&order_id=<?= $order_id ?>" onclick="return confirm('Bạn có muốn hủy đơn hàng không?')">Hủy đơn hàng</a></td>
                        </tr>
                    <?php } ?>
                        </table>
                    </div>
                    <div class="place-order-wp clearfix">
                        <a href="?mod=cart&act=list_product">Danh sách sản phẩm đã mua</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php get_component('footer'); ?>