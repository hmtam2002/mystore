<?php
$f = new func();
$db = new Database();

// Lấy đường dẫn URL hiện tại và loại bỏ phần query string
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Xác định base path dựa trên tên project
$base_path = '/' . _PROJECT_NAME;

// Loại bỏ base path khỏi URL
if (strpos($url, $base_path) === 0)
{
    $url = substr($url, strlen($base_path));
}

// Loại bỏ dấu gạch chéo cuối cùng nếu có
$url = rtrim($url, '/');



ob_start();



switch ($url)
{
    case '':
        if (file_exists(_PATH . '/module/index/index.php'))
        {
            require_once _PATH . '/module/index/index.php';

            $noidung = ob_get_clean();
        }
        break;
    case '/sach':
        if (file_exists(_PATH . '/module/book/list.php'))
        {
            require_once _PATH . '/module/book/list.php';
            $noidung = ob_get_clean();
        }
        break;
    case '/van-phong-pham':
        if (file_exists(_PATH . '/module/stationery/list.php'))
        {
            require_once _PATH . '/module/stationery/list.php';
            $noidung = ob_get_clean();
        }
        break;
    case '/khuyen-mai':
        if (file_exists(_PATH . '/module/new/list.php'))
        {
            require_once _PATH . '/module/new/list.php';
            $noidung = ob_get_clean();
        }
        break;
    case '/gio-hang':
        if (file_exists(_PATH . '/module/new/list.php'))
        {
            require_once _PATH . '/module/cart/list.php';
            $noidung = ob_get_clean();
        }
        break;
    case '/dang-nhap':
        if (file_exists(_PATH . '/module/auth/login.php'))
        {
            require_once _PATH . '/module/auth/login.php';
            $noidung = ob_get_clean();
        }
        break;
    case '/dang-ky':
        if (file_exists(_PATH . '/module/auth/register.php'))
        {
            require_once _PATH . '/module/auth/register.php';
            $noidung = ob_get_clean();
        }
        break;
    case '/tai-khoan':
        if (file_exists(_PATH . '/module/custommer/custommer.php'))
        {
            require_once _PATH . '/module/custommer/custommer.php';
            $noidung = ob_get_clean();
        }
        break;
    case '/thanh-toan':
        if (file_exists(_PATH . '/module/checkout/checkout.php'))
        {
            require_once _PATH . '/module/checkout/checkout.php';
            $noidung = ob_get_clean();
        }
        break;
    case '/tra-cuu-don-hang':
        if (file_exists(_PATH . '/module/tracuudonhang/tracuudonhang.php'))
        {
            require_once _PATH . '/module/tracuudonhang/tracuudonhang.php';
            $noidung = ob_get_clean();
        }
        break;
    case '/tim-kiem':
        if (file_exists(_PATH . '/module/search/search.php'))
        {
            require_once _PATH . '/module/search/search.php';
            $noidung = ob_get_clean();
        }
        break;
    default:
        $slug = ltrim($url, '/');
        $sql = "SELECT products.*, authors.author_name
            FROM products
            INNER JOIN authors ON products.author_id = authors.id
            WHERE products.slug = '$slug'";
        $product_detail = $db->oneRaw($sql);
        if (!empty($product_detail))
        {
            if (file_exists(_PATH . '/module/book/detail.php'))
            {
                require_once _PATH . '/module/book/detail.php';
                $noidung = ob_get_clean();
                break;
            }
        }
        $new_detail = $db->oneRaw("SELECT * FROM news WHERE slug = '$slug'");
        if (!empty($new_detail))
        {
            if (file_exists(_PATH . '/module/new/detail.php'))
            {
                require_once _PATH . '/module/new/detail.php';
                $noidung = ob_get_clean();
                break;
            }
        }
        $noidung = '<span>Đường dẫn rỗng ' . $url . '</span>';

        break;
}