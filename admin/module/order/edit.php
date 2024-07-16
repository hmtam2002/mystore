<?php
if ($f->isPOST() && isset($_POST['capnhat']) || isset($_POST['huydon']))
{
    $fillterAll = $f->filter();
    if (isset($_POST['capnhat']))
    {
        $id = $fillterAll['id'];
        $status_after = $fillterAll['status'] + 1;
        $status_update = $db->query("UPDATE orders SET status = $status_after WHERE id = $id");
        if ($status_update)
        {
            $data = [
                'order_id' => $id,
                'admin_id' => getSession('admin_id'),
                'step_name' => $f->trangthai($status_after),
                'note' => $fillterAll['ghichu'],
                'update_at' => date('Y-m-d H:i:s')
            ];
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            $db->insert('order_step', $data);
        } else
            echo 'thất bại';
    }
    if (isset($_POST['huydon']))
    {
        // Nhập lại số lượng đã mua vào kho

    }
}

$id = $_GET['id'];
$order_detail = $db->oneRaw("SELECT * FROM orders WHERE id = '$id'");
// Lấy thông tin xã
$xa_id = $order_detail['xa'];
$xa = $db->oneRaw("SELECT name FROM xaphuongthitran WHERE xaid = '$xa_id'")['name'];
// Lấy thông tin huyện
$huyen_id = $order_detail['huyen'];
$huyen = $db->oneRaw("SELECT name FROM quanhuyen WHERE maqh = '$huyen_id'")['name'];
// Lấy thông tin tỉnh
$tinh_id = $order_detail['tinh'];
$tinh = $db->oneRaw("SELECT name FROM tinhthanhpho WHERE matp = '$tinh_id'")['name'];
$diachi = $order_detail['address'] . ', ' . $xa . ', ' . $huyen . ', ' . $tinh;
$trangthai = $f->trangthai($order_detail['status']);
if (empty($order_detail['gtgt-fullname']))
{
    $VAT_Status = false;
} else
{
    $VAT_Status = true;
}
?>

<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="?cmd=home&act=dashboard">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đơn hàng</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=order&act=list" class="btn btn-secondary">Danh sách đơn hàng</a>
        <!-- <a href="?cmd=order&act=add" class="btn btn-success">Thêm mới</a> -->
        <div class="btn btn-warning" onclick="printContent()">In hoá đơn</div>
    </div>
    <?php
    if ($VAT_Status)
    {
        require_once 'yeucauVAT.php';
    }
    ?>
    <p class="text-center fw-bold fs-4">Trạng thái đơn hàng</p>
    <div class="col col-lg-8 mx-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>Trạng thái đơn</th>
                    <th>Cập nhật bởi</th>
                    <th class="text-center">Ngày cập nhật</th>
                    <th>Ghi chú</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Đã tiếp nhận
                    </td>
                    <td>
                        Khách hàng
                    </td>
                    <td class="text-end">
                        <?= date('H:i:s - d/m/Y', strtotime($order_detail['order_date'])) ?>
                    </td>
                    <td class="text-uppercase"><?= $order_detail['payments'] ?></td>
                </tr>
                <?php
                if ($order_detail['status'] != 1):
                    $order_step = $db->getRaw(" SELECT order_step.*, admin.fullname
                                                FROM order_step
                                                JOIN admin ON order_step.admin_id = admin.id
                                                WHERE order_step.order_id = $id
                                                ORDER BY update_at ASC");
                    // echo '<pre>';
                    // print_r($order_step);
                    // echo '</pre>';
                    foreach ($order_step as $item):
                        ?>
                        <tr>
                            <td><?= $item['step_name'] ?></td>
                            <td class="fw-bold"><?= $item['fullname'] ?></td>
                            <td class="text-end"><?= date('H:i:s - d/m/Y', strtotime($item['update_at'])) ?></td>
                            <td><?= $item['note'] ?></td>
                        </tr>
                    <?php endforeach; endif; ?>
            </tbody>
        </table>
        <form method="post" class="<?= $order_detail['status'] == 4 ? 'd-none' : '' ?>">
            <div class="mb-1">
                <input type="checkbox" class="form-check-input" id="datiepnhan">
                <label for="datiepnhan"
                    class="ms-2 form-label"><?= $f->trangthai($order_detail['status'] + 1) ?></label>
            </div>
            <div class="form-floating mb-3 d-none" id="capnhatinput">
                <textarea class="form-control" placeholder="Ghi chú" name="ghichu" id="note"></textarea>
                <label for="note">Ghi chú</label>
            </div>
            <div class="">
                <input type="checkbox" class="form-check-input" id="huydon">
                <label for="huydon" class="ms-2 form-label">Huỷ đơn</label>
            </div>
            <div class="form-floating mb-3 d-none" id="huydoninput">
                <textarea class="form-control" placeholder="" name="lydo" id="lydo"></textarea>
                <label for="lydo">Lý do</label>
            </div>
            <input type="hidden" name="status" value="<?= $order_detail['status'] ?>">
            <input type="hidden" name="id" value="<?= $id ?>">
            <button type="submit" name="capnhat" id="btn-update" class="btn btn-success" disabled>Cập nhật đơn
                hàng</button>
            <button type="submit" name="huydon" id="btn-cancel" class="btn btn-danger" disabled>Huỷ đơn</button>
        </form>
    </div>
    <p class="text-center fw-bold fs-4">Thông tin chính</p>
    <div class="row shadow col-md-9 col bg-light m-auto border border-dark p-md-4 pb-md-1 px-2 py-4 pb-1 mb-5">
        <div class="col-md">
            <p>Họ và tên: <span class="fw-bold"><?= $order_detail['fullname'] ?></span></p>
            <p>Địa chỉ email: <span class="fw-bold"><?= $order_detail['email'] ?></span></p>
            <p>Địa chỉ giao hàng: <span class="fw-bold"><?= $diachi ?></span></p>
            <p>Số điện thoại: <span class="fw-bold"><?= $order_detail['phone_number'] ?></span></p>
        </div>
        <div class="col-md">
            <p>Trạng thái đơn hàng: <span class="fw-bold"><?= $trangthai ?></span></p>
            <p>Ghi chú: <span
                    class="fw-bold"><?= empty($order_detail['note']) ? 'Không' : $order_detail['note'] ?></span>
            </p>
            <p>Yêu cầu xuất VAT: <span class="fw-bold"><?= $VAT_Status ? 'có' : 'Không' ?></span></p>
        </div>
    </div>
    <div id="contentToPrint" class="row shadow col-md-9 col bg-light m-auto border border-dark p-md-4 px-2 py-4 pb-1">
        <p class="fw-bold fs-4 text-center mb-0">Chi tiết hoá đơn</p>
        <p class="fw-bold">Mã hoá đơn: <?= $order_detail['code'] ?></p>
        <div class="col-md d-flex flex-column">
            <span>Ngày mua: <?= date('d/m/Y', strtotime($order_detail['order_date'])) ?></span>
            <span>Thời gian mua <?= date('H:i:s', strtotime($order_detail['order_date'])) ?></span>
            <span>Hình thức thanh toán: <span
                    class="text-uppercase fw-bold"><?= $order_detail['payments'] ?></span></span>

        </div>
        <div class="col-md mt-3 mt-md-0 d-flex flex-column">
            <span>Khách hàng: <span class="fw-bold"><?= $order_detail['fullname'] ?></span></span>
            <span>Địa chỉ: <span class="fw-bold"><?= $diachi ?></span></span>
        </div>
        <p class="mt-3 mb-0 text-center fw-bold fs-5">Danh sách sản phẩm</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col" class="text-end">Giá thành phần</th>
                    <th scope="col" class="text-end">Số lượng</th>
                    <th scope="col" class="text-end">Tổng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $dem = 1;
                $total_price = 0;
                $order_list = $db->getRaw("SELECT * FROM order_details WHERE order_id = '$id'");
                foreach ($order_list as $item):
                    $total_price += $item['quantity'] * $item['total_price'];
                    $product_id = $item['product_id'];
                    $product_info = $db->oneRaw("SELECT * FROM products WHERE id  = '$product_id'");
                    ?>
                    <tr>
                        <th scope="row">
                            <?= $dem++ ?>
                        </th>
                        <td>
                            <?= $product_info['product_type_id'] == "1" ? $product_info['title'] : $product_info['product_name'] ?>
                        </td>
                        <td class="text-end">
                            <?= number_format($item['discount']) . ' đ' ?>
                        </td>
                        <td class="text-end">
                            <?= number_format($item['quantity']) ?>
                        </td>
                        <td class="text-end">
                            <?= number_format($item['quantity'] * $item['discount']) . ' đ' ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            <tfoot>
                <tr>
                    <th scope="row" colspan="4" class="text-end">Tạm tính</th>
                    <td class="text-end"><?= number_format($order_detail['price']) . ' đ' ?></td>
                </tr>
                <tr>
                    <th scope="row" colspan="4" class="text-end">Phí vận chuyển:</th>
                    <td class="text-end"><?= number_format($order_detail['shipfee']) . ' đ' ?></td>
                </tr>
                <tr>
                    <th scope="row" colspan="4" class="text-end">Tổng cộng:</th>
                    <td class="text-end"><?= number_format($order_detail['total_price']) . ' đ' ?></td>
                </tr>
            </tfoot>
            </tbody>
        </table>
    </div>
</main>
<script>
    function printContent() {
        var content = $("#contentToPrint").html(); // Sử dụng jQuery để lấy nội dung của phần tử có id là contentToPrint
        var originalBody = $("body").html(); // Lưu lại nội dung ban đầu của thẻ body

        $("body").html(content); // Thay thế nội dung của thẻ body bằng nội dung cần in
        window.print(); // Gọi hàm in của trình duyệt

        $("body").html(originalBody); // Khôi phục lại nội dung ban đầu của thẻ body
    }
</script>
<script>
    $(document).ready(function () {
        $('#datiepnhan').change(function () {
            if ($(this).is(':checked')) {
                // Mở input ghi chú và required thẻ input
                $('#note').attr('required', 'required');
                $('#capnhatinput').removeClass('d-none');

                // Hiển thị nút cập nhật đơn
                $('#btn-update').prop('disabled', false);

                // bỏ check huỷ đơn và disable nút huỷ đơn
                $('#huydon').prop('checked', false);
                $('#btn-cancel').prop('disabled', true);

                // Bỏ required lý do và ẩn thẻ input lý do
                $('#huydoninput').addClass('d-none');
                $('#lydo').removeAttr('required');
            } else {
                // ẩn nút cập nhật đơn hàng
                $('#btn-update').prop('disabled', true);

                // Ẩn thẻ input của ghi chú
                $('#capnhatinput').addClass('d-none');
            }
        });

        $('#huydon').change(function () {
            if ($(this).is(':checked')) {
                // hiện lý do và required
                $('#huydoninput').removeClass('d-none');
                $('#lydo').attr('required', 'required');

                // Hiển thị nút huỷ đơn
                $('#btn-cancel').prop('disabled', false);

                // Bỏ check cập nhật và disable nút cập nhật
                $('#btn-update').prop('disabled', true);
                $('#datiepnhan').prop('checked', false);


                // bỏ required và ẩn thẻ input ghi chú
                $('#capnhatinput').addClass('d-none');
                $('#note').removeAttr('required');
            } else {
                // Ẩn nút huỷ đơn hàng
                $('#btn-cancel').prop('disabled', true);

                // Ẩn các thẻ input của huỷ đơn
                $('#huydoninput').addClass('d-none');
            }
        });
    });
</script>