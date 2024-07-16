<?php
$key = $_GET['search'];
$searchBookInfo = $db->getRaw("SELECT image,title,slug FROM products WHERE title LIKE '%$key%'");
if (!empty($searchBookInfo))
{
    ?>
    <div class="wrap-content my-3 alert alert-success">Kết quả tìm kiếm sách cho <span class="fw-bold"><?= $key ?></span>
    </div>
    <div class="row wrap-content bg-white my-4 rounded-3 p-4">
        <?php foreach ($searchBookInfo as $item): ?>
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
    <?php
} ?>


<?php
$key = $_GET['search'];
$searchProductInfo = $db->getRaw("SELECT image,product_name,slug FROM products WHERE product_name LIKE '%$key%'");
if (!empty($searchProductInfo))
{


    ?>
    <div class="wrap-content my-3 alert alert-success">Kết quả tìm kiếm sản phẩm cho <span
            class="fw-bold"><?= $key ?></span></div>
    <div class="row wrap-content bg-white my-4 rounded-3 p-4">
        <?php foreach ($searchProductInfo as $item): ?>
            <div class="col-4 p-3">
                <div class="border rounded-3 p-3 h-100">
                    <a href="<?= _HOST . '/' . $item['slug'] ?>" class="text-decoration-none">
                        <img class="img-fluid w-100 h-auto mx-auto"
                            src="<?= _HOST_ASSETS ?>/images/product/<?= $item['image'] ?>" alt="Ảnh sản phẩm">

                        <p class="text-center text-dark mb-0 mt-3 fs-5">
                            <?= $item['product_name'] ?>
                        </p>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
} ?>


<?php if (empty($searchBookInfo) && empty($searchProductInfo)):
    ?>
    <div class="wrap-content alert alert-danger my-3">Không có kết quả tìm kiếm cho <span class="fw-bold"><?= $key ?></span>
    </div>
<?php endif; ?>
<!-- 