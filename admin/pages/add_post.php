<!--fix-->
<?php

$post_title = $_POST['post_title'];
$post_author = $_POST['post_author'];
$post_content = $_POST['post_content'];
$post_date = $_POST['post_date'];
$post_slug = $_POST['post_slug'];

// Thư mục lưu ảnh trên server
$target_dir = "upload/images/";

// Lấy đường dẫn tới file
$target_file = $target_dir . basename($_FILES['file']['name']);

// Biến flag
$allowUpload = true;

// Lấy phần mở rộng của file (jpg, png, ...)
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Giới hạn dung lượng ảnh
$maxfilesize = 900000;

// Kiểm tra xem có phải là ảnh không
$check = getimagesize($_FILES["file"]["tmp_name"]);
if (!$check) {
    $error = "Đây không phải file ảnh!!";
    $allowUpload = false;
} else {
    $allowUpload = true;
}

// Kiểm tra file có tồn tại hay không
if (file_exists($target_file)) {
    $error = "File đã tồn tại!!!";
    $allowUpload = false;
}

// Kiểm tra kích thước file
if ($_FILES["file"]["size"] > $maxfilesize) {
    $error = "Kích thước file quá lớn.";
    $allowUpload = false;
}

// Những loại file được phép upload
$allowtypes = array('jpg', 'png', 'jpeg', 'gif');
if (!in_array(strtolower($imageFileType), $allowtypes)) {
    $error = "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
    $allowUpload = false;
}

if ($allowUpload) {
    // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "../" . $target_file)) {
        $success = "File " . basename($_FILES["file"]["name"]) .
            " Đã upload thành công.";
    } else {
        $error = "Có lỗi xảy ra khi upload file.";
    }
} else {
    $error = "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
}

$post_image = $target_file;

if (empty($error)) {
    // Thực hiện truy vấn SQL để thêm bài viết mới vào cơ sở dữ liệu
    $sql_insert = "INSERT INTO tbl_post (post_title, post_author, post_content, post_date, post_slug, post_image) 
                   VALUES ('$post_title', '$post_author', '$post_content', '$post_date', '$post_slug', '$post_image')";
    if (mysqli_query($con, $sql_insert)) {
        echo "<script>alert('Bạn đã thêm thành công!')</script>";
        require("list_post.php"); // Điều hướng về trang danh sách bài viết
    } else {
        echo "<script>alert('Lỗi khi thêm bài viết: " . mysqli_error($con) . "')</script>";
    }
} else {
    echo "<script>alert('$error')</script>";
}
?>
