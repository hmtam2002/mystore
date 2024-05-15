<?php
require_once './config.php';

// echo _WEB_HOST;
// echo _WEB_HOST_TEMPLATE;
// echo _PATH;

// index.php

// index.php

// Lấy URL từ yêu cầu
$url = isset($_SERVER['REQUEST_URI']) ? rtrim($_SERVER['REQUEST_URI'], '/') : '/';
$base_path = '/mystore'; // Đặt đường dẫn cơ sở của dự án tại đây

// Loại bỏ đường dẫn cơ sở khỏi URL
if (strpos($url, $base_path) === 0)
{
    $url = substr($url, strlen($base_path));
}

// echo $url;
// die();

// Xử lý định tuyến
switch ($url)
{
    case '':
        // Trang chính
        header('location: module/index');
        break;
    case '/san-pham':
        // Trang sản phẩm
        include 'product.php';
        break;
    default:
        // Nếu không tìm thấy, giả định rằng đó là slug của sản phẩm
        // và chuyển hướng đến trang sản phẩm
        $slug = ltrim($url, '/');
        include 'product.php'; // Hoặc chuyển hướng đến trang sản phẩm khác
        break;
}