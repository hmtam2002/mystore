<?php
$goods_receipt_list = $db->getRaw('SELECT goods_receipts.*,admin.fullname FROM goods_receipts JOIN admin ON goods_receipts.admin_id = admin.id;');
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
                        <?= $item['code'] ?>
                    </td>

                    <td>
                        <a href="?cmd=book&act=edit&id=<?= $item['id'] ?>" class="text-decoration-none text-dark">
                            <?= $item['create_date'] ?>
                        </a>
                    </td>
                    <td>
                        <?= $item['fullname'] ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</main>