<!-- views/blog/detail.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết bài viết</title>
</head>
<body>
<?php if (!empty($post)): ?>
    <h1><?php echo $post['post_title']; ?></h1>
    <p>Tác giả: <?php echo $post['post_author']; ?></p>
    <p>Ngày đăng: <?php echo $post['post_date']; ?></p>
    <p><?php echo $post['post_content']; ?></p>
<?php else: ?>
    <p>Bài viết không tồn tại.</p>
<?php endif; ?>
</body>
</html>
