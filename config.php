<?php
//kiểm tra và bắt đầu session
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

//tên project
const projectName = 'mystore';
define('_PROJECT_NAME', projectName);


//ngôn ngữ
define('_LANGUAGE', 'vi');

// Đặt múi giờ cho PHP
date_default_timezone_set('Asia/Ho_Chi_Minh');


//thiết lập host
define('_HOST', 'http://' . $_SERVER['HTTP_HOST'] . '/' . _PROJECT_NAME);
define('_HOST_TEMPLATE', _HOST . '/template');
define('_HOST_ASSETS', _HOST . '/assets');


//thiết lập path
define('_PATH', __DIR__);
define('_PATH_TEMPLATE', _PATH . '/template');
define('_PATH_ASSETS', _PATH . '/assets');


//thông tin kết nối
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