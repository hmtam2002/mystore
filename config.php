<?php
//kiểm tra và bắt đầu session
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

//tên project
define('_PROJECT_NAME', 'mystore');


//thiết lập host
define('_HOST', 'http://' . $_SERVER['HTTP_HOST'] . '/mystore');
define('_HOST_TEMPLATE', _HOST . '/template');
define('_HOST_ASSETS', _HOST . '/assets');


//thiết lập path
define('_PATH', __DIR__);
define('_PATH_TEMPLATE', _PATH . '/template');
define('_PATH_TEMPLATE_ASSETS', _PATH . 'assets/template');


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