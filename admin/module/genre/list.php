<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}

$data = [
    'titlePage' => 'Quản trị website'
];
// if ($f->isGET())
// {
//     $status = $filterAll['status'];
//     if ($status == 1)
//     {

//     } else
//     {

//     }
// }
$listUser = $db->getRaw('SELECT * FROM genres ORDER BY update_at');
$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$genreStatus = getFlashData('genreStatus');
if (!empty($genreStatus))
{
    $smg = $genreStatus;
}
?>
<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="?cmd=home&act=dashboard">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thể loại</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=genre&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=genre&act=add" class="btn btn-success">Thêm mới</a>
    </div>
    <?php if (!empty($smg))
    {
        $f->getSmg($smg, $smg_type);
    } ?>
    <table class="table">
        <thead>
            <th>STT</th>
            <th>Thể loại</th>
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
                        <a href="?cmd=genre&act=edit&id=<?= $item['id'] ?>" class="text-decoration-none text-dark">
                            <?= $item['genre_name'] ?>
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=genre&act=edit&id=<?= $item['id'] ?>&status=<?= $item['status'] ?>">
                            <?= $item['status'] == 1 ? '<button class="btn btn-success btn-sm">Mở</button>' : '<button class="btn btn-danger btn-sm">Đóng</button>' ?>
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=genre&act=edit&id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=genre&act=delete&id=<?= $item['id'] ?>"
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