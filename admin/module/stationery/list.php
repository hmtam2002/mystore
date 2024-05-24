<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
if (!$f->isLogin())
{
    $f->redirect('?cmd=auth&act=login');
}
$data = [
    'titlePage' => 'Quản trị website'
];

$f->layout('header_page');
$f->layout('menu_page');
$sql = 'SELECT products.*, origins.country_name, brands.brand_name
FROM products
INNER JOIN origins ON products.origin_id = origins.id
INNER JOIN brands ON products.brand_id = brands.id
WHERE products.product_type_id = "2"';
$listProduct = $db->getRaw($sql);
$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$productStatus = getFlashData('productStatus');
if (!empty($productStatus))
{
    $smg = $productStatus;
}
?>
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?cmd=home&act=dashboard">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Văn phòng phẩm</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=stationery&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=stationery&act=add" class="btn btn-success">Thêm mới</a>
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
            <th>Xuất xứ</th>
            <th>Thương hiệu</th>
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
                        <a href="?cmd=stationery&act=edit&id=<?= $item['id'] ?>">
                            <img style="max-width: 90px;" src="<?= $f->image_exists($item['image']) ?>" alt="Ảnh xem trước">
                        </a>

                    </td>
                    <td>
                        <a href="?cmd=stationery&act=edit&id=<?= $item['id'] ?>" class="text-decoration-none text-dark">
                            <?= $item['product_name'] ?>
                        </a>
                    </td>
                    <td>
                        <?= $item['country_name'] ?>
                    </td>
                    <td>
                        <?= $item['brand_name'] ?>
                    </td>
                    <td>
                        <a href="?cmd=stationery&act=edit&id=<?= $item['id'] ?>&status=<?= $item['status'] ?>">
                            <?= $item['status'] == 1 ? '<button class="btn btn-success btn-sm">Mở</button>' : '<button class="btn btn-danger btn-sm">Đóng</button>' ?>
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=stationery&act=copy&id=<?= $item['id'] ?>" class="btn btn-success btn-sm">
                            <i class="fa-regular fa-copy"></i>
                        </a>
                    </td>
                    <!-- nút sửa -->
                    <td>
                        <a href="?cmd=stationery&act=edit&id=<?= $item['id'] ?>" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <!-- nút xoá -->
                    <td>
                        <a href="?cmd=stationery&act=delete&id=<?= $item['id'] ?>"
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

<?php
$f->layout('footer_page');
?>