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
if ($f->isPOST())
{
    $filterAll = $f->filter();
    $errors = []; //mảng chứa các lỗi
    //validate author_name
    if (empty($filterAll['genre_name']))
    {
        $errors['genre_name']['required'] = 'Thể loại bắt buộc phải nhập';
    } else
    {
        if (strlen($filterAll['genre_name']) < 5)
        {
            $errors['genre_name']['min'] = 'Thể loại phải có ít nhất 5 ký tự';
        }
    }

    if (empty($errors))
    {
        //xử lý insert
        $dataInsert = [
            'genre_name' => $filterAll['genre_name'],
            'status' => $filterAll['status'],
            'create_at' => date('Y-m-d H:i:s')
        ];
        $insertStatus = $db->insert('genres', $dataInsert);
        if ($insertStatus)
        {
            setFlashData('smg', 'Thêm thể loại thành công');
            setFlashData('smg_type', 'success');
            $f->redirect('?cmd=genre&act=list');
        } else
        {
            setFlashData('smg', 'Lỗi cơ sở dữ liệu');
            setFlashData('smg_type', 'danger');
            $f->redirect('?cmd=genre&act=add');
        }
    } else
    {
        setFlashData('smg', 'Vui lòng kiểm tra lại dữ liệu');
        setFlashData('smg_type', 'danger');
        setFlashData('errors', $errors);
        setFlashData('old', $filterAll);
        $f->redirect('?cmd=genre&act=add');
    }
}
$f->layout('header_page');
$f->layout('menu_page');


$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');

?>

<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?cmd=home&act=dashboard">Trang chủ</a></li>
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
                            <input name="genre_name" class="form-control" placeholder="Thể loại" value="<?php
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

<?php
$f->layout('footer_page');
?>