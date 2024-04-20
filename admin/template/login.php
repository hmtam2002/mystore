<?php
session_start();
define('CONFIG', '../../config/');
define('TEMPLATE', 'template/');
define('ADMIN', './admin/');
require CONFIG . 'database.php';
$_SESSION['loginstatus'] = false;
if (isset($_POST['sbm']) == true) {
    $email = $_POST['txtusername'];
    $pwd = $_POST['txtpassword'];
    if ($f->login($email, $pwd)) {  //login($email,$pwd)==true
        $_SESSION['email'] = $email;
        header('location: ../index.php');
    } else {
        $msg = 'Tài khoản hoặc mật khẩu không đúng';
    }
} else {
    $msg = '';
}
?>
<!-- <link rel="stylesheet" href="../../public/assets/fontawesome/all.css"> -->
<link rel="stylesheet" href="https://fontawesome.com/icons/eye?f=classic&s=solid">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<div style="margin:10% auto; width:50%; border:1px solid #ddd;padding:15px">
    <form action="login.php" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tài khoản</label>
            <input type="text" name="txtusername" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
            <input type="password" name="txtpassword" class="form-control" id="exampleInputPassword1"
                aria-describedby="passwordHelpBlock">
            <small id="passwordHelpBlock" class="form-text text-muted">
                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces,
                special characters, or emoji.
            </small>
        </div>
        <button type="submit" name="sbm"class="btn btn-primary">Đăng nhập</button>
        <p style='color:red '><?php echo $msg; ?></p>
    </form>
