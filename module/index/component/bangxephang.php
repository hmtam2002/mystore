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
                        <div class="col-md-4">
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