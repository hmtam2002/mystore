<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MuaSach.vn</title>
    <link rel="shortcut icon" type="image/png" href="public/assets/images/favicon.png" />
    <link href="public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link href="public/all.min.css" rel="stylesheet" />
    <link href="public/js/app.js" rel="stylesheet" />
    <!-- slick nè -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="wrap-header">
        <div class="banner">
            <a class="d-block" href="">
                <img class="w-100" src="assets/images/banner.jpg" />
            </a>
        </div>
        <div class="wrap-content">
            <div class="header-index d-flex justify-content-between align-items-center">
                <div class="logo">
                    <img src="assets/images/logo.png" alt="" />
                </div>
                <div class="search-header">
                    <input type="search" name="" id="" placeholder="Tìm kiếm..." />
                    <input type="button" value="Gửi" placeholder="Gửi" />
                </div>
                <div class="d-flex">
                    <div class="giohang">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="taikhoan">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="menu">
                    <button class="btn btn-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fas fa-bars"></i></button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasRightLabel">Menu</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="menu-ul">
                                <li>
                                    <a href="">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="">Khuyến mãi</a>
                                </li>
                                <li>
                                    <a href="">Sách Văn Học</a>
                                </li>
                                <li>
                                    <a href="">Sách Kinh Tế</a>
                                </li>
                                <li>
                                    <a href="">Hành trang đến trường</a>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wrap-product_detail">
        <div class="wrap-content">
            <div class="product_detail-left">
                <div class="pic-product_detail">
                    <img class="w-100" src="assets/images/nd.jpg" alt="" />
                </div>
                <div class="product_detail-right">
                    <div class="name-profuct_detail">
                        bảy năm vẫn ngoảnh về phương bắc
                    </div>
                    <div class="tacgia-product_detail">
                        Tác giả: <span>Âm Tần</span>
                    </div>
                    <div class="price-product_detail">
                        Giá: <span>200,000 đ</span>
                    </div>
                    <div class="price_sale-product_detail">
                        <p> Tiết kiệm: <span>20,000 đ (10%)</span></p>
                        <p>Giá thị trường: <span>220,000 đ</span></p>
                        <p>Tồn kho: <span>20</span></p>
                    </div>
                    <div class="d-flex flex-wrap align-items-center mt-3 mb-3">
                        <label class="attr-label-pro-detail d-block mr-2 mb-0">Số lượng:</label>
                        <div class="attr-content-pro-detail d-flex flex-wrap align-items-center justify-content-between">
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
                <div class="name_info-pro_detail">
                    Thông tin chi tiết
                </div>
                <p> Nhà xuất bản: <a href="">NXB Thanh Niên</a></p>
                <p> Ngày xuất bản: 16/04/2024</p>
                <p> Nhà phát hành: AZ Việt Nam</p>
                <p> Kích thước: 12.0 x 19.0 x 1.0 cm</p>
                <p> Số trang: 120 trang</p>
                <p>Trọng lượng: 300 gram</p>
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
                    <p> Một tai nạn bất ngờ khiến mọi chuyện đổi thay. Sau bảy năm xa cách, anh trở về với một thân phận hoàn toàn khác, muốn dùng tên của mình đổi lấy trái tim cô.</p>
                    <p>Vẫn là gương mặt ấy, nhưng đã là một con người hoàn toàn khác biệt. Tình yêu của anh khiến cô chẳng biết là thật hay giả, chỉ biết chìm đắm như bước chân xuống bùn lầy, bị mê hoặc bởi một thế giới đầy rẫy nguy hiểm và kích thích thuộc về anh.</p>
                </div>
            </div>
            <div class="goiysanpham">
                <div class="title-main"><span>Gợi ý cho bạn</span></div>
                <div class="product-index">
                    <div class="row row-detail">
                        <div class="col-3">
                            <div class="box-product">
                                <div class="pic-product">
                                    <img class="w-100" src="assets/images/tlbt.jpg" alt="" />
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
                                    <img class="w-100" src="assets/images/khm.jpg" alt="" />
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
                                    <img class="w-100" src="assets/images/sdka.jpg" alt="" />
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
                                    <img class="w-100" src="assets/images/ncc.jpg" alt="" />
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

    <!-- footer -->
    <div class="wrap-footer">
        <div class="wrap-content">
            <div class="footer-index">
                <div class="footer-news">
                    <div class="logo logo-footer">
                        <img src="assets/images/logo.png" alt="" />
                    </div>

                    <div class="footer-info">
                        <p> Hotline: 1900 6656</p>
                        <p> Email: hotro@nhasachphuongnam.com</p>
                    </div>
                </div>
                <div class="footer-news">
                    <div class="title-footer">
                        Chính sách khách hàng
                    </div>
                    <div class="footer-ul p-0">
                        <li><a href="">Chính sách giao hàng</a></li>
                        <li><a href="">Chính sách trả hàng</a></li>
                        <li><a href="">Thông tin bảo hành</a></li>
                        <li><a href="">Thông tin bảo hành</a></li>
                    </div>
                </div>
                <div class="footer-news">
                    <div class="title-footer">
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
    </div>
    <script src="public/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- cài slick chưa được nè -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>