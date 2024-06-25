<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}

$data = [
    'titlePage' => 'Quản trị website'
];





?>

<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
        </ol>
    </nav>
    <div class="d-flex flex-row">
        <soan class="fs-2 fw-bold">Thống kê hoạt động</soan>
        <input type="date" class="px-3 ms-5" value="<?= date('Y-m-d') ?>">
        <div class="btn-group btn-sm ms-5">
            <button class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-right fa-rotate-180"></i></button>
            <button class="btn btn-outline-success fw-bold ">Hôm nay</button>
            <button class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>
    <p>Biểu đồ đơn hàng</p>
    <p>Biểu đồ doanh thu</p>
</main>