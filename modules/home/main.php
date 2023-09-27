<?php get_component('header'); ?>
<?php 
$list_phone = get_list_product_by_catid(1);
$list_laptop = get_list_product_by_catid(0);
$list_tablet = get_list_product_by_catid(2);
$list_earphone = get_list_product_by_catid(4);
$list_ot_product = get_list_outstanding_product();
?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">

            <div id="slider-wp" class="full-screen-slider">
                <div class="section-detail">
                    <div class="item">
                        <img src="public/images/slider04.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/banner.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider02.jpg" alt="">
                    </div>
                </div>
            </div>

            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Sản phẩm nổi bật  -->
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                    <?php if (count($list_ot_product) > 0) {
                            for ($i = 0; $i < 10; $i++) {?>
                                <li>
                                <a href="?mod=product&act=detail&id=<?= $list_ot_product[$i]['pro_id']?>&cat_id=<?= $list_ot_product[$i]['cat_id']?>" title="" class="thumb">
                                    <img src="<?= $list_ot_product[$i]['pro_image'] ?>" style="object-fit: contain;width: 100%;height: 174px;">
                                </a>
                                <a href="?mod=product&act=detail&id=<?= $list_ot_product[$i]['pro_id']?>&cat_id=<?= $list_ot_product[$i]['cat_id']?>" title="" class="product-name"><?=$list_ot_product[$i]['pro_name']?></a>
                                <div class="price">
                                    <span class="new"><?=currency_format($list_ot_product[$i]['promotional_price'])?></span>
                                    <span class="old"><?=currency_format($list_ot_product[$i]['original_price'])?></span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?mod=cart&act=add&pro_id=<?=$list_ot_product[$i]['pro_id']?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?mod=cart&act=add&pro_id=<?=$list_ot_product[$i]['pro_id']?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                    <?php }?>
                    <?php } ?>
                    </ul>
                </div>
            </div>

            <!-- Điện thoại  -->
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title" style="margin-top: 0;">Điện thoại</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php if (count($list_phone) > 0) {
                            for ($i = 0; $i < 8; $i++) {?>
                                <li>
                                <a href="?mod=product&act=detail&id=<?= $list_phone[$i]['pro_id']?>&cat_id=<?= $list_phone[$i]['cat_id']?>" title="" class="thumb">
                                    <img src="<?= $list_phone[$i]['pro_image'] ?>" style="object-fit: contain;width: 100%;height: 174px;">
                                </a>
                                <a href="?mod=product&act=detail&id=<?= $list_phone[$i]['pro_id']?>&cat_id=<?= $list_phone[$i]['cat_id']?>" title="" class="product-name"><?=$list_phone[$i]['pro_name']?></a>
                                <div class="price">
                                    <span class="new"><?=currency_format($list_phone[$i]['promotional_price'])?></span>
                                    <span class="old"><?=currency_format($list_phone[$i]['original_price'])?></span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?mod=cart&act=add&pro_id=<?=$list_phone[$i]['pro_id']?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?mod=cart&act=add&pro_id=<?=$list_phone[$i]['pro_id']?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            <?php }?>
                        <?php } ?>
                    </ul>
                </div>
            </div>


            <!-- Danh sách laptop  -->
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Laptop</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php if (count($list_laptop) > 0) {
                            for ($i = 0; $i < 8; $i++) {?>
                                <li>
                                    <a href="?mod=product&act=detail&id=<?= $list_laptop[$i]['pro_id']?>&cat_id=<?= $list_laptop[$i]['cat_id']?>" title="" class="thumb">
                                        <img src="<?= $list_laptop[$i]['pro_image'] ?>">
                                    </a>
                                    <a href="?mod=product&act=detail&id=<?= $list_laptop[$i]['pro_id']?>&cat_id=<?= $list_laptop[$i]['cat_id']?>" title="" class="product-name"><?=$list_laptop[$i]['pro_name']?></a>
                                    <div class="price">
                                        <span class="new"><?=currency_format($list_laptop[$i]['promotional_price'])?></span>
                                        <span class="old"><?=currency_format($list_laptop[$i]['original_price'])?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="?mod=cart&act=add&pro_id=<?= $list_laptop[$i]['pro_id']?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="?mod=cart&act=add&pro_id=<?= $list_laptop[$i]['pro_id']?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                    </li>
                            <?php }?>
                        <?php } ?>
                    </ul>
                </div>
            </div>


            <!-- Danh sách máy tính bảng -->
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Máy tính bảng</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php if (count($list_tablet) > 0) {
                            for ($i = 0; $i < 4; $i++) {?>
                                <li>
                                    <a href="?mod=product&act=detail&id=<?= $list_tablet[$i]['pro_id']?>&cat_id=<?= $list_tablet[$i]['cat_id']?>" title="" class="thumb">
                                        <img src="<?= $list_tablet[$i]['pro_image'] ?>">
                                    </a>
                                    <a href="?mod=product&act=detail&id=<?= $list_tablet[$i]['pro_id']?>&cat_id=<?= $list_tablet[$i]['cat_id']?>" title="" class="product-name"><?=$list_tablet[$i]['pro_name']?></a>
                                    <div class="price">
                                        <span class="new"><?=currency_format($list_tablet[$i]['promotional_price'])?></span>
                                        <span class="old"><?=currency_format($list_tablet[$i]['original_price'])?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="?mod=cart&act=add&pro_id=<?= $list_tablet[$i]['pro_id']?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="?mod=cart&act=add&pro_id=<?= $list_tablet[$i]['pro_id']?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                    </li>
                            <?php }?>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <!-- Danh sách máy tai nghe -->
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Tai nghe</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php if (count($list_earphone) > 0) {
                            for ($i = 0; $i < 8; $i++) {?>
                                <li>
                                    <a href="?mod=product&act=detail&id=<?= $list_earphone[$i]['pro_id']?>&cat_id=<?= $list_earphone[$i]['cat_id']?>" title="" class="thumb">
                                        <img src="<?= $list_earphone[$i]['pro_image'] ?>">
                                    </a>
                                    <a href="?mod=product&act=detail&id=<?= $list_earphone[$i]['pro_id']?>&cat_id=<?= $list_earphone[$i]['cat_id']?>" title="" class="product-name"><?=$list_earphone[$i]['pro_name']?></a>
                                    <div class="price">
                                        <span class="new"><?=currency_format($list_earphone[$i]['promotional_price'])?></span>
                                        <span class="old"><?=currency_format($list_earphone[$i]['original_price'])?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="?mod=cart&act=add&pro_id=<?= $list_earphone[$i]['pro_id']?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="?mod=cart&act=add&pro_id=<?= $list_earphone[$i]['pro_id']?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                    </li>
                            <?php }?>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </div>
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">
                        <li>
                            <a href="?mod=product&act=main&cat_id=1" title="">Điện thoại</a>
                        </li>
                        <li>
                            <a href="?mod=product&act=main&cat_id=2" title="">Máy tính bảng</a>
                        </li>
                        <li>
                            <a href="?mod=product&act=main&cat_id=0" title="">Laptop</a>
                        </li>
                        <li>
                            <a href="?mod=product&act=main&cat_id=4" title="">Tai nghe</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php if (count($list_ot_product) > 0) {
                            for ($i = 0; $i < 8; $i++) {?>
                            <li class="clearfix">
                            <a href="?mod=product&act=detail&id=<?= $list_ot_product[$i]['pro_id']?>&cat_id=<?= $list_ot_product[$i]['cat_id']?>" title="" class="thumb fl-left">
                                <img src="<?= $list_ot_product[$i]['pro_image']?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" 
                                href="?mod=product&act=detail&id=<?= $list_ot_product[$i]['pro_id']?>&cat_id=<?= $list_ot_product[$i]['cat_id']?>" title="" class="product-name"> <?=$list_ot_product[$i]['pro_name']?></a>
                                <div class="price">
                                    <span class="new"><?=currency_format($list_ot_product[$i]['promotional_price'])?></span>
                                    <span class="old"><?=currency_format($list_ot_product[$i]['original_price'])?></span>
                                </div>
                                <a href="?mod=cart&act=main" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <?php }}?>
                    </ul>
                </div>
            </div>
          
        </div>
    </div>
</div>
<?php get_component('footer'); ?>