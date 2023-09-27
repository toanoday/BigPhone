<?php
$vl = array(0,1,2,3,4);
if (isset($_GET['cat_id'])) {
    $cat_id = $_GET['cat_id'];
    $list_product = get_list_product_by_catid($cat_id);
}
else {
    $list_product = get_list_product();
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
                            <a href="?mode=home&act=main&cat_id=1" title=""><?= isset($_GET['cat_id'])?get_category_by_catid($cat_id):"Sản phẩm"?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content fl-right" style="width: 100%;">
                <div class="section" id="list-product-wp">
                    <div class="section-head" style="display: flex;align-items: center;justify-content: space-between;margin-bottom: 20px;">
                        <h3 class="section-title fl-left"><?= isset($_GET['cat_id'])?get_category_by_catid($cat_id):"Sản phẩm"?></h3>
                        <div class="filter-wp fl-right">
                            <p class="desc">Hiển thị 45 trên 50 sản phẩm</p>
                            <div class="form-filter">
                                <form method="POST" action="">
                                    <select name="select">

                                        <option value='<?=$vl[1]?>' selected>Từ A-Z</option>;
                                        <option value='<?=$vl[2]?>' selected>Từ Z-A</option>;
                                        <option value='<?=$vl[3]?>' selected>Giá cao xuống thấp</option>;
                                        <option value='<?=$vl[4]?>' selected>Giá thấp lên cao</option>;

                                    </select>
                                    <button type="submit" name="btn-filter">Lọc</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <?php
                            if (!isset($_POST['btn-filter'])) {
                                if (count($list_product) > 0)
                                {
                                    foreach ($list_product as $item) {?>
                                        <li>
                                            <a href="?mod=product&act=detail&id=<?= $item['pro_id']?>&cat_id=<?= $item['cat_id'] ?>" title="" class="thumb" style="width:100%" height="350px">
                                                <img src="<?= $item['pro_image'] ?>" style="object-fit: contain;width: 100%;height: 174px">
                                            </a>
                                            <a href="?mod=product&act=detail&id=<?= $item['pro_id']?>&cat_id=<?= $item['cat_id'] ?>" title="" class="product-name"><?= $item['pro_name'] ?></a>
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
                            <?php } else {?>
                                <?php
                                $list_product = filter_product();
                                $value = $_POST['select'];
                                if (count($list_product) > 0) { foreach ($list_product as $item) {?>
                                    <li>
                                        <a href="?mod=product&act=detail&id=<?= $item['pro_id']?>&cat_id=<?= $item['cat_id'] ?>" title="" class="thumb" style="width:100%" height="350px">
                                            <img src="<?= $item['pro_image'] ?>" style="object-fit: contain;width: 100%;height: 174px">
                                        </a>
                                        <a href="?mod=product&act=detail&id=<?= $item['pro_id']?>&cat_id=<?= $item['cat_id'] ?>" title="" class="product-name"><?= $item['pro_name'] ?></a>
                                        <div class="price">
                                            <span class="new"><?= currency_format($item['original_price']) ?></span>
                                            <span class="old"><?= currency_format($item['promotional_price'])?></span>
                                        </div>
                                        <div class="action clearfix">
                                            <a href="?mod=cart&act=add&pro_id=<?= $item['pro_id']?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                            <a href="?mod=cart&act=add&pro_id=<?= $item['pro_id']?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                        </div>
                                    </li>
                                <?php }?>
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