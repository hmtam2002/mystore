<?php
require_once './config.php';
require_once './include/connect.php';
require_once './include/function.php';
require_once './include/database.php';
require_once './include/session.php';

$db = new Database();
$f = new func();

require_once './include/route.php';

require_once './template/layout/template.php';