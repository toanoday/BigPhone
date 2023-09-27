<?php
// controllers/BlogController.php

require_once './lib/BlogModel.php';

class BlogController
{
    private $model;

    public function __construct()
    {
        global $db;
        $this->model = new BlogModel($db);
    }

    public function main()
    {
        // Sử dụng model để lấy danh sách bài viết
        $posts = $this->model->getPosts();

        // Hiển thị trang chính với danh sách bài viết
        require_once 'main.php';
    }

    public function detail()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Sử dụng model để lấy chi tiết bài viết dựa trên 'id'
            $post = $this->model->getPostDetail($id);

            // Hiển thị trang chi tiết bài viết với dữ liệu của $post
            require_once 'detail.php';
        } else {
            // Xử lý khi không có 'id' trong URL
            // Ví dụ: Hiển thị thông báo lỗi
            echo "Không có ID bài viết.";
        }
    }
}
?>
