<?php

if (isset($_SESSION['checkout']))
{
    echo '<pre>';
    print_r($_SESSION['checkout']);
    echo '</pre>';
} else
{
    echo 'Không có';
}
if (empty($_SESSION['checkout']))
{
    $f->redirect(_HOST);
}
if ($f->isPOST() && isset($_POST['xacnhanthanhtoan']))
{
    $tongdon = $c->totalCheckout($_SESSION['checkout']);
    $fillterAll = $f->filter();
    if ($fillterAll['tinh'] == 01 || $fillterAll['tinh'] == 79)
    {
        $tienship = 20000;
    } else
    {
        $tienship = 32000;
    }
    if ($fillterAll['flexRadioDefault'] != 'vnpay')
    {
        echo '<pre>';
        print_r($fillterAll);
        echo '</pre>';
        echo '<pre>';
        print_r($_SESSION['checkout']);
        echo '</pre>';
        echo 'Tổng giá trị đơn hàng: ' . $tongdon;
        echo '<br>Tiền ship: ' . $tienship;
        $loi = false;
        $code = $f->generateOrderId();
        $orderInsert = [
            'code' => $code,
            'order_date' => date('Y-m-d H:i:s'),
            'total_price' => $tongdon,
            'fullname' => $fillterAll['fullname'],
            'email' => $fillterAll['email'],
            'phone_number' => $fillterAll['phone_number'],
            'tinh' => $fillterAll['tinh'],
            'huyen' => $fillterAll['huyen'],
            'xa' => $fillterAll['xa'],
            'address' => $fillterAll['address'],
            'payments' => $fillterAll['flexRadioDefault'],
            'note' => $fillterAll['ghichu'],
            'gtgt-fullname' => $fillterAll['gtgt_fullname'],
            'gtgt-company_name' => $fillterAll['gtgt_company-name'],
            'gtgt-address' => $fillterAll['gtgt_company-address'],
            'gtgt-mst' => $fillterAll['gtgt_company-mst']
        ];
        if ($db->insert('orders', $orderInsert))
        {
            $orderId = $db->oneRaw("SELECT id FROM orders WHERE code = '$code'")['id'];
            echo 'id là: ' . $orderId;
            foreach ($_SESSION['checkout'] as $item)
            {
                $orderDetailInsert = [
                    'order_id' => $orderId,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'discount' => $item['discount'],
                ];
                echo '<pre>';
                print_r($orderDetailInsert);
                echo '</pre>';
                if (!$db->insert('order_details', $orderDetailInsert))
                {
                    $loi = true;
                }
            }
        }
        if ($loi)
        {
            echo 'Có lỗi';
        } else
        {
            $result = [];

            foreach ($_SESSION['cart'] as $item1)
            {
                $found = false;
                foreach ($_SESSION['checkout'] as $item2)
                {
                    if ($item1['id'] == $item2['id'])
                    {
                        $found = true;
                        break;
                    }
                }
                if (!$found)
                {
                    $result[] = $item1;
                }
            }
            $_SESSION['cart'] = $result;

            unset($_SESSION['checkout']);
            // $f->redirect(_HOST . '/thanh-toan/?redirect=success');
        }
    } else
    {
        $code = $f->generateOrderId();
        $fillterAll['code'] = $code;
        $fillterAll['tongdon'] = $tongdon;
        setFlashData('order', $fillterAll);
        $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $tongdon + $tienship; // Số tiền thanh toán
        $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = ''; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

        require_once 'vnpay.php';
    }
    exit();
}

if ($f->isPOST() && isset($_POST['matp']))
{
    $matp = $_POST['matp'];
    $qh = $db->getRaw("SELECT * FROM quanhuyen WHERE matp = '$matp'");
    echo '<option value="-1"></option>';
    foreach ($qh as $item)
    {
        echo '<option value="' . $item['maqh'] . '">' . $item['name'] . '</option>';
    }
    exit();
}
if ($f->isPOST() && isset($_POST['maqh']))
{
    $maqh = $_POST['maqh'];
    $xp = $db->getRaw("SELECT * FROM xaphuongthitran WHERE maqh = '$maqh'");
    echo '<option value="-1"></option>';
    foreach ($xp as $item)
    {
        echo '<option value="' . $item['xaid'] . '">' . $item['name'] . '</option>';
    }
    exit();
}
?>
<div class="wrap-content my-3">
    <!-- Bạn là thành viên -->
    <div class="row ms-auto me-auto ">
        <div class="col-1 text-white bg-warning  d-flex justify-content-center align-items-center" style="width: 67px;">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#ffffff"
                    d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z" />
            </svg>
        </div>
        <div class="col pe-4 py-3 bg-white">
            <span>Bạn là thành viên?</span>
            <a class="fw-bold text-warning" href="<?= _HOST . '/dang-nhap' ?>">Đăng nhập
                ngay</a>
        </div>
    </div>
    <!-- Form thông tin giao hàng -->
    <form method="post" id="form-thanhtoan">
        <div class="p-4 bg-white mt-3">
            <span class="fw-bold">ĐỊA CHỈ GIAO HÀNG</span>
            <hr>
            <div class="row mb-2">
                <div class="col-md-3 d-flex flex-column justify-content-center">
                    <label for="fullname">Họ và tên người nhận</label>
                </div>
                <div class="col">
                    <input class="form-control" type="text" name="fullname" class="w-100"
                        placeholder="Nhập họ và tên người nhận" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 d-flex flex-column justify-content-center">
                    <label for="fullname">Email</label>
                </div>
                <div class="col">
                    <input class="form-control" type="email" name="email" class="w-100" placeholder="Nhập Email"
                        required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 d-flex flex-column justify-content-center">
                    <label for="fullname">Số điện thoại</label>
                </div>
                <div class="col">
                    <input class="form-control" type="number" name="phone_number" class="w-100"
                        placeholder="Nhập số điện thoại" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 d-flex flex-column justify-content-center">
                    <label for="fullname">Thành phố, tỉnh</label>
                </div>
                <div class="col">
                    <select name="tinh" id="tinh" class="form-control diachi" required>
                        <option value="-1"></option>
                        <?php
                        $tp = $db->getRaw('SELECT * FROM tinhthanhpho');
                        foreach ($tp as $item)
                        {
                            echo '<option value="' . $item['matp'] . '">' . $item['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-md-2">
                <div class="col-md-3 d-flex flex-column justify-content-center">
                    <label for="fullname">Quận, huyện</label>
                </div>
                <div class="col">
                    <select name="huyen" id="huyen" class="form-control diachi" required>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 d-flex flex-column justify-content-center">
                    <label for="fullname">Phường, xã</label>
                </div>
                <div class="col">
                    <select name="xa" id="xa" class="form-control diachi" required>
                    </select>
                </div>
            </div>
            <div class="row mb-md-2">
                <div class="col-md-3 d-flex flex-column justify-content-center">
                    <label for="fullname">Địa chỉ nhận hàng</label>
                </div>
                <div class="col">
                    <input class="form-control" type="text" name="address" class="w-100"
                        placeholder="Nhập địa chỉ nhận hàng">
                </div>
            </div>
        </div>
        <div class="p-4 bg-white mt-3">
            <span class="fw-bold">PHƯƠNG THỨC VẬN CHUYỂN</span>
            <hr>
            <div id="tienship" clas="row align-items-center">
                <span>Quý khách vui lòng điền tên và địa chỉ giao nhận trước.</span>
            </div>
        </div>
        <div class="p-4 bg-white mt-3">
            <span class="fw-bold">PHƯƠNG THỨC THANH TOÁN</span>
            <hr>
            <div class="form-check">
                <input value="vnpay" class="form-check-input" type="radio" name="flexRadioDefault"
                    id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    Ví VNPAY
                </label>
            </div>
            <div class="form-check">
                <input value="cod" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Thanh toán bằng tiền mặt khi nhận hàng
                </label>
            </div>
            <span id="show-loithanhtoan" class="text-danger fw-bold d-none ms-2 fst-italic">*Vui lòng chọn 1 phương thức
                thanh
                toán</span>
        </div>
        <div class="p-4 bg-white mt-3">
            <span class="fw-bold">THÔNG TIN KHÁC</span>
            <hr>
            <div class="form-check">
                <input type="checkbox" id="ghichu" class="form-check-input">
                <label for="ghichu">Ghi chú</label>
            </div>
            <div class="form-floating my-2 d-none" id="ghichuContainer">
                <input name="ghichu" type="text" id="nhapghichu" class="form-control"
                    placeholder="Nhập họ tên người mua hàng">
                <label for="nhapghichu">Nhập ghi chú</label>
            </div>
            <div class="form-check">
                <input type="checkbox" id="gtgt" class="form-check-input">
                <label for="gtgt">Xuất hoá đơn GTGT</label>
            </div>
            <p class="ms-3 fw-bold text-danger">*Muasach.vn không giải quyết việc xuất lại hóa đơn cho các trường hợp
                Quý khách
                không
                đăng ký thông tin
            </p>
            <div id="xuathoadon" class="d-none">
                <div class="form-floating mt-2">
                    <input name="gtgt_fullname" type="text" id="nhaphoten" class="mb-3 form-control"
                        placeholder="Họ và tên người mua">
                    <label for="nhaphoten">Họ và tên người mua</label>
                </div>
                <div class="form-floating mt-2">
                    <input name="gtgt_company-name" type="text" id="nhaptencongty" class="mb-3 form-control"
                        placeholder="Nhập tên công ty">
                    <label for="nhaptencongty">Nhập tên công ty</label>
                </div>
                <div class="form-floating mt-2">
                    <input name="gtgt_company-address" type="text" id="nhapdiachi" class="mb-3 form-control"
                        placeholder="Nhập địa chỉ công ty">
                    <label for="nhapdiachi">Nhập địa chỉ công ty</label>
                </div>
                <div class="form-floating mt-2">
                    <input name="gtgt_company-mst" type="text" id="nhaphomasothue" class="mb-3 form-control"
                        placeholder="Nhập địa mã số thuế">
                    <label for="nhaphomasothue">Nhập mã số thuế</label>
                </div>
                <div class="form-floating mt-2">
                    <input type="email" id="emailnhanhoadon" class="mb-3 form-control"
                        placeholder="Nhập email nhận hoá đơn">
                    <label for="emailnhanhoadon">Nhập email nhận hoá đơn</label>
                </div>
            </div>
        </div>
        <div class="p-4 bg-white mt-3" style="margin-bottom: 200px;">
            <span class="fw-bold">KIỂM TRA LẠI ĐƠN HÀNG</span>
            <hr>
            <?php
            foreach ($_SESSION['checkout'] as $product):
                ?>
                <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <img class="img-fluid" style="max-height: 100px;"
                            src="<?= _HOST_ASSETS . '/images/product/' . $product["image"]; ?>"
                            alt="<?= $product["title"]; ?>">
                    </div>
                    <div class="col-md-6 col-3">
                        <?= $product["title"]; ?>
                    </div>
                    <div class="col">
                        <span class="fw-bold"><?= number_format($product["discount"]) ?> đ</span><br>
                        <span class="text-secondary"><del><?= number_format($product["price"]) ?> đ</del></span>
                    </div>
                    <div class="col-1">1</div>
                    <div class="col text-danger fw-bold">
                        <p><?= number_format($product["discount"] * $product["quantity"]) ?> đ</p>
                    </div>
                </div>
                <?php
            endforeach ?>
        </div>
        <div style="box-shadow: 0 -3px 12px rgba(0, 0, 0, 0.5);" class="position-fixed start-0 end-0 bottom-0 bg-white">
            <div class="wrap-content py-3 row align-items-center">
                <div id="tinhtien" class="row mb-3 d-none">
                    <div class="col d-flex flex-column align-items-end">
                        <span>Thành tiền</span>
                        <span>Phí vận chuyển (Giao hàng tiêu chuẩn)</span>
                        <span class="fw-bold my-auto">Tổng Số Tiền (gồm VAT)</span>
                    </div>
                    <div class="col-4 col-md-3 col-lg-2 d-flex flex-column align-items-end">
                        <span><?= number_format($c->totalCheckout($_SESSION['checkout'])) ?> đ</span>
                        <span id="shipfooter">a</span>
                        <span id="tongsotien" class="fw-bold fs-5 text-danger"></span>
                    </div>
                </div>
                <hr>
                <div class="col-md p-0 mb-3 mb-md-0">
                    <div class="form-check my-auto">
                        <input id="dongy" type="checkbox" class="form-check-input me-2" checked>
                        <label for="dongy" class="text-secondary form-check-label">
                            Bằng cách tiến hành Mua Hàng. Bạn đã đồng ý với
                        </label>
                        <a href="https://youtube.com" target="_blank" class="text-decoration-none">Điều khoản & điều
                            kiện của
                            Muasach.vn</a>
                    </div>
                </div>
                <div class="col-md-3 p-0 ">
                    <button type="submit" class="w-100 btn btn-success fw-bold fs-5 shadow-lg"
                        name="xacnhanthanhtoan">Xác nhận thanh
                        toán</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        $('#tinh').change(function () {
            var matp = $(this).val();
            $.ajax({
                url: '',
                type: 'post',
                data: {
                    matp: matp
                },
                success: function (response) {
                    $('#huyen').html(response);
                }
            });
        });
        $('#huyen').change(function () {
            var maqh = $(this).val();
            $.ajax({
                url: '',
                type: 'post',
                data: {
                    maqh: maqh
                },
                success: function (response) {
                    $('#xa').html(response);
                }
            });
        });
        $('#xa').change(function () {
            function formatNumber(amount) {
                let parts = amount.toString().split(".");
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                return parts.join(".");
            }
            var matp = $("#tinh").val();
            // Khởi tạo biến nội dung HTML chung
            var htmlContent =
                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff0000" d="M448 256A192 192 0 1 0 64 256a192 192 0 1 0 384 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 80a80 80 0 1 0 0-160 80 80 0 1 0 0 160zm0-224a144 144 0 1 1 0 288 144 144 0 1 1 0-288zM224 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" /></svg>';

            var tiendon = <?= $c->totalCheckout($_SESSION['checkout']) ?>;
            // Cập nhật phí vận chuyển dựa trên mã tỉnh/thành phố
            if (matp == '01' || matp == '79') {
                htmlContent += '<span class="fw-bold"> Giao hàng tiêu chuẩn: 20.000 đ</span>';
                $('#shipfooter').text('20.000 đ');
                tiendon += 20000;
            } else {
                htmlContent += '<span class="fw-bold"> Giao hàng tiêu chuẩn: 32.000 đ</span>';
                $('#shipfooter').text('32.000 đ');
                tiendon += 32000;
            }


            $("#tongsotien").text(formatNumber(tiendon) + ' đ');

            // Đặt nội dung vào phần tử #tienship
            $('#tienship').html(htmlContent);

            $('#tinhtien').removeClass('d-none');
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#form-thanhtoan').on('submit', function (event) {
            var isChecked = $('input[name="flexRadioDefault"]:checked').length > 0;

            if (!isChecked) {
                $('#show-loithanhtoan').removeClass('d-none');
                event.preventDefault();
                $('#show-loithanhtoan')[0].scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
                event.preventDefault();
            } else {
                $('#show-loithanhtoan').addClass('d-none');
            }
        });
    });
</script>