<?php 
if (isset($_POST['btn-search'])) {
    $info = $_POST['info'];
    $list_product = get_list_product_by_seach($info);
}


?>
<?php get_component('header'); ?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp" style="margin-bottom: 40px;">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?mod=home&act=main" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?mode=home&act=main" title="">Sản phẩm tìm kiếm</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right" style="width: 100%;">
            <h2 style="font-size: 20px; margin: 15px 0;">Sản phẩm tìm kiếm</h2>
            <div class="section" id="list-product-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php 
                           
                        if (count($list_product) > 0) 
                        { 
                            foreach ($list_product as $item) {?>
                                <li>
                                    <a href="?mod=product&act=detail&id=<?= $item['pro_id']?>&cat_id=<?= $item['cat_id']?>" title="" class="thumb" style="width:100%" height="350px">
                                        <img src="<?= $item['pro_image'] ?>" style="object-fit: contain;width: 100%;height: 174px"> 
                                    </a>
                                    <a href="?mod=product&act=detail&id=<?= $item['pro_id']?>&cat_id=<?= $item['cat_id']?>" title="" class="product-name"><?= $item['pro_name'] ?></a>
                                    <div class="price">
                                        <span class="new"><?= currency_format($item['original_price']) ?></span>
                                        <span class="old"><?= currency_format($item['promotional_price'])?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="?mod=cart&act=add&pro_id=<?= $item['pro_id'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="?mod=cart&act=add&pro_id=<?= $item['pro_id']?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>
                            <?php }?>
                        <?php }?>
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_component('footer'); ?>