<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}

// $data = [
//     'titlePage' => 'Quản trị website'
// ];
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
            $errors['author_name']['min'] = 'Tên người dùng phải có ít nhất 5 ký tự';
        }
    }

    if (empty($errors))
    {
        //xử lý insert
        $dataInsert = [
            'author_name' => $filterAll['author_name'],
            'status' => $filterAll['status'],
            'create_at' => date('Y-m-d H:i:s')
        ];
        $insertStatus = $db->insert('authors', $dataInsert);
        if ($insertStatus)
        {
            setFlashData('smg', 'Thêm tác giả thành công');
            setFlashData('smg_type', 'success');
            $f->redirect('?cmd=author&act=list');
        } else
        {
            setFlashData('smg', 'Lỗi cơ sở dữ liệu');
            setFlashData('smg_type', 'danger');
            $f->redirect('?cmd=author&act=add');
        }
    } else
    {
        setFlashData('smg', 'Vui lòng kiểm tra lại dữ liệu');
        setFlashData('smg_type', 'danger');
        setFlashData('errors', $errors);
        setFlashData('old', $filterAll);
        $f->redirect('?cmd=author&act=add');
    }
}

$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');

?>


<main class="col-md-9 ms-auto col-lg-10 px-md-4 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="?cmd=home&act=dashboard">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tác giả</li>
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
            <form method="post">
                <div class="row">
                    <div class="col">
                        <div class="form-group mg-form">
                            <label for="">Tác giả</label>
                            <input name="author_name" class="form-control" placeholder="Tác giả" value="<?php
                            echo $f->old('username', $old);
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
                                <option value="1" selected>Đã kích hoạt
                                </option>
                                <option value="0">Chưa kích hoạt
                                </option>
                            </select>
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mg-btn" style="margin-top: 40px">
                    Thêm
                </button>
            </form>
        </div>
    </div>
</main>