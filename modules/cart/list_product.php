<?php get_component('header'); ?>
<?php
$user_id = $_SESSION['user_id'];
$sql = "SELECT pro_image,pro_name,promotional_price, tbl_order.status, sum(tbl_orderdetail.quantity) quantity
        FROM tbl_order,tbl_orderdetail,tbl_product 
        WHERE tbl_order.order_id=tbl_orderdetail.order_id AND 
        tbl_orderdetail.pro_id=tbl_product.pro_id AND tbl_order.user_id='$user_id'
        and tbl_order.status like '%thành công%'
        group by pro_image,pro_name,promotional_price, tbl_order.status";


$rs = mysqli_query($con, $sql);
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
                        <a href="" title="">Lịch sử mua hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container" style="display: flex; justify-content: space-between; width: 1200px; margin: 50px auto 0;">
        <div class="sidebar-left" style="width: 18%; background-color: #fff; height: 200px; border: 1px solid #ccc; box-shadow: 0 0px 0px rgba(0,0,0,0.05)">
            <h2 style="display: block; padding: 10px; text-align: center; background-color: #969696; color: white; text-transform: uppercase; font-size: 16px">Lịch sử mua hàng</h2>
            <ul style="padding: 10px;">
                <li style="padding: 5px 0px;"><a href="?mode=home&act=main">Trang chủ</a></li>
                <li style="padding: 5px 0px;"><a href="">Sản phẩm đã mua</a></li>
                <li style="padding: 5px 0px;"><a href="?mod=cart&act=list_ordered">Đơn hàng đã mua</a></li>
                <li style="padding: 5px 0px;"><a href="?mod=cart&act=order_detail&order_id=<?php echo getMaDH(); ?>">Chi tiết đơn hàng</a></li>
            </ul>
        </div>
        <div id="wrapper" class="wp-inner clearfix" style="width: 80%">
            <div class="section" id="info-cart-wp">
                <form method="POST" action="?mod=cart&act=order" name="form-checkout" style="width: 100%;">
                    <div class="section" id="order-review-wp" style="width: 100%;">
                        <div class="section-detail">
                            <table class="table info-exhibition" style="box-shadow: 0 10px 10px rgba(0,0,0,0.05)">
                                <tr>
                                    <td class="thead-text">STT</td>
                                    <td class="thead-text">Ảnh</td>
                                    <td class="thead-text">Tên sản phẩm</td>
                                    <td class="thead-text">Đơn giá</td>
                                    <td class="thead-text">Số lượng</td>
                                    <td class="thead-text">Thành tiền</td>
                                    
                                </tr>
                                <?php
                                $sum_price = 0;
                                $sum_quantity = 0;
                                $count = 0;
                                while ($r = mysqli_fetch_assoc($rs)) {
                                    $count = $count + 1;
                                    $price = $r['promotional_price'];
                                    $quantity = $r['quantity'];
                                    $sum = $price * $quantity;
                                ?>
                                    <tr>
                                        <td class="thead-text" style="width: 5%"><?= $count ?></td>
                                        <td class="thead-text" style="width: 10%">
                                            <div class="thumb">
                                                <img src="<?= $r['pro_image'] ?>" alt="" width="50px" height="50px">
                                            </div>
                                        </td>
                                        <td class="thead-text" style="width: 40%"><?= $r['pro_name'] ?></td>
                                        <td class="thead-text"><?= currency_format($r['promotional_price']) ?></td>
                                        <td class="thead-text"><?= $r['quantity'] ?></td>
                                        <td class="thead-text"><?= currency_format($sum) ?></td>
                                    </tr>
                                <?php
                                    $sum_price += $sum;
                                    $sum_quantity += $quantity;
                                }
                                ?>
                                <tr>
                                    <td colspan="4">Tổng đơn hàng:</td>
                                    <td><?= $sum_quantity ?></td>
                                    <td><?= currency_format($sum_price); ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="place-order-wp clearfix">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?php get_component('footer'); ?>