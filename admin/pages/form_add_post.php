<!--fix-->
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới bài viết</h3>
                </div>
                <p class="success" style="color: lawngreen"><?php if (isset($success1)) echo $success1 ?></p>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="?page=add_post" method="POST" enctype="multipart/form-data">
                        <label for="post_name">Tiêu đề</label>
                        <input type="text" name="post_title" id="post_title">

                        <label for="post_author">Người đăng</label>
                        <input type="text" name="post_author" id="post_author">

                        <label for="post_date">Ngày đăng</label>
                        <input type="date" name="post_date" id="post_date">

                        <label for="post_slug">Slug (Friendly_url)</label>
                        <input type="text" name="post_slug" id="post_slug">

                        <label for="post_content">Nội dung</label>
                        <textarea name="post_content" id="post_content" class="ckeditor"></textarea>

                        <label for="file">Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="file">
                            <p class="success" style="color: lawngreen"><?php if (isset($success)) echo $success ?></p>
                        </div>

                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
