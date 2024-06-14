<!-- header -->
<div class="wrap-header bg-white">
    <div class="banner">
        <a class="d-block" href="">
            <img class="w-100" src="<?= _HOST ?>/assets/images/banner/1717155129.jpeg" alt="Banner top" />
        </a>
    </div>
    <div class="wrap-content">
        <div class="header-index d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="<?= _HOST ?>"><img src="<?= _HOST ?>/assets/images/MuaSach.png" alt="" /></a>
            </div>
            <div class="search-header">
                <input type="search" name="" id="" placeholder="Tìm kiếm..." />
                <input type="button" value="Gửi" placeholder="Gửi" />
            </div>
            <div class="d-flex">
                <div class="container-cart position-relative">
                    <a href="<?= _HOST . '/gio-hang' ?>" class="text-decoration-none">
                        <div class="giohang d-flex flex-column">
                            <div class="mt-2 text-secondary m-auto ">
                                <span id="numberOfcart" class="position-absolute bg-success text-white"
                                    style="border-radius: 50%;padding: 0 7px;transform: translate(24px, -6px)"><?= $c->numberOfCart() ?></span>
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <span class="text-secondary">Giỏ hàng</span>
                        </div>

                    </a>
                    <?php
                    $orderListOffline = $c->getCart();
                    ?>
                    <div class="mini-cart position-absolute top-100 bg-white p-3 border rounded-3 z m-auto"
                        style="z-index: 1000; width:400px; left:-200%;  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                        <i class="fas fa-shopping-cart text-secondary me-2"></i>
                        <span><b>Giỏ hàng (<?= $c->numberOfCart() ?>)</b></span>
                        <hr>
                        <?php
                        foreach ($orderListOffline as $item):
                            ?>
                            <div class="row ms-auto me-auto mb-2">
                                <div class="image_cart_mini" style="width: 70px; height:70px">
                                    <img src="<?= _HOST_ASSETS . '/images/product/' . $item["image"]; ?>" class="img-fluid"
                                        alt="<?= $item["title"]; ?>">
                                </div>
                                <div class="col d-flex flex-column justify-content-between">
                                    <span class="text-muted"><?= $item["title"]; ?></span>
                                    <div class="price d-flex">
                                        <span class=""><b><?= number_format($item["discount"]); ?>đ</b></span>
                                        <span class="text-muted ms-2 me-2">
                                            <del><?= number_format($item["price"]); ?>đ</del>
                                        </span>
                                        <span> x<?= $item['quantity'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach ?>
                        <div class="row ms-auto me-auto p-0 mt-4">
                            <div class="col-4 p-0 d-flex flex-column">
                                <span>Tổng cộng</span>
                                <span class="text-danger fw-bold"><?= number_format($c->totalCart()) ?>đ</span>
                            </div>
                            <div class="col p-0 d-flex flex-column justify-content-center">
                                <a href="<?= _HOST . '/gio-hang' ?>">
                                    <button class="btn btn-danger w-100"><b>Xem giỏ hàng</b></button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= _HOST . '/tai-khoan' ?>" class="text-decoration-none">
                    <div class="taikhoan d-flex flex-column">
                        <div class="mt-2 text-secondary m-auto">
                            <i class="fas fa-user"></i>
                        </div>
                        <span class="text-secondary">Tài khoản</span>
                    </div>
                </a>
            </div>
            <div class="menu">
                <button class="btn btn-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                    aria-controls="offcanvasRight"><i class="fas fa-bars"></i></button>

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
                            <li>
                                <a href="<?= _HOST ?>/sach">Sách</a>
                            </li>
                            <li>
                                <a href="<?= _HOST ?>/van-phong-pham">Văn phòng phẩm</a>
                            </li>
                            <li>
                                <a href="<?= _HOST ?>/bai-viet">Bài viết</a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>