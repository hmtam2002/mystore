<?php

// Lấy URL từ yêu cầu
$url = isset($_SERVER['REQUEST_URI']) ? rtrim($_SERVER['REQUEST_URI'], '/') : '/';
$base_path = '/' . _PROJECT_NAME; // Đặt đường dẫn cơ sở của dự án tại đây

// Loại bỏ đường dẫn cơ sở khỏi URL
if (strpos($url, $base_path) === 0)
{
    $url = substr($url, strlen($base_path));
}

// Xử lý định tuyến
switch ($url)
{
    case '':
        // Trang chính
        include './module/index/index.php';
        break;
    case '/san-pham':
        // Trang sản phẩm
        $slug = ltrim($url, '/');
        require_once './module/product/detail.php';
        break;
    case '/master':
        // Trang master
        include './module/master/master.php';
        break;
    case '/kiem-tra':
        // Trang kiểm tra
        require_once './module/kiemtra/kiemtra.php';
        break;
    default:
        // Nếu không tìm thấy, giả định rằng đó là slug của sản phẩm
        // và chuyển hướng đến trang sản phẩm
        $slug = ltrim($url, '/');
        require_once './module/product/detail.php';
        break;
}