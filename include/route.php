<?php
$f = new func();
$db = new Database();




if (isset($_GET) && $_GET['module'] == 'cart')
{
    if ($_GET['action'] == 'remove')
    {
        if (file_exists(_PATH . '/module/cart/remove.php'))
        {
            require_once _PATH . '/module/cart/remove.php';
        }
    }
    exit();
}


$url = $f->route();

ob_start();
// vnpay trả về
if (isset($_GET['vnp_ResponseCode']))
{
    if (file_exists(_PATH . '/module/checkout/thanhtoanthanhcong.php'))
    {
        require_once _PATH . '/module/checkout/thanhtoanthanhcong.php';
        $noidung = ob_get_clean();
    }
} else
    if (isset($_GET['redirect']) && $_GET['redirect'] === 'success')
    {
        if (file_exists(_PATH . '/module/checkout/dathangthanhcong.php'))
        {
            require_once _PATH . '/module/checkout/dathangthanhcong.php';
            $noidung = ob_get_clean();
        }
    } else
    {
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
    }