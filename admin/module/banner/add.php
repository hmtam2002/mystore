<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}

if ($f->isPOST())
{
    $filterAll = $f->filter();
    $errors = []; //mảng chứa các lỗi
    // //validate author_name
    // if (empty($filterAll['genre_name']))
    // {
    //     $errors['genre_name']['required'] = 'Thể loại bắt buộc phải nhập';
    // } else
    // {
    //     if (strlen($filterAll['genre_name']) < 5)
    //     {
    //         $errors['genre_name']['min'] = 'Thể loại phải có ít nhất 5 ký tự';
    //     }
    // }

    if (empty($errors))
    {
        //xử lý insert
        $dataInsert = [
            'image' => $f->upload('imageUpload', 'images/banner'),
            'type' => 'banner',
            'status' => $filterAll['status'],
        ];
        $insertStatus = $db->insert('images', $dataInsert);
        if ($insertStatus)
        {
            setFlashData('smg', 'Thêm slider thành công');
            setFlashData('smg_type', 'success');
            $f->redirect('?cmd=banner&act=list');
        } else
        {
            setFlashData('smg', 'Lỗi cơ sở dữ liệu');
            setFlashData('smg_type', 'danger');
            $f->redirect('?cmd=banner&act=add');
        }
    } else
    {
        setFlashData('smg', 'Vui lòng kiểm tra lại dữ liệu');
        setFlashData('smg_type', 'danger');
        setFlashData('errors', $errors);
        $f->redirect('?cmd=banner&act=add');
    }
}



$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');
$slider_data = getFlashData('slider_detail');
if (!empty($slider_data))
{
    $old = $slider_data;
}
?>

<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Slider</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=banner&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=banner&act=add" class="btn btn-success">Thêm mới</a>
    </div>

    <div class="container">
        <div class="row">
            <?php if (!empty($smg))
            {
                $f->getSmg($smg, $smg_type);
            } ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="imageUpload" id="imageUpload"
                                accept="image/*">
                        </div>
                        <div class="form-group">
                            <img id="previewImage" src="<?= $f->image_exists($f->old('image', $old), 'banner') ?>"
                                alt="Ảnh xem trước" style="max-width: 100%; max-height: 100%;  margin-top: 20px;">
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
                <input type="hidden" name="id" value="<?php echo $sliderId ?>">
                <button type="submit" class="btn btn-primary btn-block mg-btn" style="margin-top: 40px">
                    Cập nhật
                </button>
            </form>
        </div>
    </div>
</main>