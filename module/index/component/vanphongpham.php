<div class="wrap-product">
    <div class="wrap-content bg-white p-4 pb-5 pt-5 rounded-3">
        <div class="title-main"><span>Văn phòng phẩm</span></div>
        <div class="product-index vanphongpham">

            <?php
            $listVanphongpham = $db->getRaw("SELECT * FROM products WHERE product_type_id = '2'");
            foreach ($listVanphongpham as $item):
                ?>
            <div class="vanphongpham-outside">
                <div class="box-product">
                    <div class="pic-product">
                        <img class="w-100" src="<?= _HOST ?>/assets/images/product/<?= $item['image'] ?>"
                            alt="Hình sản phẩm" />
                    </div>
                    <div class="info-product">
                        <h3 class="mb-0">
                            <a class="text-decoration-none text-split name-product"
                                href="<?= _HOST . '/' . $item['slug'] ?>">
                                <?= $item['product_name'] ?>
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>