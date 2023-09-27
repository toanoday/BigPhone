<?php get_component('header'); ?>
<?php 
// Lây thông tin các sản phẩm đã thêm vào giỏ hàng
if (isset($_SESSION['user_id'])) { 
    $id = $_SESSION['user_id'];
    $list_product = get_list_product_in_cart($id);

    
}
else redirect("?account&act=login");
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
                        <a href="" title="">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <?php if (!empty($list_product)) {?>
                    <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($list_product)) { foreach($list_product as $item) { ?>
                            <tr>
                                <td><?= $item['pro_id'] ?></td>
                                <td>
                                    <a href="" title="" class="thumb">
                                        <img src="<?= $item['pro_image'] ?>" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="" title="" class="name-product"><?= $item['pro_name'] ?></a>
                                </td>
                                <td><?= currency_format($item['promotional_price']); ?></td>
                                <td>
                                    <input type="number" class="num-order" name="num-order" min="1" max="10" value="<?php if (isset($_GET['num']) && $item['pro_id'] == $_GET['pro_id']) {echo $_GET['num'];} else echo $item['quantity'] ?>" data-id="<?php echo $item['pro_id'] ?>">
                                </td>
                                <td class="subtotal<?= $item['pro_id'] ?>"><?= currency_format(isset($item['promotional_price'])? $price = $item['promotional_price'] * $item['quantity'] : $price = $item['original_price'] * $item['quantity'])?></td>
                                <td>
                                    <a href="?mod=cart&act=delete&pro_id=<?= $item['pro_id']?>" title="" class="del-product" onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php }?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" data-total="<?php echo get_total_cart()?>" class="fl-right">Tổng giá: <span><?= currency_format(get_total_cart()); ?></span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <a href="" title="" id="update-cart">Cập nhật giỏ hàng</a>
                                        <a href="?mod=cart&act=checkout" title="" id="checkout-cart">Thanh toán</a>
                                        <a  style="display: inline-block;padding: 12px 25px;text-transform: uppercase;font-size: 13px;border-radius: 3px;font-family: 
                                            'Roboto Bold';font-weight: normal;border: none;outline: none;background: #e74c3c;color: #fff;" 
                                            href="?mod=cart&act=delete&user_id=<?php echo $_SESSION['user_id'] ?>" title="" id="delete-cart"  onclick="return confirm('Bạn có muốn xóa giỏ hàng không?')">Xóa giỏ hàng</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <div class="section" id="action-cart-wp">
                    <div class="section-detail">
                        <a href="?mod=home" title="" id="buy-more">Mua tiếp</a><br/>
                    </div>
                </div>
                <?php } 
                else {?>
                    <a href="?mod=home">Không có sản phẩm nào trong giỏ hàng!! Tiếp tục mua sắm!!</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php get_component('footer'); ?>
