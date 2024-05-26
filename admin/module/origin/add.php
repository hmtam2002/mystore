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
    // if (empty($filterAll['author_name']))
    // {
    //     $errors['author_name']['required'] = 'Tên tác giả bắt buộc phải nhập';
    // } else
    // {
    //     if (strlen($filterAll['author_name']) < 5)
    //     {
    //         $errors['author_name']['min'] = 'Tên người dùng phải có ít nhất 5 ký tự';
    //     }
    // }

    if (empty($errors))
    {
        //xử lý insert
        $dataInsert = [
            'country_name' => $filterAll['country_name'],
        ];
        $insertStatus = $db->insert('origins', $dataInsert);
        if ($insertStatus)
        {
            setFlashData('smg', 'Thêm dữ liệu thành công');
            setFlashData('smg_type', 'success');
            $f->redirect('?cmd=origin&act=list');
        } else
        {
            setFlashData('smg', 'Lỗi cơ sở dữ liệu');
            setFlashData('smg_type', 'danger');
            $f->redirect('?cmd=origin&act=add');
        }
    } else
    {
        setFlashData('smg', 'Vui lòng kiểm tra lại dữ liệu');
        setFlashData('smg_type', 'danger');
        setFlashData('errors', $errors);
        setFlashData('old', $filterAll);
        $f->redirect('?cmd=origin&act=add');
    }
}



$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');

?>

<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?cmd=home&act=dashboard">Trang chủ</a></li>
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
                        <input name="country_name" class="form-control" placeholder="Tác giả" value="<?php
                        echo $f->old('country_name', $old);
                        ?>">
                        <?php
                        echo $f->formError('country_name', '<span class="error">', '</span>', $errors);
                        ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mg-btn" style="margin-top: 40px">
                    Thêm
                </button>
            </form>
        </div>
    </div>
</main>