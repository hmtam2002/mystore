<?php
if ($f->isPOST() && $_POST['action'] == 'getcode')
{
    $code = $f->generateOrderId();
    setFlashData('vietqrcode', $code);
    echo $code;
    exit();
}
if ($_GET['payonline'] == 'success')
{
    require_once 'view/VNPAY/thanhtoanthanhcong.php';
} else
{

    // Kiểm tra luồng xử lý đặt hàng thanh toán tiền mặt
    if (isset($_GET['redirect']))
    {
        // Sau khi đặt đơn trả về success
        if ($_GET['redirect'] === 'success')
        {
            require_once 'view/dathangthanhcong.php';
        }
    } else
    {
        // Kiểm tra vnp trả về
        if (isset($_GET['vnp_ResponseCode']) || isset($_GET['trang-thai-giao-dich']))
        {
            // Nếu giá trị là 
            if ($_GET['vnp_ResponseCode'] == '00' || $_GET['trang-thai-giao-dich'] == 'thanh-cong')
            {
                // Trả về thanh toán thành công
                require_once 'vnpay_return.php';
            } else
            {
                // Trả về thanh toán thất bại
                require_once 'view/VNPAY/thanhtoanthatbai.php';

            }
        } else
        {
            // Mặc định nếu không có GET url
            if (empty($_SESSION['checkout']))
            {
                $f->redirect(_HOST);
            }
            if ($f->isPOST() && isset($_POST['xacnhanthanhtoan']))
            {
                // Tổng đơn
                $tongdon = $c->totalCheckout($_SESSION['checkout']);
                // Thông tin form
                $fillterAll = $f->filter();
                // Tiền ship
                if ($fillterAll['tinh'] == 01 || $fillterAll['tinh'] == 79)
                {
                    $tienship = 20000;
                } else
                {
                    $tienship = 32000;
                }
                // Mã hoá đơn
                $code = $f->generateOrderId();
                if ($fillterAll['flexRadioDefault'] == 'cod')
                {
                    require_once 'COD.php';
                } else
                    if ($fillterAll['flexRadioDefault'] == 'vnpay')
                    {
                        $fillterAll['code'] = $code;
                        $fillterAll['tongdon'] = $tongdon;
                        $fillterAll['tienship'] = $tienship;
                        setFlashData('order', $fillterAll);
                        $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
                        $vnp_Amount = $tongdon + $tienship; // Số tiền thanh toán
                        $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
                        $vnp_BankCode = ''; //Mã phương thức thanh toán
                        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

                        require_once 'vnpay.php';
                    } else
                    {
                        if ($fillterAll['flexRadioDefault'] == 'vietqr')
                        {
                            require_once 'vietqr.php';
                        }
                    }
                exit();
            }
            // Trả về list quận huyện
            if ($f->isPOST() && isset($_POST['matp']))
            {
                $matp = $_POST['matp'];
                $qh = $db->getRaw("SELECT * FROM quanhuyen WHERE matp = '$matp'");
                echo '<option value="-1"></option>';
                foreach ($qh as $item)
                {
                    echo '<option value="' . $item['maqh'] . '">' . $item['name'] . '</option>';
                }
                exit();
            }
            // trả ajax list xã phường
            if ($f->isPOST() && isset($_POST['maqh']))
            {
                $maqh = $_POST['maqh'];
                $xp = $db->getRaw("SELECT * FROM xaphuongthitran WHERE maqh = '$maqh'");
                echo '<option value="-1"></option>';
                foreach ($xp as $item)
                {
                    echo '<option value="' . $item['xaid'] . '">' . $item['name'] . '</option>';
                }
                exit();
            }
            require_once 'view/formcheckout.php';
        }
    }
}