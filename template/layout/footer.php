<!-- footer -->
<div class="wrap-footer py-5">
    <div class="wrap-content d-flex flex-column flex-md-row justify-content-md-between">
        <div class="footer-news mb-3 mb-md-0">
            <div class="logo logo-footer">
                <img src="<?= _HOST_ASSETS ?>/images/logo.png" alt="" />
            </div>
            <div class="footer-info">
                <p> Hotline: 1900 6656</p>
                <p> Email: hotro@nhasachphuongnam.com</p>
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
                <p> THE GRACE SPA</p>
                <p> Hotline:039 581 7753 - 0906823326</p>
                <p> Email: thegracespahado@gmail.com</p>
                <p> Website: Spathegrace.com</p>
                <p> Adress: Số 4, đường số 5, Ha Do Centrosa Garden, Quận 10, TP.HCM</p>
            </div>
        </div>
    </div>
</div>