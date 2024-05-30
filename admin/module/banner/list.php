<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}

$sql = 'SELECT * FROM images WHERE type = "banner"';
$listBanner = $db->getRaw($sql);
if (empty($listBanner))
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
            <li class="breadcrumb-item active" aria-current="page">Banner</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=banner&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=banner&act=add" class="btn btn-success">Thêm mới</a>
    </div>
    <?php if (!empty($smg))
    {
        $f->getSmg($smg, $smg_type);
    } ?>

    <table class="table">
        <thead>
            <th>STT</th>
            <th>Hình</th>
            <th>Trạng thái</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xoá</th>
        </thead>
        <tbody>
            <?php
            // foreach ($listBook as $item)
            $count = 0;
            foreach ($listBanner as $item)
            {
                ?>
                <tr>
                    <td><?= $count += 1 ?></td>
                    <td>
                        <a href="?cmd=banner&act=edit&id=<?= $item['id'] ?>">
                            <img style="max-width: 300px;" src="<?= $f->image_exists($item['image'], 'banner') ?>"
                                alt="Ảnh xem trước">
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=banner&act=edit&id=<?= $item['id'] ?>&status=<?= $item['status'] ?>">
                            <?= $item['status'] == 1 ? '<button class="btn btn-success btn-sm">Hiện</button>' : '<button class="btn btn-danger btn-sm">Ẩn</button>' ?>
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=banner&act=edit&id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=banner&act=delete&id=<?= $item['id'] ?>"
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