<!-- slider -->
<?php include _PATH_TEMPLATE . '/layout/slider.php' ?>


<!-- danh mục sản phẩm -->
<div class="wrap-product_list">
    <div class="wrap-content bg-white rounded-3 p-4 pb-5 ">
        <div class="">
            <div class="title-product_list">
                <span>Danh mục sản phẩm</span>
            </div>
            <div class="container-product_list">
                <div class="row">
                    <div class="box-product_list col-3">
                        <div class="pic-product_list">
                            <img class="w-100" src="<?= _HOST ?>/assets/images/images.jpg" alt="" />
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
                            <img class="w-100" src="<?= _HOST ?>/assets/images/images.jpg" alt="" />
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
                            <img class="w-100" src="<?= _HOST ?>/assets/images/images.jpg" alt="" />
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
                            <img class="w-100" src="<?= _HOST ?>/assets/images/images.jpg" alt="" />
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
    <div class="wrap-content bg-white mt-4 p-4 pb-5 rounded-3">
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
                <div class="row row-tab">
                    <?php
                    $sql = 'SELECT slug,title,image FROM products
                            WHERE genre_id = "14"
                            ORDER BY RAND()
                            LIMIT 3;';
                    $listProduct = $db->getRaw($sql);
                    foreach ($listProduct as $item)
                    {
                        ?>
                        <div class="col-sm-4">
                            <a href="<?= _HOST . '/' . $item['slug'] ?>">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="<?= _HOST . '/assets/images/product/' . $item['image'] ?>"
                                            alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none" href="">
                                                <?= $item['title'] ?>
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <div id="kinhte" class="tabcontent">
                <div class="row row-tab">
                    <div class="col-4">
                        <div class="box-product">
                            <div class="pic-product">
                                <img class="w-100" src="<?= _HOST ?>/assets/images/lkt.jpg" alt="" />
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
                                <img class="w-100" src="<?= _HOST ?>/assets/images/ktvh.jpg" alt="" />
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
                                <img class="w-100" src="<?= _HOST ?>/assets/images/kts.jpg" alt="" />
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
                    <?php
                    $sql = 'SELECT slug,title,image FROM products
                            WHERE genre_id = "3"
                            ORDER BY RAND()
                            LIMIT 3;';
                    $listProduct = $db->getRaw($sql);
                    foreach ($listProduct as $item)
                    {
                        ?>
                        <div class="col-sm-4">
                            <a href="<?= _HOST . '/' . $item['slug'] ?>">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <img class="w-100" src="<?= _HOST . '/assets/images/product/' . $item['image'] ?>"
                                            alt="" />
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0">
                                            <a class="text-decoration-none" href="">
                                                <?= $item['title'] ?>
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div id="theloaikhac" class="tabcontent">
                <div class="row row-tab">
                    <div class="col-4">
                        <div class="box-product">
                            <div class="pic-product">
                                <img class="w-100" src="<?= _HOST ?>/assets/images/cn.jpg" alt="" />
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
                                <img class="w-100" src="<?= _HOST ?>/assets/images/tq.jpg" alt="" />
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
                                <img class="w-100" src="<?= _HOST ?>/assets/images/drm.jpg" alt="" />
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

<!-- Văn phòng phẩm -->
<!-- sản phẩm cấp 1 chạy slide -->
<div class="wrap-product">
    <div class="wrap-content bg-white p-4 pb-5 pt-5 rounded-3">
        <div class="title-main"><span>Văn phòng phẩm</span></div>
        <div class="product-index">
            <div class="vanphongpham">
                <div class="vanphongpham-outside">
                    <div class="box-product">
                        <div class="pic-product">
                            <img class="w-100" src="<?= _HOST ?>/assets/images/bx.jpg" alt="" />
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
                            <img class="w-100" src="<?= _HOST ?>/assets/images/mt.jpg" alt="" />
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
                            <img class="w-100" src="<?= _HOST ?>/assets/images/bx.jpg" alt="" />
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
                            <img class="w-100" src="<?= _HOST ?>/assets/images/hdb.jpg" alt="" />
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
                            <img class="w-100" src="<?= _HOST ?>/assets/images/kb.jpg" alt="" />
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


<!-- Tiểu thuyết lãng mạng -->
<div class="wrap-product">
    <div class="wrap-content bg-white rounded-3 p-4 pt-5 pb-5">
        <div class="title-main"><span>Tiểu thuyết lãng mạn</span></div>
        <div class="product-index">
            <div class="vanphongpham">
                <div class="vanphongpham-outside">
                    <div class="box-product">
                        <div class="pic-product">
                            <img class="w-100" src="<?= _HOST ?>/assets/images/tlbt.jpg" alt="" />
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
                            <img class="w-100" src="<?= _HOST ?>/assets/images/khm.jpg" alt="" />
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
                            <img class="w-100" src="<?= _HOST ?>/assets/images/sdka.jpg" alt="" />
                        </div>
                        <div class="info-product">
                            <h3 class="mb-0">
                                <a class="text-decoration-none textlit name-product" href="">
                                    say đắm không anh
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="vanphongpham-outside">
                    <div class="box-product">
                        <div class="pic-product">
                            <img class="w-100" src="<?= _HOST ?>/assets/images/ncc.jpg" alt="" />
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
                            <img class="w-100" src="<?= _HOST ?>/assets/images/nd.jpg" alt="" />
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
    <div class="wrap-content rounded-3 bg-white p-4 pb-0 mb-5">
        <div class="title-main"><span>Đối tác</span></div>
        <div class="partner-index">
            <div class="slick-partner">
                <div class="partner-outside">
                    <div class="partner-box">
                        <img src="<?= _HOST ?>/assets/images/l2.jpg" alt="">
                    </div>
                </div>
                <div class="partner-outside">
                    <div class="partner-box">
                        <img src="<?= _HOST ?>/assets/images/l1.jpg" alt="">
                    </div>
                </div>
                <div class="partner-outside">
                    <div class="partner-box">
                        <img src="<?= _HOST ?>/assets/images/bn.jpg" alt="">
                    </div>
                </div>
                <div class="partner-outside">
                    <div class="partner-box">
                        <img src="<?= _HOST ?>/assets/images/l2.jpg" alt="">
                    </div>
                </div>
                <div class="partner-outside">
                    <div class="partner-box">
                        <img src="<?= _HOST ?>/assets/images/l1.jpg" alt="">
                    </div>
                </div>
                <div class="partner-outside">
                    <div class="partner-box">
                        <img src="<?= _HOST ?>/assets/images/bn.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- js tổng quát -->
<?php require_once _PATH_TEMPLATE . '/layout/js.php'; ?>

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
<script src="<?= _HOST_TEMPLATE . '/js/app.js' ?>"></script>