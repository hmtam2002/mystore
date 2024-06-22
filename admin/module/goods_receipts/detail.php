<?php
$fillterAll = $f->filter();
$id = $fillterAll['id'];
$goods_receipt_list = $db->oneRaw("SELECT * FROM goods_receipts WHERE id = $id");
$admin_detail = $db->oneRaw("SELECT fullname FROM admin WHERE id = " . $goods_receipt_list['admin_id']);

$goods_receipt_detail_list = $db->getRaw("SELECT * FROM goods_receipt_details WHERE
    goods_receipt_id = $id");
?>


<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <?php
    // echo '<pre>';
    // print_r($goods_receipt_list);
    // echo '</pre>';
    // echo 'id là: ' . $id;
    ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi tiết hoá đơn nhập</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=goods_receipts&act=list" class="btn btn-secondary">Danh sách hoá đơn nhập</a>
        <a href="?cmd=goods_receipts&act=add" class="btn btn-success">Thêm mới</a>
        <div class="btn btn-warning" onclick="printContent()">In hoá đơn</div>
    </div>
    <div id="contentToPrint" class="row shadow col-9 bg-light m-auto border border-dark p-4 pb-1">
        <p class="fw-bold fs-4 text-center mb-0">Chi tiết hoá đơn nhập</p>
        <p class="fw-bold">Mã hoá đơn: <?= $goods_receipt_list['code'] ?></p>
        <div class="col d-flex flex-column">
            <span>Ngày nhập: <?= date('d/m/Y', strtotime($goods_receipt_list['create_date'])) ?></span>
            <span>Thời gian nhập: <?= date('H:i:s', strtotime($goods_receipt_list['create_date'])) ?></span>
            <span>Nhân viên nhập: <span class="fw-bold"><?= $admin_detail['fullname'] ?></span></span>

        </div>
        <div class="col d-flex flex-column">
            <span>Số tiền nhập</span>
            <span>Số lượng nhập</span>
        </div>
        <p class="mt-3 mb-0 text-center fw-bold">Danh sách sản phẩm nhập</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Chủng loại</th>
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
                foreach ($goods_receipt_detail_list as $item):
                    $product_info = $db->oneRaw("SELECT title,product_name,product_type_id FROM products WHERE id = " . $item['product_id']);
                    $total_price += $item['quantity'] * $item['total_price'];
                    ?>
                <tr>
                    <th scope="row">
                        <?= $dem++ ?>
                    </th>
                    <td>
                        <?= $product_info['product_type_id'] == "1" ? "Sách" : "Văn phòng phẩm" ?>
                    </td>
                    <td>
                        <?= $product_info['product_type_id'] == "1" ? $product_info['title'] : $product_info['product_name'] ?>
                    </td>
                    <td class="text-end">
                        <?= number_format($item['total_price']) . ' đ' ?>
                    </td>
                    <td class="text-end">
                        <?= number_format($item['quantity']) ?>
                    </td>
                    <td class="text-end">
                        <?= number_format($item['quantity'] * $item['total_price']) . ' đ' ?>
                    </td>
                </tr>
                <?php endforeach ?>
            <tfoot>
                <tr>
                    <th scope="row" colspan="4" class="text-end">Tổng cộng:</th>
                    <td class="text-end"><?= $goods_receipt_list['total_quantity'] ?></td>
                    <td class="text-end"><?= number_format($total_price) . ' đ' ?></td>
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