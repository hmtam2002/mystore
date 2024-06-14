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
            <th>Hình thức thanh toán</th>
            <th>Tổng giá</th>
            <th>Tình trạng</th>
            <!-- <th width="5%">Chép</th>-->
            <th width="5%">Sửa</th>
            <th width="5%">Xoá</th>
        </thead>
        <tbody>
            <tr>
                <td>we424ei</td>
                <td>Huỳnh Minh Tâm</td>
                <td><?= date('h:i:s A - Y/m/d') ?></td>
                <td>Ship Cod</td>
                <td>90.000đ</td>
                <td>Đang giao</td>
                <!-- nút sửa -->
                <td>
                    <a href="?cmd=book&act=edit&id=<?= $item['id'] ?>" class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
                <!-- nút xoá -->
                <td>
                    <a href="?cmd=book&act=delete&id=<?= $item['id'] ?>"
                        onclick="return confirm('Bạn có chắc chắc muốn xoá không')" class="btn btn-danger btn-sm">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>

            </tr>
            <?php
            $dem = 0;
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
                        <a href="?cmd=book&act=edit&id=<?= $item['id'] ?>" class="text-decoration-none text-dark">
                            <?= $item['title'] ?>
                        </a>
                    </td>
                    <td>
                        <?= $item['genre_name'] ?>
                    </td>
                    <td>
                        <?= $item['author_name'] ?>
                    </td>
                    <td>
                        <a href="?cmd=book&act=edit&id=<?= $item['id'] ?>&status=<?= $item['status'] ?>">
                            <?= $item['status'] == 1 ? '<button class="btn btn-success btn-sm">Mở</button>' : '<button class="btn btn-danger btn-sm">Đóng</button>' ?>
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=book&act=copy&id=<?= $item['id'] ?>" class="btn btn-success btn-sm">
                            <i class="fa-regular fa-copy"></i>
                        </a>
                    </td>
                    <!-- nút sửa -->
                    <td>
                        <a href="?cmd=book&act=edit&id=<?= $item['id'] ?>" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <!-- nút xoá -->
                    <td>
                        <a href="?cmd=book&act=delete&id=<?= $item['id'] ?>"
                            onclick="return confirm('Bạn có chắc chắc muốn xoá không')" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>

                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</main>