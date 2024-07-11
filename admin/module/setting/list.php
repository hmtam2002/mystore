<?php
if ($f->isPOST())
{
    $fillterAll = $f->filter();
    $email = $fillterAll['email'];
    $sodienthoai = $fillterAll['sodienthoai'];
    $diachi = $fillterAll['diachi'];
    $zalo = $fillterAll['zalo'];
    $iframe = $fillterAll['iframe'];
    $db->query("UPDATE setting SET seting_value = '$email' WHERE setting_name = 'email'");
    $db->query("UPDATE setting SET seting_value = '$sodienthoai' WHERE setting_name = 'sodienthoai'");
    $db->query("UPDATE setting SET seting_value ='$diachi' WHERE setting_name = 'diachi'");
    $db->query("UPDATE setting SET seting_value = '$zalo' WHERE setting_name = 'zalo'");
    $db->query("UPDATE setting SET seting_value = '$iframe' WHERE setting_name = 'iframe'");

}
$sodienthoai = $db->oneRaw("SELECT seting_value FROM setting WHERE setting_name = 'sodienthoai'")['seting_value'];
$email = $db->oneRaw("SELECT seting_value FROM setting WHERE setting_name = 'email'")['seting_value'];
$diachi = $db->oneRaw("SELECT seting_value FROM setting WHERE setting_name = 'diachi'")['seting_value'];
$zalo = $db->oneRaw("SELECT seting_value FROM setting WHERE setting_name = 'zalo'")['seting_value'];
$iframe = $db->oneRaw("SELECT seting_value FROM setting WHERE setting_name = 'iframe'")['seting_value'];
// $setting = $db->getRaw('SELECT * FROM setting');
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
    <p class="fw-bold fs-4 text-center">Cấu hình website</p>
    <form method="post">
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= $email ?>">
            </div>
            <div class="mb-3 col-md-3">
                <label for="sodienthoai" class="form-label">Số điện thoại</label>
                <input type="number" name="sodienthoai" id="sodienthoai" class="form-control"
                    value="<?= $sodienthoai ?>">
            </div>
            <div class="mb-3 col-md-3">
                <label for="zalo" class="form-label">Zalo</label>
                <input type="text" name="zalo" id="zalo" class="form-control" value="<?= $zalo ?>">
            </div>
            <div class="mb-3 col-12">
                <label for="diachi" class="form-label">Địa chỉ</label>
                <input type="text" name="diachi" id="diachi" class="form-control" value="<?= $diachi ?>">
            </div>
            <div class="mb-3 col-md-12">
                <label for="iframe" class="form-label">Iframe</label>
                <textarea type="text" name="iframe" id="iframe" class="form-control"
                    style="height: 150px;"><?= $iframe ?></textarea>
            </div>
        </div>
        <button class="btn btn-success">Lưu</button>
    </form>
</main>