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
        $productId = $filterAll['id'];
        $product_detail = $db->oneRaw("SELECT * FROM news WHERE id=$productId");
        if (!empty($product_detail))
        {
            setFlashData('product_detail', $product_detail);
        } else
        {
            $f->redirect("?cmd=policy&act=list");
        }
    }
} else
{
    // cho nút status
    $statusValue = $filterAll['status'];
    if (!empty($filterAll['id']))
    {
        $productId = $filterAll['id'];
        $produc_detail = $db->oneRaw("SELECT * FROM news WHERE id=$productId");
        if (!empty($produc_detail))
        {
            $dataUpdate['status'] = ($statusValue == 0) ? 1 : 0;
            $dataUpdate['update_at'] = date('Y-m-d H:i:s');
            $condition = "id=$productId";
            $updateStatus = $db->update('news', $dataUpdate, $condition);
            if ($updateStatus)
            {
                // setFlashData('productStatus', 'Sửa thành công');
                // setFlashData('smg_type', 'success');
            } else
            {
                setFlashData('updatestatus', 'Sửa không thành công');
                setFlashData('smg_type', 'danger');
            }
        }
    }
    $f->redirect("?cmd=policy&act=list");
}



if ($f->isPOST())
{
    // $userId = $filterAll['id'];
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
    //     $sql = "SELECT id FROM admin WHERE email = '$email' AND id <> '$userId'";
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


    // if (!empty($filterAll['password']))
    // {
    //     //validate password confirm
    //     if (empty($filterAll['password_confirm']))
    //     {
    //         $errors['password_confirm']['required'] = 'Bạn phải nhập lại mật khẩu';
    //     } else
    //     {
    //         if ($filterAll['password'] != $filterAll['password_confirm'])
    //         {
    //             $errors['password_confirm']['match'] = 'Mật khẩu bạn nhập lại không đúng';
    //         }
    //     }
    // }

    if (empty($errors))
    {
        //xử lý insert
        $dataUpdate = [
            'title' => $filterAll['title'],
            'slug' => $filterAll['slug'],
            'description' => $_POST['description'],
            'status' => $filterAll['status'],
            'image' => $f->upload('imageUpload'),
            'update_at' => date('Y-m-d H:i:s')
        ];
        if ($dataUpdate['image'] === 'noimage.jpg')
        {
            unset($dataUpdate['image']);
        }

        foreach ($dataUpdate as $key => $value)
        {
            // Nếu giá trị của phần tử là null hoặc rỗng, xóa phần tử đó
            if (is_null($value) || $value === "")
            {
                unset($dataUpdate[$key]);
            }
        }

        $condition = "id=$productId";
        $updateStatus = $db->update('news', $dataUpdate, $condition);

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
    $f->redirect("?cmd=policy&act=edit&id=" . $productId);

}




$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');
$product_data = getFlashData('product_detail');
if (!empty($product_data))
{
    $old = $product_data;
}
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
                            <label for="slugInput" id="slugLabel">Đường dẫn mẫu: localhost/mystore/<?php
                            echo $f->old('slug', $old);
                            ?> </label>
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
                    </div>
                    <div class="col-sm-4">
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
                                alt="Ảnh xem trước" style="max-width: 100%; max-height: 100%;  margin-top: 20px;">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $productId ?>">
                <button type="submit" class="btn btn-primary btn-block mg-btn" style="margin-top: 40px">
                    Cập nhật
                </button>
            </form>
        </div>
    </div>
</main>