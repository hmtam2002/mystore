<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
if ($f->isLogin())
{
    $f->redirect('?cmd=auth&act=login');
}
$data = [
    'pageTitle' => 'Quên mật khẩu'
];
$f->layout("head", $data);
$token = $f->filter()['token'];
if (!empty($token))
{
    $tokenQuery = $db->oneRaw("SELECT id, fullname, email FROM admin WHERE forgot_token = '$token'");
    if (!empty($tokenQuery))
    {
        $userId = $tokenQuery["id"];
        if ($f->isPOST())
        {
            $filterAll = $f->filter();
            $errors = [];
            //validate password
            if (empty($filterAll['password']))
            {
                $errors['password']['required'] = 'Mật khẩu bắt buộc phải nhập';
            } else
            {
                if (strlen($filterAll['password']) < 8)
                {
                    $errors['password']['min'] = 'Mật khẩu phải lớn hơn hoặc bằng 8';
                }
            }
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
            if (empty($errors))
            {
                //xử lý update
                $passwordHash = password_hash($filterAll['password'], PASSWORD_DEFAULT);
                $dataUpdate = [
                    'password' => $passwordHash,
                    'forgot_token' => null,
                    'update_at' => date('Y-m-d H:i:s')
                ];
                $updateStatus = $db->update('admin', $dataUpdate, "id = '$userId'");
                if ($updateStatus)
                {
                    setFlashData('smg', 'Thay đổi mật khẩu thành công');
                    setFlashData('smg_type', 'success');
                    $f->redirect('?cmd=auth&act=login');
                } else
                {
                    setFlashData('smg', 'Lỗi hệ thống, vui lòng thử lại sau');
                    setFlashData('smg_type', 'danger');
                }
            } else
            {
                setFlashData('smg', 'Vui lòng kiểm tra lại dữ liệu');
                setFlashData('smg_type', 'danger');
                setFlashData('errors', $errors);
                $f->redirect('?cmd=auth&act=reset&token=' . $token);
            }
        }
        $smg = getFlashData('smg');
        $smg_type = getFlashData('smg_type');
        $errors = getFlashData('errors');
        ?>

        <!-- Bảng đặt lại mật khẩu -->
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 50px;">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <h2 class="text-center text-uppercase">Đặt lại mật khẩu</h2>
                    <?php if (!empty($smg))
                    {
                        $f->getSmg($smg, $smg_type);
                    } ?>
                    <form action="" method="post">
                        <div class="form-group mg-form">
                            <label for="password">Mật khẩu</label>
                            <input name="password" type="password" class="form-control" placeholder="Mật khẩu" required>
                            <?php echo $f->formError('password', '<span class="error">', '</span>', $errors); ?>
                        </div>
                        <div class="form-group mg-form">
                            <label for="password_confirm">Nhập lại mật khẩu</label>
                            <input name="password_confirm" type="password" class="form-control" placeholder="Nhập lại mật khẩu"
                                required>
                            <?php echo $f->formError('password_confirm', '<span class="error">', '</span>', $errors); ?>
                        </div>
                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                        <button type="submit" class="btn btn-primary btn-block mg-btn">Gửi</button>
                        <hr />
                        <p class="text-center"><a href="?module=auth&action=login">Đăng nhập</a></p>
                    </form>
                </div>
            </div>
        </div>

        <?php

    } else
    {
        $f->getSmg('Liên kết không tồn tại hoặc hết hạn(saii)', 'danger');
    }

} else
{
    $f->getSmg('Liên kết không tồn tại hoặc hết hạn(rỗng)', 'danger');
}

?>
<?php
$f->layout("footer");
?>