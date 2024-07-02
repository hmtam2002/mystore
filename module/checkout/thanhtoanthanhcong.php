<?php
if ($_GET['vnp_ResponseCode'] == '00')
{
    ?>
    <div class="wrap-content my-3 bg-white p-4">
        <p class="fs-3 text-center fw-bold text-success mb-5">Giao dịch thành công</p>
        <div style="width: 100px; height: 100px;"
            class="animate__animated animate__tada mx-auto d-flex justify-content-center align-items-center rounded-circle border border-success">
            <i class="text-success fa fa-solid fa-check fs-1"></i>
        </div>
        <div class="row col-lg-3 col-sm-5 col mx-auto mt-5">
            <a href="<?= _HOST ?>" class="btn btn-success">Quay về trang chủ</a>
        </div>
    </div>
    <?php
} else
{ ?>
    <div class="wrap-content my-3 bg-white p-4">
        <p class="fs-3 text-center fw-bold text-warning mb-5">Giao dịch thất bại</p>
        <div style="width: 100px; height: 100px;"
            class="animate__animated animate__tada mx-auto d-flex justify-content-center align-items-center rounded-circle border border-warning">
            <i class="text-warning fas fa-exclamation  fs-1"></i>
        </div>
        <div class="row col-lg-3 col-sm-5 col mx-auto mt-5">
            <a href="<?= _HOST ?>" class="btn btn-warning">Quay về trang chủ</a>
        </div>
    </div>
    <?php
}
?>