<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
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
        $author_data = $db->oneRaw("SELECT * FROM origins WHERE id=$authorId");
        if (!empty($author_data))
        {
            setFlashData('author_detail', $author_data);
        } else
        {
            $f->redirect("?cmd=author&act=list");
        }
    }
}

if ($f->isPOST())
{
    $filterAll = $f->filter();
    $errors = []; //mảng chứa các lỗi
    //validate author_name
    // if (empty($filterAll['author_name']))
    // {
    //     $errors['author_name']['required'] = 'Tên tác giả bắt buộc phải nhập';
    // } else
    // {
    //     if (strlen($filterAll['author_name']) < 5)
    //     {
    //         $errors['author_name']['min'] = 'Tên tác giả phải có ít nhất 5 ký tự';
    //     } else
    //     {
    //         if ($filterAll['author_name'] == $author_name)
    //         {
    //             $errors['author_name']['exist'] = 'Bạn chưa sửa tên tác giả';
    //         }
    //     }
    // }
    if (empty($errors))
    {
        //xử lý insert
        $dataUpdate = [
            'country_name' => $filterAll['country_name'],
        ];
        $condition = "id=$authorId";
        $updateStatus = $db->update('origins', $dataUpdate, $condition);
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
    $f->redirect("?cmd=origin&act=edit&id=" . $authorId);
}




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

<main class="col-md-9 ms-auto col-lg-10 px-md-4 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Xuất xứ</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=origin&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=origin&act=add" class="btn btn-success">Thêm mới</a>
    </div>

    <div class="container">
        <div class="row">
            <?php if (!empty($smg))
            {
                $f->getSmg($smg, $smg_type);
            } ?>
            <form action="" method="post">
                <div class="row">
                    <div class="form-group mg-form">
                        <label for="">Xuất xứ</label>
                        <input name="country_name" class="form-control" placeholder="Xuất xứ" value="<?php
                        echo $f->old('country_name', $old);
                        ?>">
                        <?php
                        echo $f->formError('country_name', '<span class="error">', '</span>', $errors);
                        ?>
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