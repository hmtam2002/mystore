<?php
require_once './config.php';
require_once './include/connect.php';


//thư viện php mailer
require_once './include/phpmailer/Exception.php';
require_once './include/phpmailer/PHPMailer.php';
require_once './include/phpmailer/SMTP.php';


require_once './include/function.php';
require_once './include/database.php';
require_once './include/session.php';
require_once './include/cart.php';

$db = new Database();
$f = new func();
$c = new cart();


require_once './include/route.php';


require_once './template/layout/template.php';