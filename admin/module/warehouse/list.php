<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="?cmd=home&act=dashboard">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kho hàng</li>
        </ol>
    </nav>
    <!-- <div class="btn-group mb-3">
        <a href="?cmd=wherehouse&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=wherehouse&act=add" class="btn btn-success">Thêm mới</a>
    </div> -->
    <a href="">
        <div class="btn btn-success mb-3">Cập nhật kho hàng</div>
    </a>
    <?php if (!empty($smg))
    {
        $f->getSmg($smg, $smg_type);
    } ?>
    <table class="table">
        <thead>
            <th width="4%">STT</th>
            <th>Hình ảnh</th>
            <th>Loại</th>
            <th>Tiêu đề</th>
            <th>Số lượng tồn</th>
            <!-- <th>Thể loại</th>
            <th>Tác giả</th>
            <th>Trạng thái</th>
            <th width="5%">Chép</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xoá</th> -->
        </thead>
        <tbody>
            <?php
            $dem = 0;
            $sql = 'SELECT * FROM products';
            $listProduct = $db->getRaw($sql);
            foreach ($listProduct as $item)
            {
                $dem += 1;
                ?>
            <tr>
                <td>
                    <?= $dem ?>
                </td>
                <td>
                    <a href="?cmd=book&act=edit&id=<?= $item['id'] ?>">
                        <img style="max-width: 90px;" src="<?= $f->image_exists($item['image']) ?>" alt="Ảnh xem trước">
                    </a>
                </td>
                <td>
                    <?= $item['product_type_id'] == '1' ? 'Sách' : 'Văn phòng phẩm' ?>
                </td>
                <td>
                    <a href="?cmd=book&act=edit&id=<?= $item['id'] ?>" class="text-decoration-none text-dark">
                        <?= $item['product_type_id'] == '1' ? $item['title'] : $item['product_name'] ?>
                    </a>
                </td>
                <td>
                    <?= $item['stock_quantity'] ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</main>