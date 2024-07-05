<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="?cmd=home&act=dashboard">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đơn hàng</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=order&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=order&act=add" class="btn btn-success">Thêm mới</a>
    </div>
    <?php if (!empty($smg))
    {
        $f->getSmg($smg, $smg_type);
    } ?>
    <table class="table">
        <thead>
            <!-- <th width="4%">STT</th> -->
            <th>Mã đơn</th>
            <th>Họ tên</th>
            <th>Ngày đặt</th>
            <th class="text-center">Hình thức</th>
            <th class="text-end">Tổng giá</th>
            <th class="text-center">Tình trạng</th>
            <!-- <th width="5%">Chép</th>-->
            <th width="5%">Sửa</th>
        </thead>
        <tbody>
            <?php
            $order_list = $db->getRaw('SELECT * FROM orders');
            foreach ($order_list as $order):
                ?>
            <tr>
                <td>
                    <a href="?cmd=order&act=edit&id=<?= $order['id'] ?>"
                        class="text-decoration-none text-danger"><?= $order['code'] ?></a>
                </td>
                <td>
                    <a href="?cmd=order&act=edit&id=<?= $order['id'] ?>"
                        class="text-decoration-none "><?= $order['fullname'] ?></a>
                </td>
                <td>
                    <?= $order['order_date'] ?>
                </td>
                <td class="text-uppercase text-center">
                    <?= $order['payments'] ?>
                </td>
                <td class="text-end fw-bold"><?= number_format($order['total_price']) ?> đ</td>
                <td class="text-center"><?= $order['status'] ?></td>
                <!-- nút sửa -->
                <td>
                    <a href="?cmd=order&act=edit&id=<?= $order['id'] ?>" class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>