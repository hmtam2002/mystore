<?php

// if (isset($_POST['name']))
// {
//     $filterAll['name'] = $_POST['name'];
// }
// if (!empty($filterAll))
// {
//     echo '<pre>';
//     print_r($filterAll);
//     echo '</pre>';
// } else
// {
//     echo 'không có';
// }
if (isset($_SESSION['checkout']))
{
    echo '<pre>';
    print_r($_SESSION['checkout']);
    echo '</pre>';
    echo '<pre>';
    print_r($_SESSION['filterAll']);
    echo '</pre>';
} else
{
    echo 'Không có';
}

?>

<div class="wrap-content mt-3 mb-3">
    <div class="row ms-auto me-auto ">
        <div class="col-1 text-white bg-warning  d-flex justify-content-center align-items-center" style="width: 67px;">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#ffffff"
                    d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z" />
            </svg>
        </div>
        <div class="col pe-4 pt-3 pb-3 bg-white">
            <span>Bạn là thành viên?</span>
            <a class="fw-bold text-warning" href="<?= _HOST . '/dang-nhap' ?>">Đăng nhập
                ngay</a>
        </div>
    </div>
    <div class="p-4 bg-white mt-3">
        <span class="fw-bold">ĐỊA CHỈ GIAO HÀNG</span>
        <hr>
        <form method="post">
            <div class="row mb-2">
                <div class="col-3 d-flex flex-column justify-content-center">
                    <label for="fullname">Họ và tên người nhận</label>
                </div>
                <div class="col">
                    <input class="form-control" type="text" name="fullname" class="w-100"
                        placeholder="Nhập họ và tên người nhận">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3 d-flex flex-column justify-content-center">
                    <label for="fullname">Email</label>
                </div>
                <div class="col">
                    <input class="form-control" type="text" name="fullname" class="w-100" placeholder="Nhập Email">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3 d-flex flex-column justify-content-center">
                    <label for="fullname">Số điện thoại</label>
                </div>
                <div class="col">
                    <input class="form-control" type="text" name="fullname" class="w-100"
                        placeholder="Nhập số điện thoại">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3 d-flex flex-column justify-content-center">
                    <label for="fullname">Thành phố, tỉnh</label>
                </div>
                <div class="col">
                    <input class="form-control" type="text" name="fullname" class="w-100">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3 d-flex flex-column justify-content-center">
                    <label for="fullname">Quận, huyện</label>
                </div>
                <div class="col">
                    <input class="form-control" type="text" name="fullname" class="w-100">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3 d-flex flex-column justify-content-center">
                    <label for="fullname">Phường, xã</label>
                </div>
                <div class="col">
                    <input class="form-control" type="text" name="fullname" class="w-100">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3 d-flex flex-column justify-content-center">
                    <label for="fullname">Địa chỉ nhận hàng</label>
                </div>
                <div class="col">
                    <input class="form-control" type="text" name="fullname" class="w-100"
                        placeholder="Nhập địa chỉ nhận hàng">
                </div>
            </div>

            <div class="p-4 position-fixed start-0 end-0 bottom-0 bg-danger">Xác nhận thanh toán</div>
        </form>
    </div>
    <div class="p-4 bg-white mt-3">
        <span class="fw-bold">PHƯƠNG THỨC VẬN CHUYỂN</span>
        <hr>
        <span>Giao hàng tiêu chuẩn...</span>
    </div>
    <div class="p-4 bg-white mt-3">
        <span class="fw-bold">PHƯƠNG THỨC THANH TOÁN</span>
        <hr>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Thanh toán khi nhận hàng
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Ví VNPAY
            </label>
        </div>

    </div>
    <div class="p-4 bg-white mt-3">
        <span class="fw-bold">THÔNG TIN KHÁC</span>
        <hr>
        <p>Ghi chú</p>
        <p>Xuất hoá đơn GTGT</p>
    </div>
    <div class="p-4 bg-white mt-3" style="margin-bottom: 100px;">
        <span class="fw-bold">KIỂM TRA LẠI ĐƠN HÀNG</span>
        <hr>
    </div>
</div>