
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới trang mới</h3>
                </div>
                <p class="success" style="color:lawngreen"><?php if (isset($success1)) echo $success1 ?></p>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="?page=add_page" method="POST" enctype="multipart/form-data">
                        <label for="page_name">Tiêu đề</label>
                        <input type="text" name="page_name" id="page_name">
                        <label for="page-slug">Slug ( Friendly_url )</label>
                        <input type="text" name="page_slug" id="page_slug">
                        <label for="page-desc">Mô tả</label>
                        <textarea name="page_desc" id="page_desc" class="ckeditor"></textarea>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="file">
                            <p class="success" style="color:lawngreen"><?php if (isset($success)) echo $success ?></p>
                        </div>
                        
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
