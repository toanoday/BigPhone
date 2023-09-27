<?php get_component('header'); ?>


<?php
$pro_id = $_GET['id'];
$info = get_product_info_by_proid($pro_id);
$cat_id = $_GET['cat_id'];
$list_product = get_list_product_by_catid($cat_id);
?>
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?mod=home&act=main" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Sản phẩm</a>
                    </li>
                    <li>
                        <a href="" title=""><?= $info['pro_name'] ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right" style="width: 100%">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <img id="zoom" src="<?php echo $info['pro_image'] ?>" data-zoom-image="<?php echo $info['pro_image'] ?>" width=350px height=300px>
                        </a>
                    </div>
                    <div class="thumb-respon-wp fl-left">
                        <img src="<?php echo $info['pro_image'] ?>" alt="" width=350px height=300px>
                    </div>
                    <div class="info fl-right" id="pro-desc">
                        <h3 class="product-name-1"><?= $info['pro_name'] ?></h3>

                        <br>
                        <p class="price-label"><span class="original-price">Giá gốc:</span> <span class="original-price-label"><?= currency_format($info['original_price']) ?></span></p>
                        <p class="price-label">Giá khuyến mại: <span class="promotional-price"><?= currency_format($info['promotional_price']) ?></span></p>
                        <br>
                        <div class="desc">
                            <p><?= $info['short_desc'] ?></p>
                        </div>
                        <div class="num-product">
                            <span class="title">Tình trạng sản phẩm: </span>
                            <span class="status"><?= check_product($info['quantity']) ? "Còn hàng " : "Hết hàng" ?></span>
                        </div>


                        <div class="quantity-wrapper">
                            <div class="quantity-label">Số lượng</div>
                            <div class="quantity-control">
                                <div class="quantity-item quantity-minus">
                                    <svg width="20" height="20" viewBox="0 0 20 20">
                                        <path d="M5 10H15" stroke="black" stroke-width="1"></path>
                                    </svg>
                                </div>
                                <div class="quantity-item quantity-input">
                                    <input class="chonsoluong" type="number" min="1" max="10" name="num-order" value="1" id="num-order" data-id="<?= $info['pro_id']?>">
                                </div>
                                <div class="quantity-item quantity-plus">
                                    <svg width="20" height="20" viewBox="0 0 20 20">
                                        <path d="M5 10H15M10 5V15" stroke="black" stroke-width="1"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="quantity-label-1"><?= $info['quantity'] ?> sản phẩm có sẵn</div>
                        </div>

                        <div class="btn-add-cart-1">
                            <a href="?mod=cart&act=add&pro_id=<?= $info['pro_id'] ?>" title="Thêm giỏ hàng" class="add-cart">
                                <span class="cart-icon">&#128722;</span> Thêm vào giỏ hàng
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail" id="product_detail">
                    <?= $info['detail_desc'] ?>
                </div>
            </div>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php
                        if (count($list_product) > 0) {
                            foreach ($list_product as $item) {
                        ?>
                                <li>
                                    <a href="?mod=product&act=detail&id=<?= $item['pro_id'] ?>&cat_id=<?= $item['cat_id'] ?>" title="" class="thumb">
                                        <img src="<?= $item['pro_image'] ?>" width=150px height=200px style="object-fit: contain;width: 100%;height: 174px">
                                    </a>
                                    <a href="?mod=product&act=detail&id=<?= $item['pro_id'] ?>&cat_id=<?= $item['cat_id'] ?>" title="" class="product-name"><?= $item['pro_name'] ?></a>
                                    <div class="price">
                                        <span class="new"><?= currency_format($item['original_price']) ?>đ</span>
                                        <span class="old"><?= currency_format($item['promotional_price']) ?>đ</span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="?mod=cart&act=add&pro_id=<?= $item['pro_id'] ?>" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="?mod=cart&act=add&pro_id=<?= $item['pro_id'] ?>" title="" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>
                        <?php
                            }
                        }

                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_component('footer'); ?>