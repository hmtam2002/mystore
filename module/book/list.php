<?php
$listBook = $db->getRaw("SELECT * FROM products WHERE product_type_id = '1'");
?>

<h2 class="text-center mt-3">Tất cả sách</h2>



<div class="row wrap-content bg-white my-4 rounded-3 p-4">
    <?php foreach ($listBook as $item): ?>
    <div class="col-4 p-3">
        <div class="border rounded-3 p-3 h-100">
            <a href="<?= _HOST . '/' . $item['slug'] ?>" class="text-decoration-none">
                <img class="img-fluid w-100 h-auto mx-auto"
                    src="<?= _HOST_ASSETS ?>/images/product/<?= $item['image'] ?>" alt="Ảnh sản phẩm">

                <p class="text-center text-dark mb-0 mt-3 fs-5">
                    <?= $item['title'] ?>
                </p>
            </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>