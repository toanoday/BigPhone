<!-- views/blog/main.php -->
<?php require_once 'BlogController.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách bài viết</title>
</head>
<body>
<h1>Danh sách bài viết</h1>
<ul>
    <?php foreach ($posts as $post): ?>
        <li>
            <a href="?url=blog/detail&id=<?php echo $post['post_id']; ?>">
                <?php echo $post['post_title']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
