<?php
$id = $thongtindonhang['id'];
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
?>
<div id="contentToPrint" class="row shadow col-lg-9 col bg-light m-auto border border-dark p-md-4 py-4 pb-1">
    <p class="fw-bold fs-4 text-center mb-0">Chi tiết đơn hàng</p>
    <p class="fw-bold">Mã hoá đơn: <?= $thongtindonhang['code'] ?></p>
    <div class="col-md d-flex flex-column">
        <span>Ngày mua: <?= date('d/m/Y', strtotime($thongtindonhang['order_date'])) ?></span>
        <span>Thời gian mua <?= date('H:i:s', strtotime($thongtindonhang['order_date'])) ?></span>
        <span>Hình thức thanh toán: <span
                class="text-uppercase fw-bold"><?= $thongtindonhang['payments'] ?></span></span>

    </div>
    <div class="col-md d-flex flex-column mt-3 mt-md-0">
        <span>Khách hàng: <span class="fw-bold"><?= $thongtindonhang['fullname'] ?></span></span>
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
                <td class="text-end"><?= number_format($thongtindonhang['price']) . ' đ' ?></td>
            </tr>
            <tr>
                <th scope="row" colspan="4" class="text-end">Phí vận chuyển:</th>
                <td class="text-end"><?= number_format($thongtindonhang['shipfee']) . ' đ' ?></td>
            </tr>
            <tr>
                <th scope="row" colspan="4" class="text-end">Tổng cộng:</th>
                <td class="text-end"><?= number_format($thongtindonhang['total_price']) . ' đ' ?></td>
            </tr>
        </tfoot>
        </tbody>
    </table>
</div>