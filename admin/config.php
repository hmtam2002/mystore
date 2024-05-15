<?php

const _MODULE = 'home';
const _ACTION = 'dashboard';

const _CODE = true;

//thiết lập host
define('_WEB_HOST', 'http://' . $_SERVER['HTTP_HOST'] . '/admin');
define('_WEB_HOST_TEMPLATE', _WEB_HOST . '/template');

//thiết lập path
define('_WEB_PATH', __DIR__);
define('_WEB_PATH_TEMPLATE', _WEB_PATH . '/template');

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