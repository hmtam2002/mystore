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



$listUser = $db->getRaw('SELECT * FROM admin ORDER BY update_at');
?>
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?cmd=home&act=dashboard">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Slider</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=slider&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=slider&act=add" class="btn btn-success">Thêm mới</a>
    </div>

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
            for ($i = 1; $i < 6; $i++)
            {
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td>Slider số <?= $i ?></td>
                    <td>
                        <?= $item['status'] == 1 ? '<button class="btn btn-success btn-sm">Đã kích hoạt</button>' : '<button class="btn btn-danger btn-sm">Chưa kích hoạt</button>' ?>
                    </td>
                    <td>
                        <a href="" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="" onclick="return confirm('Bạn có chắc chắc muốn xoá không')"
                            class="btn btn-danger btn-sm">
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

<?php
$f->layout('footer_page');
?>