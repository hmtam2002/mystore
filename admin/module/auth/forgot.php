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
    "titlePage" => "Quên mật khẩu",
];
$f->layout('head', $data);

if ($f->isPOST())
{
    $filterAll = $f->filter();
    if (!empty($filterAll['email']))
    {
        $email = $filterAll['email'];

        $queryUser = $db->oneRaw("SELECT id FROM admin WHERE email = '$email'");
        if (!empty($queryUser))
        {
            $userId = $queryUser["id"];
            //tạo forgot token cho nó
            $forgotToken = sha1(uniqid() . time());

            $dataUpdate = [
                "forgot_token" => $forgotToken,
            ];

            $updateStatus = $db->update("admin", $dataUpdate, "id=$userId");
            if ($updateStatus)
            {
                //tạo link reset khôi phục mật khẩu
                $linkReset = _HOST . '/admin?cmd=auth&act=reset&token=' . $forgotToken;
                //gửi mail cho người dùng
                $subject = 'Yêu cầu khôi phục mật khẩu.';
                $content = '<p>Chào bạn</p>';
                $content .= '<p>Chúng tôi nhận được yêu cầu khôi phục mật khẩu từ bạn. Vui lòng Click vào nút sau để đổi lại mật khẩu:</p>';
                $content .= '<a href="' . $linkReset . '" style="padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Khôi phục mật khẩu</a>' . '<br>';
                $content .= '<p>Vui lòng cảm ơn.</p>';
                // <a href="linkReset"></a>
                // <a href="$linkReset" style="padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Khôi phục mật khẩu</a>

                $sendMail = $f->sendMail($email, $subject, $content);
                if ($sendMail)
                {
                    setFlashData('smg', 'Vui lòng kiểm tra email để xem hướng dẫn đặt lại mật khẩu');
                    setFlashData('smg_type', 'success');
                } else
                {
                    setFlashData('smg', 'Lỗi hệ thống, vui lòng trở lại sau');
                    setFlashData('smg_type', 'danger');
                }
            } else
            {
                setFlashData('smg', 'Lỗi hệ thống, vui lòng trở lại sau');
                setFlashData('smg_type', 'danger');
            }
        } else
        {
            setFlashData('smg', 'Email không tồn tại');
            setFlashData('smg_type', 'danger');
        }
    } else
    {
        setFlashData('smg', 'Vui lòng nhập địa chỉ email');
        setFlashData('smg_type', 'danger');
    }
    // redirect('?module=auth&action=forgot');
}
$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
?>


<div class="container">
    <div class="row justify-content-center" style="margin-top: 50px;">
        <div class="col-lg-4 col-md-6 col-sm-8">
            <h2 class="text-center text-uppercase">Quên mật khẩu</h2>
            <?php if (!empty($smg))
            {
                $f->getSmg($smg, $smg_type);
            } ?>
            <form action="" method="post">
                <div class="form-group mg-form">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" placeholder="Địa chỉ email" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mg-btn">Gửi</button>
                <hr />
                <p class="text-center"><a href="?cmd=auth&act=login">Đăng nhập</a></p>
            </form>
        </div>
    </div>
</div>

<?php
$f->layout('footer');
?>