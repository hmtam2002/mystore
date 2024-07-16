<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}

$data = [
    'titlePage' => 'Quản trị website'
];


$sql = 'SELECT products.*, origins.country_name, brands.brand_name
FROM products
INNER JOIN origins ON products.origin_id = origins.id
INNER JOIN brands ON products.brand_id = brands.id
WHERE products.product_type_id = "2"';
$listProduct = $db->getRaw($sql);
if (empty($listProduct))
{
    $smg = setFlashData('smg', 'Không có dữ liệu');
    $smg = setFlashData('smg_type', 'danger');
}
$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');

?>
<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
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
                        <a href="?cmd=stationery&act=delete&id=<?= $item['id'] ?>" data_id="<?= $item['id'] ?>"
                            class="btn btn-danger btn-sm btn-delete">
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

<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteLabel">Xác nhận xoá</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn chắc chắn muốn xoá sản phẩm này?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Xoá</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var deleteUrl = '';

        $('.btn-delete').on('click', function (event) {
            event.preventDefault();
            deleteUrl = $(this).attr('href');
            $('#confirmDeleteModal').modal('show');
        });

        $('#confirmDeleteBtn').on('click', function () {
            window.location.href = deleteUrl;
        });
    });
</script>