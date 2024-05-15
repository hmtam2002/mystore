<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
if (!$f->isLogin())
{
    $f->redirect('?cmd=auth&act=login');
}
// $data = [
//     'titlePage' => 'Quản trị website'
// ];
$filterAll = $f->filter();

if (!(isset($_GET['status']) && ($_GET['status'] == '0' || $_GET['status'] == '1')))//nút status
{
    //cho chỉnh sửa thông tin
    if (!empty($filterAll['id']))
    {
        $authorId = $filterAll['id'];
        $author_name = $filterAll['author_name'];
        $author_data = $db->oneRaw("SELECT * FROM authors WHERE id=$authorId");
        if (!empty($author_data))
        {
            setFlashData('author_detail', $author_data);
        } else
        {
            $f->redirect("?cmd=author&act=list");
        }
    }
} else
{
    //cho nút status
    $statusValue = $filterAll['status'];
    if (!empty($filterAll['id']))
    {
        $authorId = $filterAll['id'];
        $author_detail = $db->oneRaw("SELECT * FROM authors WHERE id=$authorId");
        if (!empty($author_detail))
        {
            $dataUpdate['status'] = ($statusValue == 0) ? 1 : 0;
            $condition = "id=$authorId";
            $updateStatus = $db->update('authors', $dataUpdate, $condition);
            if ($updateStatus)
            {
                // setFlashData('authorStatus', 'Sửa thành công');
                // setFlashData('smg_type', 'success');
            } else
            {
                setFlashData('updatestatus', 'Sửa không thành công');
                setFlashData('smg_type', 'danger');
            }
        }
    }
    $f->redirect("?cmd=author&act=list");
}



if ($f->isPOST())
{
    $filterAll = $f->filter();
    $errors = []; //mảng chứa các lỗi
    //validate author_name
    if (empty($filterAll['author_name']))
    {
        $errors['author_name']['required'] = 'Tên tác giả bắt buộc phải nhập';
    } else
    {
        if (strlen($filterAll['author_name']) < 5)
        {
            $errors['author_name']['min'] = 'Tên tác giả phải có ít nhất 5 ký tự';
        } else
        {
            if ($filterAll['author_name'] == $author_name)
            {
                $errors['author_name']['exist'] = 'Bạn chưa sửa tên tác giả';
            }
        }
    }
    if (empty($errors))
    {
        //xử lý insert
        $dataUpdate = [
            'author_name' => $filterAll['author_name'],
            'status' => $filterAll['status'],
            'update_at' => date('Y-m-d H:i:s')
        ];
        $condition = "id=$authorId";
        $updateStatus = $db->update('authors', $dataUpdate, $condition);
        if ($updateStatus)
        {
            setFlashData('smg', 'Sửa thành công');
            setFlashData('smg_type', 'success');
        } else
        {
            setFlashData('smg', 'Sửa không thành công');
            setFlashData('smg_type', 'danger');
        }
    } else
    {
        setFlashData('smg', 'Vui lòng kiểm tra lại dữ liệu');
        setFlashData('smg_type', 'danger');
        setFlashData('errors', $errors);
        setFlashData('old', $filterAll);
    }
    $f->redirect("?cmd=author&act=edit&id=" . $authorId);
}

$f->layout('header_page');
$f->layout('menu_page');


$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');
$author_data = getFlashData('author_detail');
if (!empty($author_data))
{
    $old = $author_data;
}
?>

<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thể loại</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=author&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=author&act=add" class="btn btn-success">Thêm mới</a>
    </div>

    <div class="container">
        <div class="row">
            <?php if (!empty($smg))
            {
                $f->getSmg($smg, $smg_type);
            } ?>
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <div class="form-group mg-form">
                            <label for="">Tác giả</label>
                            <input name="author_name" type="author_name" class="form-control" placeholder="Tác giả"
                                value="<?php
                                echo $f->old('author_name', $old);
                                ?>">
                            <?php
                            echo $f->formError('author_name', '<span class="error">', '</span>', $errors);
                            ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <select name="status" id="mySelect" class="form-control" style="width: 50% display=block;">
                                <option value="1" <?= $f->old('status', $old) == 1 ? "selected" : null ?>>Đã kích hoạt
                                </option>
                                <option value="0" <?= $f->old('status', $old) == 0 ? "selected" : null ?>>Chưa kích hoạt
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $authorId ?>">
                <button type="submit" class="btn btn-primary btn-block mg-btn" style="margin-top: 40px">
                    Cập nhật
                </button>
            </form>
        </div>
    </div>
</main>

<?php
$f->layout('footer_page');
?>