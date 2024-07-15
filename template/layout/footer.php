<?php

$web_info = $db->getRaw("SELECT *FROM setting");


?>

<!-- footer -->
<div class="wrap-footer py-5">
    <div class="wrap-content d-flex flex-column flex-md-row justify-content-md-between">
        <div class="footer-news mb-3 mb-md-0">
            <div class="logo logo-footer">
                <img src="<?= _HOST_ASSETS ?>/images/logo.png" alt="" />
            </div>
            <div class="footer-info">
                <p> Hotline: <?= $web_info[0]['seting_value'] ?></p>
                <p> Email: <?= $web_info[1]['seting_value'] ?></p>
            </div>
        </div>
        <div class="footer-news mb-3 mb-md-0">
            <div class="title-footer text-uppercase" style="font-weight: bold;">
                Dịch vụ
            </div>
            <div class="footer-ul p-0">
                <?php
                $new_list = $db->getRaw('SELECT * FROM news WHERE type = "service"');
                foreach ($new_list as $items)
                {
                    ?>
                    <li>
                        <a href="<?= _HOST . '/' . $items['slug'] ?>"><?= $items['title'] ?></a>
                    </li>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="footer-news mb-3 mb-md-0">
            <div class="title-footer text-uppercase" style="font-weight: bold;">
                liên hệ với chúng tôi
            </div>
            <div class="footer-info">
                <p> MUASACH.VN</p>
                <p> Hotline:<?= $web_info[0]['seting_value'] ?></p>
                <p> Email: <?= $web_info[1]['seting_value'] ?></p>
                <p> Website: Muasach.vn</p>
                <p> Địa chỉ: <?= $web_info[2]['seting_value'] ?></p>
            </div>
        </div>
    </div>
</div>

<?= $web_info[4]['seting_value'] ?>


<div class="d-none d-md-flex flex-column position-fixed top-50 end-0 me-3 mt-5">
    <a class="my-1" href="https://<?= $web_info[5]['seting_value'] ?>" target="_blank"><img width="60px"
            src="<?= _HOST_ASSETS ?>/images/icons8-messenger-96.png" alt="Ảnh messenger"></a>
    <a class="my-1" href="https://zalo.me/<?= $web_info[3]['seting_value'] ?>" target="_blank"><img width="60px"
            src="<?= _HOST_ASSETS ?>/images/icons8-zalo-96.png" alt="Ảnh zalo"></a>
    <!-- <a class="my-1" href="https://zalo.me/0878100084" target="_blank"><img width="60px"
                    src="<?= _HOST_ASSETS ?>/images/icons8-tel-58.png" alt="Ảnh zalo"></a> -->
</div>