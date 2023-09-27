<?php
// index.php

// Front Controller: Điều hướng tất cả các yêu cầu vào ứng dụng

// Bắt đầu phiên làm việc
session_start();

// Load file cấu hình
require_once 'config.php';

// Load router
require_once 'router.php';
?>