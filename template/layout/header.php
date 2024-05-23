<!-- header -->
<div class="wrap-header">
    <div class="banner">
        <a class="d-block" href="">
            <img class="w-100" src="<?= _HOST ?>/assets/images/banner_top.jpeg" />
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
                <div class="giohang">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="taikhoan">
                    <i class="fas fa-user"></i>
                </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>