<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}

$data = [
    'titlePage' => 'Quản trị website'
];

$sql = 'SELECT products.*, genres.genre_name, authors.author_name
FROM products
INNER JOIN genres ON products.genre_id = genres.id
INNER JOIN authors ON products.author_id = authors.id
WHERE products.product_type_id = "1"';
$listProduct = $db->getRaw($sql);
$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$productStatus = getFlashData('productStatus');
if (!empty($productStatus))
{
    $smg = $productStatus;
}
?>
<main class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="?cmd=home&act=dashboard">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sách</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=book&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=book&act=add" class="btn btn-success">Thêm mới</a>
    </div>
    <?php if (!empty($smg))
    {
        $f->getSmg($smg, $smg_type);
    } ?>
    <table class="table">
        <thead>
            <th width="4%">STT</th>
            <th>Hình ảnh</th>
            <th>Tiêu đề</th>
            <th>Thể loại</th>
            <th>Tác giả</th>
            <th>Trạng thái</th>
            <th width="5%">Chép</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xoá</th>
        </thead>
        <tbody>
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