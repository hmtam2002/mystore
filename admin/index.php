<?php
require_once ("../config.php");
require_once ('./config.php');
require_once '../include/connect.php';


//thư viện php mailer
require_once '../include/phpmailer/Exception.php';
require_once '../include/phpmailer/PHPMailer.php';
require_once '../include/phpmailer/SMTP.php';


require_once '../include/function.php';
require_once '../include/database.php';
require_once '../include/session.php';

$module = _MODULE;
$action = _ACTION;
$db = new Database();
$f = new func();
if (!empty($_GET['cmd']))
{
    if (is_string($_GET['cmd']))
    {
        $module = trim($_GET['cmd']);
    }
}

if (!empty($_GET['act']))
{
    if (is_string($_GET['act']))
    {
        $action = trim($_GET['act']);
    }
}

$path = 'module/' . $module . '/' . $action . '.php';
if (file_exists($path))
{
    require_once ($path);
} else
{
    require_once ('404.php');
}