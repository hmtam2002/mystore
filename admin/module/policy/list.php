<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}


$listUser = $db->getRaw('SELECT * FROM authors ORDER BY update_at');
$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$authorStatus = getFlashData('authorStatus');
if (!empty($authorStatus))
{
    $smg = $authorStatus;
}
?>
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?cmd=home&act=dashboard">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chính sách</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=policy&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=policy&act=add" class="btn btn-success">Thêm mới</a>
    </div>
    <?php if (!empty($smg))
    {
        $f->getSmg($smg, $smg_type);
    } ?>
    <table class="table">
        <thead>
            <th>STT</th>
            <th>Tên tác giả</th>
            <th>Trạng thái</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xoá</th>
        </thead>
        <tbody>
            <?php
            $dem = 0;
            foreach ($listUser as $item)
            {
                $dem += 1;
                ?>
                <tr>
                    <td>
                        <?= $dem ?>
                    </td>
                    <td>
                        <a href="?cmd=author&act=edit&id=<?= $item['id'] ?>" class="text-decoration-none text-dark">
                            <?= $item['author_name'] ?>
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=author&act=edit&id=<?= $item['id'] ?>&status=<?= $item['status'] ?>">
                            <?= $item['status'] == 1 ? '<button class="btn btn-success btn-sm">Mở</button>' : '<button class="btn btn-danger btn-sm">Đóng</button>' ?>
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=author&act=edit&id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=author&act=delete&id=<?= $item['id'] ?>"
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