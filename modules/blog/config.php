<?php
// config.php

// Kết nối đến cơ sở dữ liệu
$host = 'localhost';
$dbname = 'imart';
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Lỗi kết nối đến cơ sở dữ liệu: " . $e->getMessage());
}
?>