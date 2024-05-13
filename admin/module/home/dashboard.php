<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
if (!$f->isLogin())
{
    $f->redirect('?cmd=auth&act=login');
}
$data = [
    'titlePage' => 'Quản trị website'
];
$f->layout('header_page');
$f->layout('menu_page');




?>

<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
    <h1 class="h2">Chào mừng</h1>

    Doanh thu hôm nay<br>
    Lượng người truy cập


    <footer class="pt-5 d-flex justify-content-between">
        <span>Copyright © 2019-2020 <a href="https://themesberg.com">Themesberg</a></span>
        <ul class="nav m-0">
            <li class="nav-item">
                <a class="nav-link text-secondary" aria-current="page" href="#">Privacy Policy</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary" href="#">Terms and conditions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary" href="#">Contact</a>
            </li>
        </ul>
    </footer>
</main>

<?php
$f->layout('footer_page');
?>