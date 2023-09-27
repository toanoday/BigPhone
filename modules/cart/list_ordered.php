<?php get_component('header'); ?>
<?php
$user_id = $_SESSION['user_id'];
$sql = "SELECT tbl_order.order_id, status, total_price, date, tbl_orderdetail.quantity sl, tbl_product.* from tbl_order inner join tbl_orderdetail 
        on tbl_order.order_id = tbl_orderdetail.order_id
        inner join tbl_product on tbl_product.pro_id = tbl_orderdetail.pro_id
        where tbl_order.user_id = $user_id";


$rs = mysqli_query($con, $sql);
$list_ordered = array();

while ($r =mysqli_fetch_assoc($rs)) {
    array_push($list_ordered, $r);
}
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
                        <a href="" title="">Danh sách đơn hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div id="wrapper" class="wp-inner clearfix" style="width: 80%">
        <div class="section" id="info-cart-wp">
            <form method="POST" action="?mod=cart&act=order" name="form-checkout" style="width: 100%;">
                <div class="section" id="order-review-wp" style="width: 100%;">
                    <div class="section-detail">
                        <table class="table info-exhibition" style="box-shadow: 0 10px 10px rgba(0,0,0,0.05)">
                            <tr>
                                <td class="thead-text">Mã ĐH</td>
                                <td class="thead-text">Sản phẩm</td>
                                <td class="thead-text">Tổng tiền</td>
                                <td class="thead-text">Ngày đặt</td>
                                <td class="thead-text">Trạng thái</td>
                                <td class="thead-text">Chi tiết</td>
                            </tr>
                            <?php
                            if (count($list_ordered) > 0) { foreach($list_ordered as $item) {   
                            ?>
                                <tr>
                                    <td class="thead-text"><?= $item['order_id'] ?></td>
                                    <td class="thead-text"><?= $item['pro_name']?> * <?= $item['sl'] ?></td>
                                    <td class="thead-text"><?= currency_format($item['total_price'])?></td>
                                    <td class="thead-text"><?= $item['date']?></td>
                                    <td class="thead-text"><p style="display: inline-block;padding: 2px 5px; background-color: #27ae60; color: #fff"><?= $item['status']?></p></td>
                                    <td class="thead-text"><a href="?mod=cart&act=order_detail&order_id=<?= $item['order_id'] ?>">Chi tiết</a></td>
                                </tr>
                                
                            <?php }}?>
                        </table>
                    </div>
                    <div class="place-order-wp clearfix">
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<?php get_component('footer'); ?>