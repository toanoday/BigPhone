<?php
// router.php

// Định tuyến yêu cầu
if (isset($_GET['url'])) {
    $url = $_GET['url'];
} else {
    $url = 'main';
}

$urlParts = explode('/', $url);

// Chọn controller và action tương ứng
$controller = 'BlogController';
$action = 'main';

if (!empty($urlParts[0])) {
    $controller = ucfirst($urlParts[0]) . 'Controller';
}

if (!empty($urlParts[1])) {
    $action = $urlParts[1];
}

// Kiểm tra xem tệp controller tồn tại
$controllerFile = "controllers/$controller.php";

if (!file_exists($controllerFile)) {
    die("Controller không tồn tại.");
}

// Tạo đối tượng controller và gọi action
require_once $controllerFile;

$controllerObj = new $controller();
$controllerObj->$action();
?>
