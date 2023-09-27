<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
                </div>
                <p class="success" style="color:lawngreen"><?php if (isset($success1)) {echo $success1;} ?>
                </p>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="?page=add_cat" method="POST">
                        <label for="cat_name">Tên danh mục</label>
                        <input type="text" name="cat_name" id="cat_name">
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>