<?php
session_start();
define('CONFIG', '../config/');
define('TEMPLATE', 'template/');
require CONFIG . 'database.php';
if ($_SESSION['loginstatus'] == true) {
    if (isset($_GET['cmd'])) {
        $cmd = $_GET['cmd'];
    } else {
        $cmd = 'main';
    }
    $f->signout('cmd', 'signout');
    include TEMPLATE . 'top.php';
    include TEMPLATE . 'menu.php';
    include TEMPLATE . $cmd . '.php';
    include TEMPLATE . 'footer.php';
} else {
    header('location: template/login.php');
    // if (isset($_GET['cmd'])) {
    //     $cmd = $_GET['cmd'];
    // } else {
    //     $cmd = 'login';
    // }
    // $cmd = 'login';
    // $f=messager('Đăng nhập thành công');
    // function messager($text = '')
    // {
    //     global $cmd;
    //     $_SESSION['flash'] = '<div class="alert alert-success" role="alert">' . $text . '</div>';
    //     echo "<script>document.location.href='index.php?cmd=" . $cmd . "'</script>";
    // }

}
?>