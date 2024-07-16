<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
$listNews = $db->getRaw('SELECT * FROM news WHERE type = "new"');
if (empty($listNews))
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
        <a href="?cmd=new&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=new&act=add" class="btn btn-success">Thêm mới</a>
    </div>
    <?php if (!empty($smg))
    {
        $f->getSmg($smg, $smg_type);
    } ?>
    <table class="table">
        <thead>
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Tiêu đề</th>
            <th width="10%">Trạng thái</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xoá</th>
        </thead>
        <tbody>
            <?php
            $dem = 1;
            foreach ($listNews as $item)
            {
                ?>
                <tr>
                    <td><?= $dem++ ?></td>
                    <td>
                        <a href="?cmd=new&act=edit&id=<?= $item['id'] ?>">
                            <img style="max-width: 90px;" src="<?= $f->image_exists($item['image'], 'new') ?>"
                                alt="Ảnh xem trước">
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=new&act=edit&id=<?= $item['id'] ?>" class="text-decoration-none text-dark">
                            <?= $item['title'] ?>
                        </a>
                    </td>

                    <td>
                        <a href="?cmd=new&act=edit&id=<?= $item['id'] ?>&status=<?= $item['status'] ?>">
                            <?= $item['status'] == 1 ? '<button class="btn btn-success btn-sm">Hiện</button>' : '<button class="btn btn-danger btn-sm">Ẩn</button>' ?>
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=new&act=edit&id=<?= $item['id'] ?>" class="btn btn-success btn-sm"
                            class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="?cmd=new&act=delete&id=<?= $item['id'] ?>" data_id="<?= $item['id'] ?>"
                            class="btn btn-danger btn-sm btn-delete">
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


<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteLabel">Xác nhận xoá</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn chắc chắn muốn xoá bài viết này?
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