<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
//Kiểm tra đăng nhập
// if ($f->isLogin())
// {
//     $f->redirect("?cmd=home&act=dashboard");
// }
$data = [
    'titlePage' => 'Đăng nhập'
];
$f->layout('head', $data);
if ($f->isPOST())
{
    $filterAll = $f->filter();
    if (!empty(trim($filterAll['email'])) && !empty(trim($filterAll['password'])))
    {
        //kiểm tra đăng nhập
        $email = $filterAll['email'];
        $password = $filterAll['password'];
        //truy vấn lấy thông tin theo email
        $userQuery = $db->oneRaw("SELECT password,id,fullname FROM admin WHERE email = '$email'");


        if (!empty($userQuery))
        {
            $passwordHash = $userQuery['password'];
            $admin_id = $userQuery['id'];
            $fullname = $userQuery['fullname'];
            if (password_verify($password, $passwordHash))
            {
                //tạo token login
                $tokenLogin = sha1(uniqid() . time());
                //insert vào bảng loginToken
                $dataInsert = [
                    'admin_id' => $admin_id,
                    'token' => $tokenLogin,
                    'create_at' => date('Y-m-d H:i:s')
                ];
                $insertStatus = $db->insert('adminToken', $dataInsert);
                if ($insertStatus)
                {
                    //insert thành công
                    //lưu login token vào session
                    setSession('loginToken', $tokenLogin);
                    setSession('adminName', $fullname);
                    setSession('admin_id', $admin_id);
                    $f->redirect('?cmd=home&act=dashboard');
                } else
                {
                    setFlashData('smg', 'Không thể đăng nhập, vui lòng thử lại sau');
                    setFlashData('smg_type', 'danger');
                }
            } else
            {
                setFlashData('smg', 'Mật khẩu sai');
                setFlashData('smg_type', 'danger');
                setFlashData('old', $filterAll);
            }
        } else
        {
            setFlashData('smg', 'Email không tồn tại');
            setFlashData('smg_type', 'danger');
        }
    } else
    {
        setFlashData('smg', 'Vui lòng nhập email và mật khẩu');
        setFlashData('smg_type', 'danger');
    }
    $f->redirect('?cmd=auth&act=login');
}
$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$old = getFlashData('old');
?>



<div class="container">
    <div class="row justify-content-center" style="margin-top: 50px;">
        <div class="col-lg-4 col-md-6 col-sm-8">
            <h2 class="text-center text-uppercase">Đăng nhập quản trị</h2>
            <?php if (!empty($smg))
            {
                $f->getSmg($smg, $smg_type);
            } ?>
            <form action="" method="post">
                <div class="form-group mg-form">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" placeholder="Địa chỉ email"
                        value="<?php echo $f->old('email', $old); ?>" required>
                </div>
                <div class="form-group mg-form">
                    <label for="passwordField">Mật khẩu</label>
                    <input name="password" type="password" class="form-control" placeholder="Mật khẩu"
                        value="<?php echo $f->old('password', $old); ?>" id="passwordField" required>
                    <div class="form-group form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="showPasswordCheckbox">
                        <label class="form-check-label" for="showPasswordCheckbox">Hiện mật khẩu</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mg-btn">Đăng nhập</button>
                <hr />
                <p class="text-center"><a href="?cmd=auth&act=forgot">Quên mật khẩu</a></p>
            </form>
        </div>
    </div>
</div>
<?php
$f->layout('footer');
?>