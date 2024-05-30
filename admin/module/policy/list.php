<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}

// $data = [
//     'titlePage' => 'Quản trị website'
// ];

$listPolicy = $db->getRaw('SELECT * FROM news WHERE type = "policy"');
if (empty($listPolicy))
{
    $smg = setFlashData('smg', 'Không có dữ liệu');
    $smg = setFlashData('smg_type', 'danger');
}
$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
?>
<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="?cmd=home&act=dashboard">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bài viết</li>
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
            <th>Tiêu đề</th>
            <th width="10%">Trạng thái</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xoá</th>
        </thead>
        <tbody>
            <?php
            $dem = 1;
            foreach ($listPolicy as $item)
            {
                ?>
                <tr>
                    <td><?= $dem++ ?></td>
                    <td>
                        <a href="?cmd=policy&act=edit&id=<?= $item['id'] ?>" class="text-decoration-none text-dark">
                            <?= $item['title'] ?>
                        </a>
                    </td>

                    <td>
                        <a href="?cmd=policy&act=edit&id=<?= $item['id'] ?>&status=<?= $item['status'] ?>">
                            <?= $item['status'] == 1 ? '<button class="btn btn-success btn-sm">Hiện</button>' : '<button class="btn btn-danger btn-sm">Ẩn</button>' ?>
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=policy&act=edit&id=<?= $item['id'] ?>" class="btn btn-success btn-sm"
                            class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=policy&act=delete&id=<?= $item['id'] ?>"
                            onclick="return confirm('Bạn có chắc chắc muốn xoá không')" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>

    </table>

</main>