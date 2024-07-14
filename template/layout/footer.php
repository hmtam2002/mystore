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
<iframe class="w-100"
    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d25469.59628927951!2d106.69980124290596!3d10.765783169349037!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40a3b49e59%3A0xa1bd14e483a602db!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEvhu7kgdGh14bqtdCBDYW8gVGjhuq9uZw!5e0!3m2!1svi!2s!4v1720058815367!5m2!1svi!2s"
    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade"></iframe>