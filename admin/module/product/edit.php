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
$filterAll = $f->filter();

if (!(isset($_GET['status']) && ($_GET['status'] == '0' || $_GET['status'] == '1')))
{
    if (!empty($filterAll['id']))
    {
        $userId = $filterAll['id'];
        $user_detail = $db->oneRaw("SELECT * FROM admin WHERE id=$userId");
        if (!empty($user_detail))
        {
            setFlashData('user_detail', $user_detail);
        } else
        {
            $f->redirect("?cmd=product&act=list");
        }
    }
} else
{
    $statusValue = $filterAll['status'];
    if (!empty($filterAll['id']))
    {
        $userId = $filterAll['id'];
        $user_detail = $db->oneRaw("SELECT * FROM products WHERE id=$userId");
        if (!empty($user_detail))
        {
            $dataUpdate['status'] = ($statusValue == 0) ? 1 : 0;
            $condition = "id=$userId";
            $updateStatus = $db->update('products', $dataUpdate, $condition);
            if ($updateStatus)
            {
                setFlashData('updatestatus', 'Sửa thành công');
                setFlashData('smg_type', 'success');
            } else
            {
                setFlashData('updatestatus', 'Sửa không thành công');
                setFlashData('smg_type', 'danger');
            }
        }
    }
    $f->redirect("?cmd=product&act=list");
}



if ($f->isPOST())
{
    // $userId = $filterAll['id'];
    $filterAll = $f->filter();
    $errors = []; //mảng chứa các lỗi
    //validate username
    if (empty($filterAll['username']))
    {
        $errors['username']['required'] = 'Tên người dùng bắt buộc phải nhập';
    } else
    {
        if (strlen($filterAll['username']) < 5)
        {
            $errors['username']['min'] = 'Tên người dùng phải có ít nhất 5 ký tự';
        }
    }
    //validate fullname
    if (empty($filterAll['fullname']))
    {
        $errors['fullname']['required'] = 'Họ tên bắt buộc phải nhập';
    } else
    {
        if (strlen($filterAll['fullname']) < 5)
        {
            $errors['fullname']['min'] = 'Họ tên phải có ít nhất 5 ký tự';
        }
    }
    //validate email
    if (empty($filterAll['email']))
    {
        $errors['email']['required'] = 'Email bắt buộc phải nhập';
    } else
    {
        $email = $filterAll['email'];
        $sql = "SELECT id FROM admin WHERE email = '$email' AND id <> '$userId'";
        if ($db->getRows($sql) > 0)
        {
            $errors['email']['unique'] = 'Email đã tồn tại';
        }
    }
    //validate số điện thoại
    if (empty($filterAll['phone']))
    {
        $errors['phone']['required'] = 'Số điện thoại bắt buộc phải nhập';
    } else
    {
        if (!$f->isPhone($filterAll['phone']))
        {
            $errors['phone']['isPhone'] = 'Số điện thoại không hợp lệ';
        }
    }


    if (!empty($filterAll['password']))
    {
        //validate password confirm
        if (empty($filterAll['password_confirm']))
        {
            $errors['password_confirm']['required'] = 'Bạn phải nhập lại mật khẩu';
        } else
        {
            if ($filterAll['password'] != $filterAll['password_confirm'])
            {
                $errors['password_confirm']['match'] = 'Mật khẩu bạn nhập lại không đúng';
            }
        }
    }

    if (empty($errors))
    {
        //xử lý insert
        $dataUpdate = [
            'username' => $filterAll['username'],
            'fullname' => $filterAll['fullname'],
            'email' => $filterAll['email'],
            'status' => $filterAll['status'],
            'phone_number' => $filterAll['phone'],
            'update_at' => date('Y-m-d H:i:s')
        ];
        if (!empty($filterAll['password']))
        {
            $dataUpdate['password'] = password_hash($filterAll['password'], PASSWORD_DEFAULT);
        }
        $condition = "id=$userId";
        $updateStatus = $db->update('admin', $dataUpdate, $condition);

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
    $f->redirect("?cmd=product&act=edit&id=" . $userId);

}

$f->layout('header_page');
$f->layout('menu_page');


$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');
$user_data = getFlashData('user_detail');
if (!empty($user_data))
{
    $old = $user_data;
}
?>

<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
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
                    <div class="col">
                        <div class="form-group mg-form">
                            <label for="">Tên người dùng</label>
                            <input name="username" type="fullname" class="form-control" placeholder="Tên người dùng"
                                value="<?php
                                echo $f->old('username', $old);
                                ?>">
                            <?php
                            echo $f->formError('username', '<span class="error">', '</span>', $errors);
                            ?>
                        </div>
                        <div class="form-group mg-form">
                            <label for="">Họ và tên</label>
                            <input name="fullname" type="fullname" class="form-control" placeholder="Họ và tên" value="<?php
                            echo $f->old('fullname', $old);
                            ?>">
                            <?php
                            echo $f->formError('fullname', '<span class="error">', '</span>', $errors);
                            ?>
                        </div>
                        <div class="form-group mg-form">
                            <label for="">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Địa chỉ email" value="<?php
                            echo $f->old('email', $old);
                            ?>">
                            <?php
                            echo $f->formError('email', '<span class="error">', '</span>', $errors);
                            ?>
                        </div>
                        <div class="form-group mg-form">
                            <label for="">Số điện thoại</label>
                            <input name="phone" type="number" class="form-control" placeholder="Số điện thoại" value="<?php
                            echo $f->old('phone_number', $old);
                            ?>">
                            <?php
                            echo $f->formError('phone', '<span class="error">', '</span>', $errors);
                            ?>
                        </div>
                        <div class="form-group mg-form">
                            <label for="image">Hình ảnh</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mg-form">
                            <label for="">Mật khẩu</label>
                            <input name="password" type="password" class="form-control"
                                placeholder="Không nhập nếu không thay đổi">
                            <?php
                            echo $f->formError('password', '<span class="error">', '</span>', $errors);
                            ?>
                        </div>
                        <div class="form-group mg-form">
                            <label for="">Nhập lại mật khẩu</label>
                            <input name="password_confirm" type="password" class="form-control"
                                placeholder="Không nhập nếu không thay đổi" value="<?php
                                echo $f->old('password_confirm', $old);
                                ?>">
                            <?php
                            echo $f->formError('password_confirm', '<span class="error">', '</span>', $errors);
                            ?>
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

                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $userId ?>">
                <button type="submit" class="btn btn-primary btn-block mg-btn" style="margin-top: 40px">
                    Cập nhật
                </button>
            </form>
        </div>
    </div>
</main>

<?php
$f->layout('footer_page');
?>