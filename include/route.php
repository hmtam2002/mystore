<?php
$f = new func();
$db = new Database();
$url = $f->route();
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
    case '/bai-viet':
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
        if (file_exists(_PATH . '/module/custommer/detail.php'))
        {
            require_once _PATH . '/module/custommer/detail.php';
            $noidung = ob_get_clean();
        }
        break;
    default:
        $slug = ltrim($url, '/');
        $product_detail = $db->oneRaw("SELECT * FROM products WHERE slug = '$slug'");
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
        $noidung = 'Đường dẫn rỗng';
        break;
}