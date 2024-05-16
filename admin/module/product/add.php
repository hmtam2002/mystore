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
    // //validate username
    // if (empty($filterAll['username']))
    // {
    //     $errors['username']['required'] = 'Tên người dùng bắt buộc phải nhập';
    // } else
    // {
    //     if (strlen($filterAll['username']) < 5)
    //     {
    //         $errors['username']['min'] = 'Tên người dùng phải có ít nhất 5 ký tự';
    //     }
    // }
    // //validate fullname
    // if (empty($filterAll['fullname']))
    // {
    //     $errors['fullname']['required'] = 'Họ tên bắt buộc phải nhập';
    // } else
    // {
    //     if (strlen($filterAll['fullname']) < 5)
    //     {
    //         $errors['fullname']['min'] = 'Họ tên phải có ít nhất 5 ký tự';
    //     }
    // }
    // //validate email
    // if (empty($filterAll['email']))
    // {
    //     $errors['email']['required'] = 'Email bắt buộc phải nhập';
    // } else
    // {
    //     $email = $filterAll['email'];
    //     $sql = "SELECT id FROM admin WHERE email = '$email' ";
    //     if ($db->getRows($sql) > 0)
    //     {
    //         $errors['email']['unique'] = 'Email đã tồn tại';
    //     }
    // }
    // //validate số điện thoại
    // if (empty($filterAll['phone']))
    // {
    //     $errors['phone']['required'] = 'Số điện thoại bắt buộc phải nhập';
    // } else
    // {
    //     if (!$f->isPhone($filterAll['phone']))
    //     {
    //         $errors['phone']['isPhone'] = 'Số điện thoại không hợp lệ';
    //     }
    // }

    // //validate password
    // if (empty($filterAll['password']))
    // {
    //     $errors['password']['required'] = 'Mật khẩu bắt buộc phải nhập';
    // } else
    // {
    //     if (strlen($filterAll['password']) < 8)
    //     {
    //         $errors['password']['min'] = 'Mật khẩu phải lớn hơn hoặc bằng 8';
    //     }
    // }

    // //validate password confirm
    // if (empty($filterAll['password_confirm']))
    // {
    //     $errors['password_confirm']['required'] = 'Bạn phải nhập lại mật khẩu';
    // } else
    // {
    //     if ($filterAll['password'] != $filterAll['password_confirm'])
    //     {
    //         $errors['password_confirm']['match'] = 'Mật khẩu bạn nhập lại không đúng';
    //     }
    // }

    if (empty($errors))
    {
        //xử lý insert
        $dataInsert = [
            'title' => $filterAll['title'],
            'slug' => $filterAll['slug'],
            'description' => $filterAll['description'],
            'price' => $filterAll['price'],
            'discount' => $filterAll['discount'],
            'author_id' => $filterAll['author_id'],
            'genre_id' => $filterAll['genre_id'],
            'status' => $filterAll['status'],
            'create_at' => date('Y-m-d H:i:s')
        ];
        // echo '<pre>';
        // print_r($dataInsert);
        // echo '</pre>';
        // die();
        $insertStatus = $db->insert('products', $dataInsert);
        if ($insertStatus)
        {
            setFlashData('smg', 'Thêm sách thành công');
            setFlashData('smg_type', 'success');
            // $f->redirect('?cmd=product&act=list');
        } else
        {
            setFlashData('smg', 'Thêm không thành công');
            setFlashData('smg_type', 'danger');
            setFlashData('old', $filterAll);
        }
        $f->redirect('?cmd=product&act=add');
    } else
    {
        setFlashData('smg', 'Vui lòng kiểm tra lại dữ liệu');
        setFlashData('smg_type', 'danger');
        setFlashData('errors', $errors);
        setFlashData('old', $filterAll);
        $f->redirect('?cmd=product&act=add');
    }
}
$f->layout('header_page');
$f->layout('menu_page');


$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');

?>

<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tài khoản</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=user&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=user&act=add" class="btn btn-success">Thêm mới</a>
    </div>

    <div class="container">
        <div class="row">
            <?php if (!empty($smg))
            {
                $f->getSmg($smg, $smg_type);
            } ?>
            <form action="" method="post">
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
                            <input name="title" class="form-control" placeholder="Tiêu đề" value="<?php
                            echo $f->old('title', $old);
                            ?>">
                            <?php
                            echo $f->formError('title', '<span class="error">', '</span>', $errors);
                            ?>
                        </div>
                        <div class="form-group mg-form">
                            <label for="">Mô tả</label>
                            <input name="description" class="form-control" placeholder="Mô tả" value="<?php
                            echo $f->old('description', $old);
                            ?>">
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
                            <label for="">Trạng thái</label>
                            <select name="status" id="mySelect" class="form-control" style="width: 50% display=block;">
                                <option value="1" <?= $f->old('status', $old) == 1 ? "selected" : null ?>>Đã kích hoạt
                                </option>
                                <option value="0" <?= $f->old('status', $old) == 0 ? "selected" : null ?>>Chưa kích hoạt
                                </option>
                            </select>
                        </div>
                        <div class="form-group mg-form">
                            <label for="image">Hình ảnh</label>
                            <input type="file" class="form-control" name="image" id="image">
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