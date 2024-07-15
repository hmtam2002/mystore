<?php
if ($f->isPOST())
{
    $fillterAll = $f->filter();
    $email = $fillterAll['email'];
    $sodienthoai = $fillterAll['sodienthoai'];
    $diachi = $fillterAll['diachi'];
    $zalo = $fillterAll['zalo'];
    $iframe = $_POST['iframe'];
    $messenger = $_POST['messenger'];
    $fanpage = $_POST['fanpage'];
    $db->query("UPDATE setting SET seting_value = '$email' WHERE setting_name = 'email'");
    $db->query("UPDATE setting SET seting_value = '$sodienthoai' WHERE setting_name = 'sodienthoai'");
    $db->query("UPDATE setting SET seting_value ='$diachi' WHERE setting_name = 'diachi'");
    $db->query("UPDATE setting SET seting_value = '$zalo' WHERE setting_name = 'zalo'");
    $db->query("UPDATE setting SET seting_value = '$iframe' WHERE setting_name = 'iframe'");
    $db->query("UPDATE setting SET seting_value = '$messenger' WHERE setting_name = 'messenger'");
    $db->query("UPDATE setting SET seting_value = '$fanpage' WHERE setting_name = 'fanpage'");

}
$setting = $db->getRaw('SELECT * FROM setting');


$sodienthoai = $setting[0]['seting_value'];
$email = $setting[1]['seting_value'];
$diachi = $setting[2]['seting_value'];
$zalo = $setting[3]['seting_value'];
$iframe = $setting[4]['seting_value'];
$messenger = $setting[5]['seting_value'];
$fanpage = $setting[6]['seting_value'];
?>
<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="?cmd=home&act=dashboard">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cài đặt</li>
        </ol>
    </nav>
    <?php
    ?>
    <p class="fw-bold fs-4 text-center">Thông tin website</p>
    <form method="post">
        <div class="row">
            <div class="mb-3 col-6 col-lg-3">
                <label for="sodienthoai" class="form-label">Số điện thoại</label>
                <input type="number" name="sodienthoai" class="form-control" value="<?= $sodienthoai ?>">
            </div>
            <div class="mb-3 col-6 col-lg-3">
                <label for="zalo" class="form-label">Zalo</label>
                <input type="text" name="zalo" class="form-control" value="<?= $zalo ?>">
            </div>
            <div class="mb-3 col-12 col-lg-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $email ?>">
            </div>
            <div class="mb-3 col-12 col-lg-6">
                <label for="diachi" class="form-label">Link chat fanpage</label>
                <input placeholder="Ví dụ: m.me/linkfanpage" type="text" name="messenger" class="form-control"
                    value="<?= $messenger ?>">
            </div>
            <div class="mb-3 col-12 col-lg-6">
                <label for="diachi" class="form-label">Link fanpage</label>
                <input placeholder="Ví dụ: https://www.facebook.com/linkfanpage" type="text" name="fanpage"
                    class="form-control" value="<?= $fanpage ?>">
            </div>
            <div class="mb-3 col-12">
                <label for="diachi" class="form-label">Địa chỉ</label>
                <input type="text" name="diachi" class="form-control" value="<?= $diachi ?>">
            </div>
            <div class="mb-3 col-md-12">
                <label for="iframe" class="form-label">Mã nhúng google map (set thuộc tính width = "100%")</label>
                <textarea type="text" name="iframe" class="form-control"
                    style="height: 150px;"><?= $iframe ?></textarea>
            </div>
        </div>
        <button class="btn btn-success">Lưu</button>
    </form>
</main>