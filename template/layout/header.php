<!-- header -->
<div class="wrap-header" style="background-color: white;">
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
                <a href="<?= _HOST . '/gio-hang' ?>" class="text-decoration-none">
                    <div class="giohang d-flex flex-column">
                        <div class="mt-2 text-secondary m-auto">
                            <span class="position-absolute"
                                style="color: white;border-radius: 50%;background-color: green;padding: 0 7px;transform: translate(24px, -6px)"><?= $c->numberOfCart() ?></span>
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <span class="text-secondary">Giỏ hàng</span>

                    </div>
                </a>
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