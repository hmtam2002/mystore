<?php
$listNews = $db->getRaw("SELECT * FROM news WHERE type = 'new'");
?>

<h2 class="text-center mt-3">Tin khuyến mãi</h2>



<div class="row wrap-content bg-white my-4 rounded-3 p-4">
    <?php foreach ($listNews as $item): ?>
    <div class="col-4 p-3">
        <div class="border rounded-3 p-3 h-100">
            <a href="<?= _HOST . '/' . $item['slug'] ?>" class="text-decoration-none">
                <img class="img-fluid w-100 h-auto mx-auto" src="<?= _HOST_ASSETS ?>/images/new/<?= $item['image'] ?>"
                    alt="Ảnh sản phẩm">

                <p class="text-center text-dark mb-0 mt-3 fs-5">
                    <?= $item['title'] ?>
                </p>
            </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>