<?php
$goods_receipt_list = $db->getRaw('SELECT goods_receipts.*, admin.fullname 
FROM goods_receipts 
JOIN admin ON goods_receipts.admin_id = admin.id 
ORDER BY goods_receipts.create_date DESC');
if (empty($goods_receipt_list))
{
    setFlashData('smg', 'Không có dữ liệu');
    setFlashData('smg_type', 'danger');
}

$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');

?>

<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="?cmd=home&act=dashboard">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách nhập hàng</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <!-- <a href="?cmd=goods_receipts&act=list" class="btn btn-secondary">Quản lý</a> -->
        <a href="?cmd=goods_receipts&act=add" class="btn btn-success">Thêm mới hoá đơn nhập</a>
    </div>
    <?php if (!empty($smg))
    {
        $f->getSmg($smg, $smg_type);
    } ?>
    <table class="table">
        <thead>
            <th width="4%">STT</th>
            <th>Mã đơn nhập</th>
            <th>Ngày nhập</th>
            <th>Nhân viên nhập</th>
            <th>Số lượng</th>
            <th>Còn lại</th>
            <th>Chi tiết</th>
            <!-- <th>Tác giả</th>
            <th>Trạng thái</th>
            <th width="5%">Chép</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xoá</th> -->
        </thead>
        <tbody>
            <?php
            // $goods_receipt_list = $db->getRaw('SELECT * FROM goods_receipts');
            
            $dem = 0;
            foreach ($goods_receipt_list as $item)
            {
                $dem += 1;
                ?>
            <tr>
                <td class="text-center">
                    <?= $dem ?>
                </td>
                <td>
                    <a class="text-decoration-none" href="?cmd=goods_receipts&act=detail&id=<?= $item['id'] ?>">
                        <?= $item['code'] ?>
                    </a>
                </td>
                <td>
                    <a href="?cmd=goods_receipts&act=detail&id=<?= $item['id'] ?>"
                        class="text-decoration-none text-dark">
                        <?= date('H:i:s - d/m/Y', strtotime($item['create_date'])) ?>
                    </a>
                </td>
                <td>
                    <?= $item['fullname'] ?>
                </td>
                <td>
                    <?= number_format($item['total_quantity']) ?>
                </td>
                <td>
                    <?= number_format($item['total_stock_quantity']) ?>
                </td>
                <td>
                    <a href="?cmd=goods_receipts&act=detail&id=<?= $item['id'] ?>">
                        <button class="btn btn-warning btn-sm w-50"><i class="fa-regular fa-eye"></i></button>
                    </a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</main>