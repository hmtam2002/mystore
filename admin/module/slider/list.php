<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}

// $data = [
//     'titlePage' => 'Quản trị website'
// ];

$sql = 'SELECT * FROM images WHERE type = "slider"';
$listSlider = $db->getRaw($sql);

$smg = getFlashData('smg');
// $smg = 'Load thành công';
$smg_type = getFlashData('smg_type');
// $smg_type = 'success';
$slideStatus = getFlashData('slidertStatus');
// if (!empty($slideStatus))
// {
//     $smg = $slideStatus;
// }


?>
<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="?cmd=home&act=dashboard">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Slider</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=slider&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=slider&act=add" class="btn btn-success">Thêm mới</a>
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
            foreach ($listSlider as $item)
            {
                ?>
                <tr>
                    <td><?= $count += 1 ?></td>
                    <td>
                        <a href="?cmd=slider&act=edit&id=<?= $item['id'] ?>">
                            <img style="max-width: 300px;" src="<?= $f->slider_exists($item['image']) ?>"
                                alt="Ảnh xem trước">
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=slider&act=edit&id=<?= $item['id'] ?>&status=<?= $item['status'] ?>">
                            <?= $item['status'] == 1 ? '<button class="btn btn-success btn-sm">Hiện</button>' : '<button class="btn btn-danger btn-sm">Ẩn</button>' ?>
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=slider&act=edit&id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=slider&act=delete&id=<?= $item['id'] ?>"
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