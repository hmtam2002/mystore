<?php
require_once "../../config.php";
?>


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MuaSach.vn</title>
    <link rel="shortcut icon" type="image/png" href="<?= _HOST ?>/assets/images/favicon.png" />
    <link href="public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link href="public/all.min.css" rel="stylesheet" />
    <link href="public/js/app.js" rel="stylesheet" />
    <!-- slick nè -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <link rel="stylesheet" href="public/css/style.css" />
</head>

<body>
    <div class="wrap-home">
        <div class="wrap-header">
            <div class="banner">
                <a class="d-block" href="">
                    <img class="w-100" src="public/assets/images/banner.jpg" />
                </a>
            </div>
            <div class="wrap-content">
                <div class="header-index d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <img src="public/assets/images/logo.png" alt="" />
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
                        <button class="btn btn-menu" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                                class="fas fa-bars"></i></button>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                            aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasRightLabel">Menu</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
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

        <!-- slide -->
        <div class="slideshow">

            <div class="slider">
                <div>
                    <img src="public/assets/images/slider/gioi-thieu-quyen-sach.png" alt="Image 4" />
                </div>
                <div><img src="public/assets/images/slider/1.jpg" alt="Image 4" /></div>
                <div><img src="public/assets/images/slider/2.jpg" alt="Image 4" /></div>
                <div><img src="public/assets/images/slider/3.jpg" alt="Image 4" /></div>
            </div>

        </div>
        <!-- danh mục sản phẩm -->
        <div class="wrap-product_list">
            <div class="wrap-content">
                <div class="product_list-index">
                    <div class="title-product_list">
                        <span>Danh mục sản phẩm</span>
                    </div>
                    <div class="container-product_list">
                        <div class="row">
                            <div class="box-product_list col-3">
                                <div class="pic-product_list">
                                    <img class="w-100" src="public/assets/images/images.jpg" alt="" />
                                </div>
                                <div class="info-product_list">
                                    <h3 class="mb-0">
                                        <a class="text-decoration-none" href="">
                                            sách giáo khoa
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="box-product_list col-3">
                                <div class="pic-product_list">
                                    <img class="w-100" src="public/assets/images/images.jpg" alt="" />
                                </div>
                                <div class="info-product_list">
                                    <h3 class="mb-0">
                                        <a class="text-decoration-none" href="">
                                            sách giáo khoa
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="box-product_list col-3">
                                <div class="pic-product_list">
                                    <img class="w-100" src="public/assets/images/images.jpg" alt="" />
                                </div>
                                <div class="info-product_list">
                                    <h3 class="mb-0">
                                        <a class="text-decoration-none" href="">
                                            sách giáo khoa
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="box-product_list col-3">
                                <div class="pic-product_list">
                                    <img class="w-100" src="public/assets/images/images.jpg" alt="" />
                                </div>
                                <div class="info-product_list">
                                    <h3 class="mb-0">
                                        <a class="text-decoration-none" href="">
                                            sách giáo khoa
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- sản phẩm tab -->
        <div class="wrap-bangxephang">
            <div class="wrap-content">
                <div class="title-bangxephang">
                    <span>Bảng xếp hạng sách bán chạy hàng tuần</span>
                </div>
                <div class="bangxephang-index">
                    <div class="tab">
                        <button class="tablinks" onclick="openCity(event, 'vanhoc')" id="defaultOpen">Văn Học</button>
                        <button class="tablinks" onclick="openCity(event, 'kinhte')">Kinh tế</button>
                        <button class="tablinks" onclick="openCity(event, 'thieunhi')">Thiếu nhi</button>
                        <button class="tablinks" onclick="openCity(event, 'theloaikhac')">Thể loại khác</button>
                    </div>

                    <div id="vanhoc" class="tabcontent">
                        <!-- <span onclick="this.parentElement.style.display='none'" class="topright">&times</span> -->
                        <div class="row row-tab">
                            <div class="col-4">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="public/assets/images/cp.jpg" alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none" href="">
                                                Chí Phèo
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="public/assets/images/sd.jpg" alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none" href="">
                                                Số Đỏ
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="public/assets/images/ngk.jpg" alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none" href="">
                                                Nhà Giả Kim
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="kinhte" class="tabcontent">
                        <div class="row row-tab">
                            <div class="col-4">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="public/assets/images/lkt.jpg" alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none" href="">
                                                luật kinh tế
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="public/assets/images/ktvh.jpg" alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none" href="">
                                                cách nền kinh tế vận hành
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="public/assets/images/kts.jpg" alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none" href="">
                                                kinh tế số
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="thieunhi" class="tabcontent">
                        <div class="row row-tab">
                            <div class="col-4">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="public/assets/images/sod.jpg" alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none" href="">
                                                sọ dừa
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="public/assets/images/htb.jpg" alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none" href="">
                                                hoàng tử bé
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="public/assets/images/ngmx.jpg" alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none" href="">
                                                những giấc mơ xanh
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="theloaikhac" class="tabcontent">
                        <div class="row row-tab">
                            <div class="col-4">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="public/assets/images/cn.jpg" alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none" href="">
                                                truyện tranh conan tập 7
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="public/assets/images/tq.jpg" alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none" href="">
                                                trạng quỷnh lời to
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="public/assets/images/drm.jpg" alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none text-split name-product" href="">
                                                doraemon chú mèo máy đến từ tương lai tập 10
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
        <!-- sản phẩm cấp 1 chạy slide -->

        <div class="wrap-product">
            <div class="wrap-content">
                <div class="title-main"><span>Văn phòng phẩm</span></div>
                <div class="product-index">
                    <div class="vanphongpham">
                        <div class="vanphongpham-outside">
                            <div class="box-product">
                                <div class="pic-product">
                                    <img class="w-100" src="public/assets/images/bx.jpg" alt="" />
                                </div>
                                <div class="info-product">
                                    <h3 class="mb-0">
                                        <a class="text-decoration-none text-split name-product" href="">
                                            Bút Bi Thiên Long TL-095 mực xanh
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="vanphongpham-outside">
                            <div class="box-product">
                                <div class="pic-product">
                                    <img class="w-100" src="public/assets/images/mt.jpg" alt="" />
                                </div>
                                <div class="info-product">
                                    <h3 class="mb-0">
                                        <a class="text-decoration-none text-split name-product" href="">
                                            Máy Tính Khoa Học Casio FX-580VN X
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="vanphongpham-outside">
                            <div class="box-product">
                                <div class="pic-product">
                                    <img class="w-100" src="public/assets/images/bx.jpg" alt="" />
                                </div>
                                <div class="info-product">
                                    <h3 class="mb-0">
                                        <a class="text-decoration-none text-split name-product" href="">
                                            Bút Bi Thiên Long TL-095 mực xanh
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="vanphongpham-outside">
                            <div class="box-product">
                                <div class="pic-product">
                                    <img class="w-100" src="public/assets/images/hdb.jpg" alt="" />
                                </div>
                                <div class="info-product">
                                    <h3 class="mb-0">
                                        <a class="text-decoration-none text-split name-product" href="">
                                            Tủ nhựa để bàn mini Hình heo kiêm hộp đựng bút, đồ dùng cá nhân 2 ngăn
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="vanphongpham-outside">
                            <div class="box-product">
                                <div class="pic-product">
                                    <img class="w-100" src="public/assets/images/kb.jpg" alt="" />
                                </div>
                                <div class="info-product">
                                    <h3 class="mb-0">
                                        <a class="text-decoration-none text-split name-product" href="">
                                            Bấm kim số 3 Eagle 206 (máy bấm ghim) - Văn phòng phẩm Sơn Ca
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrap-product">
            <div class="wrap-content">
                <div class="title-main"><span>Tiểu thuyết lãng mạn</span></div>
                <div class="product-index">
                    <div class="vanphongpham">
                        <div class="vanphongpham-outside">
                            <div class="box-product">
                                <div class="pic-product">
                                    <img class="w-100" src="public/assets/images/tlbt.jpg" alt="" />
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
                        <div class="vanphongpham-outside">
                            <div class="box-product">
                                <div class="pic-product">
                                    <img class="w-100" src="public/assets/images/khm.jpg" alt="" />
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
                        <div class="vanphongpham-outside">
                            <div class="box-product">
                                <div class="pic-product">
                                    <img class="w-100" src="public/assets/images/sdka.jpg" alt="" />
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
                        <div class="vanphongpham-outside">
                            <div class="box-product">
                                <div class="pic-product">
                                    <img class="w-100" src="public/assets/images/ncc.jpg" alt="" />
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
                        <div class="vanphongpham-outside">
                            <div class="box-product">
                                <div class="pic-product">
                                    <img class="w-100" src="public/assets/images/nd.jpg" alt="" />
                                </div>
                                <div class="info-product">
                                    <h3 class="mb-0">
                                        <a class="text-decoration-none text-split name-product" href="">
                                            bảy năm vẫn ngoảnh về phương bắc
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- doi tac -->
        <div class="wrap-partner">
            <div class="wrap-content">
                <div class="title-main"><span>Đối tác</span></div>
                <div class="partner-index">
                    <div class="slick-partner">
                        <div class="partner-outside">
                            <div class="partner-box">
                                <img src="public/assets/images/l2.jpg" alt="">
                            </div>
                        </div>
                        <div class="partner-outside">
                            <div class="partner-box">
                                <img src="public/assets/images/l1.jpg" alt="">
                            </div>
                        </div>
                        <div class="partner-outside">
                            <div class="partner-box">
                                <img src="public/assets/images/bn.jpg" alt="">
                            </div>
                        </div>
                        <div class="partner-outside">
                            <div class="partner-box">
                                <img src="public/assets/images/l2.jpg" alt="">
                            </div>
                        </div>
                        <div class="partner-outside">
                            <div class="partner-box">
                                <img src="public/assets/images/l1.jpg" alt="">
                            </div>
                        </div>
                        <div class="partner-outside">
                            <div class="partner-box">
                                <img src="public/assets/images/bn.jpg" alt="">
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
                            <img src="public/assets/images/logo.png" alt="" />
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

    </div>
    <script src="public/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- cài slick chưa được nè -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"
        integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".slider").slick({
                autoplay: true,
                autoplaySpeed: 2000, // Tự động chuyển slide sau mỗi 2 giây
                dots: true, // Hiển thị chấm chỉ mục
                arrows: true, // Hiển thị mũi tên điều hướng
            });
        });

        $(document).ready(function () {
            $(".vanphongpham").slick({
                autoplay: true,
                autoplaySpeed: 2000, // Tự động chuyển slide sau mỗi 2 giây
                dots: false, // Hiển thị chấm chỉ mục
                arrows: true, // Hiển thị mũi tên điều hướng
                slidesToShow: 4, // Hiển thị số lượng item
                slidesToScroll: 1 // Hiển thị số lượng item chạy qua
            });
        });
        $(document).ready(function () {
            $(".slick-partner").slick({
                autoplay: true,
                autoplaySpeed: 2000, // Tự động chuyển slide sau mỗi 2 giây
                dots: false, // Hiển thị chấm chỉ mục
                arrows: true, // Hiển thị mũi tên điều hướng
                slidesToShow: 5, // Hiển thị số lượng item
                slidesToScroll: 1 // Hiển thị số lượng item chạy qua
            });
        });
    </script>
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
</body>

</html>