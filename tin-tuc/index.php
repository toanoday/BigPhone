<?php get_component('header'); ?>
<?php
// Kết nối đến CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imart";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến CSDL thất bại: " . $conn->connect_error);
}

// Lấy danh sách bài viết từ CSDL
$sql = "SELECT * FROM tbl_post";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<a href="view_post.php?post_id=' . $row["post_id"] . '">';
        echo '<h2>' . $row["post_title"] . '</h2>';
        echo '</a>';
        echo '<p>' . $row["post_date"] . '</p>';
    }
} else {
    echo "Không có bài viết.";
}

// Đóng kết nối CSDL
$conn->close();
?>





















