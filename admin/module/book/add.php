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
    //validate price
    if (empty($filterAll['price']))
    {
        $errors['price']['required'] = 'Tiêu đề bắt buộc phải nhập';
    } else
    {
        if (strlen($filterAll['title']) < 5)
        {
            $errors['price']['min'] = 'Tiêu đề phải có ít nhất 5 ký tự';
        }
    }
    //validate discount
    if (empty($filterAll['discount']))
    {
        $errors['discount']['required'] = 'Tiêu đề bắt buộc phải nhập';
    } else
    {
        if (strlen($filterAll['discount']) < 5)
        {
            $errors['discount']['min'] = 'Tiêu đề phải có ít nhất 5 ký tự';
        }
    }

    if (empty($errors))
    {
        //xử lý insert
        $dataInsert = [
            'title' => $filterAll['title'],
            'product_type_id' => '1',
            'slug' => $filterAll['slug'],
            'description' => $_POST['description'],
            'price' => $filterAll['price'],
            'discount' => $filterAll['discount'],
            'author_id' => $filterAll['author_id'],
            'genre_id' => $filterAll['genre_id'],
            'status' => $filterAll['status'],
            'image' => $f->upload('imageUpload'),
            'create_at' => date('Y-m-d H:i:s')
        ];
        $insertStatus = $db->insert('products', $dataInsert);
        if ($insertStatus)
        {
            setFlashData('smg', 'Thêm sách thành công');
            setFlashData('smg_type', 'success');
        } else
        {
            setFlashData('smg', 'Thêm không thành công');
            setFlashData('smg_type', 'danger');
            setFlashData('old', $filterAll);
        }
        $f->redirect('?cmd=book&act=list');
    } else
    {
        setFlashData('smg', 'Vui lòng kiểm tra lại dữ liệu');
        setFlashData('smg_type', 'danger');
        setFlashData('errors', $errors);
        setFlashData('old', $filterAll);
        $f->redirect('?cmd=book&act=add');
    }
}



$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');

?>

<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sách</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=book&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=book&act=add" class="btn btn-success">Thêm mới</a>
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
                            <label for="">Mô tả</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Mô tả">
                                <?php
                                echo $f->old('description', $old);
                                ?>
                                </textarea>
                            <?php
                            echo $f->formError('description', '<span class="error">', '</span>', $errors);
                            ?>
                        </div>
                        <div class="form-group mg-form">
                            <label for="">Giá bán</label>
                            <input name="price" class="form-control" placeholder="Giá bán" value="<?php
                            echo $f->old('price', $old);
                            ?>">
                            <?php
                            echo $f->formError('price', '<span class="error">', '</span>', $errors);
                            ?>
                        </div>
                        <div class="form-group mg-form">
                            <label for="">Giá giảm</label>
                            <input name="discount" class="form-control" placeholder="Giá giảm" value="<?php
                            echo $f->old('discount', $old);
                            ?>">
                            <?php
                            echo $f->formError('discount', '<span class="error">', '</span>', $errors);
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Tác giả</label>
                            <select name="author_id" class="form-control">
                                <?php
                                $authorList = $db->getRaw('SELECT * FROM authors');
                                foreach ($authorList as $item)
                                {
                                    ?>
                                    <option value="<?= $item['id'] ?>" <?= $f->old('status', $old) == 1 ? "selected" : null ?>>
                                        <?= $item['author_name'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Thể loại</label>
                            <select name="genre_id" class="form-control">
                                <?php
                                $genreList = $db->getRaw('SELECT * FROM genres');
                                foreach ($genreList as $item)
                                {
                                    ?>
                                    <option value="<?= $item['id'] ?>" <?= $f->old('status', $old) == 1 ? "selected" : null ?>>
                                        <?= $item['genre_name'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" id="mySelect" class="form-control" style="width: 50% display=block;">
                                <option value="1" <?= $f->old('status', $old) == 1 ? "selected" : null ?>>Đã kích hoạt
                                </option>
                                <option value="0" <?= $f->old('status', $old) == 0 ? "selected" : null ?>>Chưa kích hoạt
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