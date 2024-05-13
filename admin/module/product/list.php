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
// if ($f->isGET())
// {
//     $status = $filterAll['status'];
//     if ($status == 1)
//     {

//     } else
//     {

//     }
// }
$f->layout('header_page');
$f->layout('menu_page');
$sql = 'SELECT products.*, genres.genre_name, authors.author_name
FROM products
INNER JOIN genres ON products.genre_id = genres.id
INNER JOIN authors ON products.author_id = authors.id;';
$listProduct = $db->getRaw($sql);
$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$smg = getFlashData('updatestatus');
?>
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?cmd=home&act=dashboard">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quản lý sách</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=user&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=user&act=add" class="btn btn-success">Thêm mới</a>
    </div>
    <?php if (!empty($smg))
    {
        $f->getSmg($smg, $smg_type);
    } ?>
    <table class="table">
        <thead>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Tác giả</th>
            <th>Thể loại</th>
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
                        <?= $item['title'] ?>
                    </td>
                    <td>
                        <?= $item['genre_name'] ?>
                    </td>
                    <td>
                        <?= $item['author_name'] ?>
                    </td>
                    <td>
                        <a href="?cmd=product&act=edit&id=<?= $item['id'] ?>&status=<?= $item['status'] ?>">
                            <?= $item['status'] == 1 ? '<button class="btn btn-success btn-sm">Mở</button>' : '<button class="btn btn-danger btn-sm">Đóng</button>' ?>
                        </a>
                    </td>
                    <td>
                        <a href="" class="btn btn-success btn-sm">
                            <i class="fa-regular fa-copy"></i>
                        </a>
                    </td>
                    <!-- nút sửa -->
                    <td>
                        <a href="?cmd=product&act=edit&id=<?= $item['id'] ?>" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="" onclick="return confirm('Bạn có chắc chắc muốn xoá không')"
                            class="btn btn-danger btn-sm">
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