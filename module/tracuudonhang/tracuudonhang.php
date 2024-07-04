<?php
if ($f->isPOST())
{
    echo "hello";
}
?>

<div class="wrap-content bg-white my-3 rounded-3 p-4">
    <p class="text-center fw-bold fs-3">Kiểm tra thông tin đơn hàng và tình trạng vận chuyển</p>
    <form method="post">
        <div class="col-lg-4 col-md-5 col-sm-8 col d-flex flex-column align-items-center mx-auto">
            <div class="form-floating w-100 mb-3">
                <input type="text" class="form-control" id="sodienthoai" placeholder="">
                <label for="sodienthoai">Số điện thoại (bắt buộc)</label>
            </div>
            <div class="form-floating w-100 mb-3">
                <input type="text" class="form-control" id="madonhang" placeholder="madonhang">
                <label for="madonhang">Mã đơn hàng</label>
            </div>
            <button type="submit" class="btn btn-danger btn-lg px-5">Kiểm tra</button>

        </div>
    </form>
</div>
<?php
require_once 'thongtindonhang.php';