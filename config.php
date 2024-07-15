<?php
// Kiểm tra và bắt đầu session
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

// Tên project
const projectName = 'mystore';
define('_PROJECT_NAME', projectName);


// Ngôn ngữ
define('_LANGUAGE', 'vi');

// Đặt múi giờ cho PHP
date_default_timezone_set('Asia/Ho_Chi_Minh');


// Thiết lập host
define('_HOST', 'http://' . $_SERVER['HTTP_HOST'] . '/' . _PROJECT_NAME);
define('_HOST_TEMPLATE', _HOST . '/template');
define('_HOST_ASSETS', _HOST . '/assets');


// Thiết lập path
define('_PATH', __DIR__);
define('_PATH_TEMPLATE', _PATH . '/template');
define('_PATH_ASSETS', _PATH . '/assets');

// Thiết lập mailer
define('_username', 'thevyshop.contact@gmail.com');
define('_password', 'tlan nljd syxr nkrg');


// Thông tin kết nối
class DatabaseConfig
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "mystore";
    public function getConnection()
    {
        return new mysqli($this->servername, $this->username, $this->password, $this->database);
    }
}

// Config vnpay
$vnp_TmnCode = "RYHGW29P"; //Mã định danh merchant kết nối (Terminal Id)
$vnp_HashSecret = "KEP0UI9CLDGEZ4UFUEB81QBOZY3M12G9"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = _HOST . '/thanh-toan/';
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
$apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis', strtotime('+5 minutes', strtotime($startTime)));