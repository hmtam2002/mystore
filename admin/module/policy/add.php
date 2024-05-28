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
    //validate slug
    if (empty($filterAll['slug']))
    {
        $errors['slug']['required'] = 'Đường dẫn bắt buộc phải nhập';
    } else
    {
        if (strlen($filterAll['slug']) < 5)
        {
            $errors['slug']['min'] = 'Đường dẫn phải có ít nhất 5 ký tự';
        }
    }
    //validate title
    if (empty($filterAll['title']))
    {
        $errors['title']['required'] = 'Tiêu đề bắt buộc phải nhập';
    } else
    {
        if (strlen($filterAll['title']) < 5)
        {
            $errors['title']['min'] = 'Tiêu đề phải có ít nhất 5 ký tự';
        }
    }


    if (empty($errors))
    {
        //xử lý insert
        $dataInsert = [
            'slug' => $filterAll['slug'],
            'title' => $filterAll['title'],
            'description' => $_POST['description'],
            'type' => 'policy',
            'image' => $f->upload('imageUpload', 'images/new'),
            'status' => $filterAll['status'],
            'create_at' => date('Y-m-d H:i:s')
        ];
        if ($dataInsert['image'] === 'noimage.jpg')
        {
            unset($dataInsert['image']);
        }
        $insertStatus = $db->insert('news', $dataInsert);
        if ($insertStatus)
        {
            setFlashData('smg', 'Thêm bài viết thành công');
            setFlashData('smg_type', 'success');
        } else
        {
            setFlashData('smg', 'Thêm không thành công');
            setFlashData('smg_type', 'danger');
            setFlashData('old', $filterAll);
        }
        $f->redirect('?cmd=policy&act=list');
    } else
    {
        setFlashData('smg', 'Vui lòng kiểm tra lại dữ liệu');
        setFlashData('smg_type', 'danger');
        setFlashData('errors', $errors);
        setFlashData('old', $filterAll);
        $f->redirect('?cmd=policy&act=add');
    }
}



$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');

?>

<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bài viết</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=policy&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=policy&act=add" class="btn btn-success">Thêm mới</a>
    </div>

    <div class="container">
        <div class="row">
            <?php if (!empty($smg))
            {
                $f->getSmg($smg, $smg_type);
            } ?>
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group mg-form">
                            <label for="slugInput" id="slugLabel">Đường dẫn mẫu: localhost/mystore/ </label>
                            <input name="slug" id="slugInput" class="form-control" placeholder="Đường dẫn" value="<?php
                            echo $f->old('slug', $old);
                            ?>">
                            <?php
                            echo $f->formError('slug', '<span class="error">', '</span>', $errors);
                            ?>
                        </div>
                        <div class="form-group mg-form">
                            <label for="">Tiêu đề</label>
                            <input id="title" name="title" class="form-control" placeholder="Tiêu đề" value="<?php
                            echo $f->old('title', $old);
                            ?>">
                            <?php
                            echo $f->formError('title', '<span class="error">', '</span>', $errors);
                            ?>
                        </div>
                        <div class="form-group mg-form">
                            <label for="">Nội dung</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Mô tả">
                                <?php
                                echo $f->old('description', $old);
                                ?>
                                </textarea>
                            <?php
                            echo $f->formError('description', '<span class="error">', '</span>', $errors);
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" id="mySelect" class="form-control" style="width: 50% display=block;">
                                <option value="1" <?= $f->old('status', $old) == 1 ? "selected" : null ?>>Hiện
                                </option>
                                <option value="0" <?= $f->old('status', $old) == 0 ? "selected" : null ?>>Ẩn
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="imageUpload" id="imageUpload"
                                accept="image/*">
                        </div>
                        <div class="form-group">
                            <img id="previewImage" src="<?= $f->image_exists($f->old('image', $old)) ?>"
                                alt="Ảnh xem trước" style="max-width: 100%; max-height: 100%; margin-top: 20px;">
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