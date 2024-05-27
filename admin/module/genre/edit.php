<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}

// $data = [
//     'titlePage' => 'Quản trị website'
// ];
$filterAll = $f->filter();

if (!(isset($_GET['status']) && ($_GET['status'] == '0' || $_GET['status'] == '1')))
{
    if (!empty($filterAll['id']))
    {
        $genreId = $filterAll['id'];
        $genre_detail = $db->oneRaw("SELECT * FROM genres WHERE id=$genreId");
        if (!empty($genre_detail))
        {
            setFlashData('genre_detail', $genre_detail);
        } else
        {
            $f->redirect("?cmd=genre&act=list");
        }
    }
} else
{
    $statusValue = $filterAll['status'];
    if (!empty($filterAll['id']))
    {
        $genreId = $filterAll['id'];
        $genre_detail = $db->oneRaw("SELECT * FROM genres WHERE id=$genreId");
        if (!empty($genre_detail))
        {
            $dataUpdate['status'] = ($statusValue == 0) ? 1 : 0;
            $condition = "id=$genreId";
            $updateStatus = $db->update('genres', $dataUpdate, $condition);
            if ($updateStatus)
            {
                // setFlashData('genreStatus', 'Sửa thành công');
                // setFlashData('smg_type', 'success');
            } else
            {
                setFlashData('genreStatus', 'Sửa không thành công');
                setFlashData('smg_type', 'danger');
            }
        }
    }
    $f->redirect("?cmd=genre&act=list");
}



if ($f->isPOST())
{
    // $userId = $filterAll['id'];
    $filterAll = $f->filter();
    $errors = []; //mảng chứa các lỗi
    //validate genre_name
    if (empty($filterAll['genre_name']))
    {
        $errors['genre_name']['required'] = 'Thể loại dùng bắt buộc phải nhập';
    } else
    {
        if (strlen($filterAll['genre_name']) < 5)
        {
            $errors['genre_name']['min'] = 'Thể loại dùng phải có ít nhất 5 ký tự';
        }
    }

    if (empty($errors))
    {
        //xử lý insert
        $dataUpdate = [
            'genre_name' => $filterAll['genre_name'],
            'status' => $filterAll['status'],
            'update_at' => date('Y-m-d H:i:s')
        ];
        $condition = "id=$genreId";
        $updateStatus = $db->update('genres', $dataUpdate, $condition);
        if ($updateStatus)
        {
            setFlashData('smg', 'Sửa thành công');
            setFlashData('smg_type', 'success');
        } else
        {
            setFlashData('smg', 'Thêm không thành công');
            setFlashData('smg_type', 'danger');
        }
    } else
    {
        setFlashData('smg', 'Vui lòng kiểm tra lại dữ liệu');
        setFlashData('smg_type', 'danger');
        setFlashData('errors', $errors);
        setFlashData('old', $filterAll);
    }
    $f->redirect("?cmd=genre&act=edit&id=" . $genreId);
}



$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');
$genre_data = getFlashData('genre_detail');
if (!empty($genre_data))
{
    $old = $genre_data;
}
?>

<main class="col-md-9 ms-auto col-lg-10 px-md-4 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thể loại</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=genre&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=genre&act=add" class="btn btn-success">Thêm mới</a>
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
                            <label for="">Thể loại</label>
                            <input name="genre_name" type="fullname" class="form-control" placeholder="Tên người dùng"
                                value="<?php
                                echo $f->old('genre_name', $old);
                                ?>">
                            <?php
                            echo $f->formError('genre_name', '<span class="error">', '</span>', $errors);
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
                <input type="hidden" name="id" value="<?php echo $genreId ?>">
                <button type="submit" class="btn btn-primary btn-block mg-btn" style="margin-top: 40px">
                    Cập nhật
                </button>
            </form>
        </div>
    </div>
</main>