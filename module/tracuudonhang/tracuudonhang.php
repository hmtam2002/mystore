<?php
$check = false;
if ($f->isPOST())
{
    $filterAll = $f->filter();
    $code = $filterAll['code'];
    $phone_number = $filterAll['phone_number'];

    $thongtindonhang = $db->oneRaw("SELECT * FROM orders WHERE code = '$code' AND phone_number = '$phone_number'");
    $check = true;

}
if ($check && empty($thongtindonhang))
{
    require_once 'khongcothongtin.php';
} else
    if (!empty($thongtindonhang))
    {
        require_once 'tinhtrangvanchuyen.php';
        require_once 'thongtindonhang.php';
    }
?>
<div class="wrap-content bg-white my-3 rounded-3 p-4">
    <p class="text-center fw-bold fs-3">Kiểm tra thông tin đơn hàng và tình trạng vận chuyển</p>
    <form method="post">
        <div class="col-lg-4 col-md-5 col-sm-8 col d-flex flex-column align-items-center mx-auto">
            <div class="form-floating w-100 mb-3">
                <input name="phone_number" type="text" class="form-control" id="sodienthoai" placeholder="">
                <label for="sodienthoai">Số điện thoại (bắt buộc)</label>
            </div>
            <div class="form-floating w-100 mb-3">
                <input name="code" type="text" class="form-control" id="madonhang" placeholder="madonhang">
                <label for="madonhang">Mã đơn hàng</label>
            </div>
            <button type="submit" class="btn btn-danger btn-lg px-5">Kiểm tra</button>
        </div>
    </form>
</div>