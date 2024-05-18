<?php
// session_start();
require_once './config.php';
require_once './include/connect.php';
require_once './include/function.php';
require_once './include/database.php';
require_once './include/session.php';


$db = new Database();
$f = new func();



// điều hướng
require_once './include/route.php';