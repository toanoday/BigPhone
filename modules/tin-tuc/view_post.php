<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imart";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến CSDL thất bại: " . $conn->connect_error);
}
if (isset($_GET['post_id'])) {
    // Kết nối đến CSDL
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Lấy post_id từ URL
    $post_id = $_GET['post_id'];

    $sql = "SELECT * FROM tbl_post WHERE post_id = $post_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<h1>' . $row["post_title"] . '</h1>';
        echo '<p>' . $row["post_author"] . '</p>';
        echo '<p>' . $row["post_date"] . '</p>';
        echo '<img src="../' . $row["post_image"] . '" alt="' . $row["post_title"] . '">';
        echo '<div>' . $row["post_content"] . '</div>';
    } else {
        echo "Không tìm thấy bài viết.";
    }

    // Đóng kết nối CSDL
    $conn->close();
} else {
    echo "Không có thông tin bài viết.";
}
?>
