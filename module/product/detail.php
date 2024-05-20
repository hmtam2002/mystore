<?php
$product_detail = $db->oneRaw("SELECT * FROM products WHERE slug = '$slug'");
if (empty($product_detail))
{
    header("location:" . _HOST);
}
$author_id = $product_detail['author_id'];
$author = $db->oneRaw("SELECT author_name FROM authors WHERE id = '$author_id'");

?>
<!DOCTYPE html>
<html lang="<?= _LANGUAGE ?>">

<head>
    <?php require_once _PATH_TEMPLATE . '/layout/head.php'; ?>
    <?php require_once _PATH_TEMPLATE . '/layout/css.php'; ?>
</head>

<body>
    <div class="wrap-home">
        <?= require_once _PATH_TEMPLATE . '/layout/header.php'; ?>

        <div class="wrap-product_detail">
            <div class="wrap-content">
                <div class="product_detail-left">
                    <div class="pic-product_detail">
                        <img class="w-75" src="<?= _HOST_ASSETS . '/images/product/' . $product_detail['image'] ?>"
                            alt="Ảnh sách" />
                    </div>
                    <div class="product_detail-right">
                        <div class="name-profuct_detail">
                            <?= $product_detail['title'] ?>
                        </div>
                        <div class="tacgia-product_detail">
                            Tác giả: <span><?= $author['author_name'] ?></span>
                        </div>
                        <div class="price-product_detail">
                            Giá: <span><?= $product_detail['discount'] ?></span>
                        </div>
                        <div class="price_sale-product_detail">
                            <!-- <p> Tiết kiệm: <span>20,000 đ (10%)</span></p> -->
                            <p> Tiết kiệm: <span><?= $product_detail['price'] - $product_detail['discount'] ?></span>
                            </p>
                            <p>Giá thị trường: <span><?= $product_detail['price'] ?></span></p>
                            <p>Tồn kho: <span>20</span></p>
                        </div>
                        <div class="d-flex flex-wrap align-items-center mt-3 mb-3">
                            <label class="attr-label-pro-detail d-block mr-2 mb-0">Số lượng:</label>
                            <div
                                class="attr-content-pro-detail d-flex flex-wrap align-items-center justify-content-between">
                                <div class="quantity-pro-detail">
                                    <span class="quantity-minus-pro-detail">-</span>
                                    <input type="number" class="qty-pro" min="1" value="1" readonly />
                                    <span class="quantity-plus-pro-detail">+</span>
                                </div>
                            </div>
                        </div>

                        <div class="cart-product_detail">
                            <div class="add_cart-product_detail">
                                <a class="text-decoration-none d-inline-block" href="">
                                    <p class="mb-0"> Thêm vào giỏ hàng</p>
                                </a>
                            </div>
                        </div>
                        <div class="price_sale-product_detail">
                            <p> Gọi đặt hàng: <span>(028) 3820 7153 hoặc 0933 109 009</span></p>
                        </div>

                        <div class="khuyenmai-product_detail">
                            <div class="title-khuyenmai">
                                Thông tin & Khuyến mãi
                            </div>
                            <div class="info_khuyenmai-product_detail">
                                <p> Đổi trả hàng trong vòng 7 ngày</p>
                                <p> Sử dụng mỗi 3.000 BBxu để được giảm 10.000đ. <a href="">Làm sao để lấy BBxu?</a></p>
                                <p> Freeship nội thành Sài Gòn từ 150.000đ*. <a href="">Chi tiết tại đây</a></p>
                                <p> Freeship toàn quốc từ 250.000đ</p>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="info-pro_detail">
                    <!-- <div class="name_info-pro_detail">
                    Thông tin chi tiết
                </div>
                <p> Nhà xuất bản: <a href="">NXB Thanh Niên</a></p>
                <p> Ngày xuất bản: 16/04/2024</p>
                <p> Nhà phát hành: AZ Việt Nam</p>
                <p> Kích thước: 12.0 x 19.0 x 1.0 cm</p>
                <p> Số trang: 120 trang</p>
                <p>Trọng lượng: 300 gram</p> -->
                    <?= $product_detail['description'] ?>
                </div>
                <div class="gioithieu-product_detail">
                    <div class="name_info-pro_detail">
                        giới thiệu sản phẩm
                    </div>
                    <div>
                        <p> Bảy Năm Vẫn Ngoảnh Về Phương Bắc</p>

                        <p> Bảy năm trước, anh nói với cô: “Cố Sơ, anh chỉ vì mình em mà phá cách.”</p>
                        <p>Bảy năm sau, anh nói với cô: “Cố Sơ, anh chỉ vì em mà đến.”</p>
                        <p> Anh của bảy năm trước là Lục Bắc Thâm. Anh của bảy năm sau là Lục Bắc Thần.</p>
                        <p> …</p>
                        <p> Một tai nạn bất ngờ khiến mọi chuyện đổi thay. Sau bảy năm xa cách, anh trở về với một thân
                            phận
                            hoàn toàn khác, muốn dùng tên của mình đổi lấy trái tim cô.</p>
                        <p>Vẫn là gương mặt ấy, nhưng đã là một con người hoàn toàn khác biệt. Tình yêu của anh khiến cô
                            chẳng
                            biết là thật hay giả, chỉ biết chìm đắm như bước chân xuống bùn lầy, bị mê hoặc bởi một thế
                            giới
                            đầy
                            rẫy nguy hiểm và kích thích thuộc về anh.</p>
                    </div>
                </div>
                <div class="goiysanpham">
                    <div class="title-main"><span>Gợi ý cho bạn</span></div>
                    <div class="product-index">
                        <div class="row row-detail">
                            <div class="col-3">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="<?= _HOST_ASSETS ?>/images/tlbt.jpg" alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none text-split name-product" href="">
                                                túp lều bác tom
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="<?= _HOST_ASSETS ?>/images/khm.jpg" alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none text-split name-product" href="">
                                                khải huyền muộn
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="<?= _HOST_ASSETS ?>/images/sdka.jpg" alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none text-split name-product" href="">
                                                say đắm không anh
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="<?= _HOST_ASSETS ?>/images/ncc.jpg" alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none text-split name-product" href="">
                                                những cây cầu ở quận Madijon
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php require_once _PATH_TEMPLATE . '/layout/footer.php'; ?>

    <!-- js tổng quát  -->
    <?php require_once _PATH_TEMPLATE . '/layout/js.php'; ?>
    <script src="<?= _HOST_TEMPLATE . '/js/app.js' ?>"></script>
</body>

</html>