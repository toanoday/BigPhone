<?php
$sqlcat = "select * from tbl_category";
$list_cat = array();
$result_cat = mysqli_query($con, $sqlcat);

if (mysqli_num_rows($result_cat) > 0) {
    while ($cat = mysqli_fetch_array($result_cat)) {
        array_push($list_cat, $cat);
    }
}

$sqlbrand = "select * from tbl_brand";
$list_brand = array();
$result_brand = mysqli_query($con, $sqlbrand);

if (mysqli_num_rows($result_brand) > 0) {
    while ($brand = mysqli_fetch_array($result_brand)) {
        array_push($list_brand, $brand);
    }
}
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
                <p class="success" style="color:lawngreen"><?php if (isset($success1)) echo $success1 ?></p>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action ="?page=add_product"method="POST" enctype="multipart/form-data">
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product_name">
                        <label for="original_price">Giá gốc</label>
                        <input type="text" name="original_price" id="original_price">
                        <label for="promotional_price">Giá khuyến mại</label>
                        <input type="text" name="promotional_price" id="promotional_price">
                        <label for="quantity">Số lượng</label>
                        <input type="text" name="quantity" id="quantity">
                        <label for="short_desc">Mô tả ngắn</label>
                        <textarea name="short_desc" id="short_desc"></textarea>
                        <label for="detail_desc">Mô tả chi tiết</label>
                        <textarea name="detail_desc" id="detail_desc" class="ckeditor"></textarea>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="file">
                            <p class="success" style="color:lawngreen"><?php if (isset($success)) echo $success ?></p>
                        </div>
                        <label>Danh mục sản phẩm</label>
                        <select name="cat">
                            <option value="">-- Chọn danh mục --</option>
                            <?php 
                                foreach ($list_cat as $cat_item) {?>
                                    <option value="<?php echo $cat_item['cat_id']?>"><?php echo $cat_item['cat_name']?></option>
                                <?php
                                }
                            ?>
                        </select>
                        <label>Hãng sản xuất</label>
                        <select name="brand">
                            <option value="">-- Chọn danh mục --</option>
                            <?php 
                                foreach ($list_brand as $brand_item) {?>
                                    <option value="<?php echo $brand_item['brand_id']?>"><?php echo $brand_item['brand_name']?></option>
                                <?php
                                }
                            ?>
                        </select>
                        <button type="submit" name="btn_submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>