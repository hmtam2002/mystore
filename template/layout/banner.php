<?php
$banner = $db->oneRaw('SELECT * FROM images WHERE type = "banner" AND status = "1" LIMIT 1;');
if ($banner):
    ?>

    <div class="banner">
        <a class="d-block" href="">
            <img class="w-100" src="<?= _HOST ?>/assets/images/banner/<?= $banner['image'] ?>" alt="Banner top" />
        </a>
    </div>

    <?php
endif;
?>