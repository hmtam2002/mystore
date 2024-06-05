<nav id="sidebar" class="col-md-3 h-100 col-lg-2 d-md-block bg-light sidebar collapse overflow-auto">
    <div class="position-sticky" style="
    padding-bottom: 100px;">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center <?= ($data['module'] == 'home') ? 'active' : ''; ?>"
                    href="?cmd=home&act=dashboard">
                    <i class="bi bi-house-door me-2"></i> Trang chủ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    href="#submenuSach" role="button" aria-expanded="false" aria-controls="submenuSach">
                    <span><i class="bi bi-book me-2"></i> Quản lý sách</span>
                    <i class="bi bi-chevron-down arrow">
                    </i>
                </a>
                <div class="collapse" id="submenuSach">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= ($data['module'] == 'book') ? 'active' : ''; ?>"
                                href="
                                ?cmd=book&act=list">
                                <i class="bi bi-book-half me-2"></i> Sách
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= ($data['module'] == 'author') ? 'active' : ''; ?>"
                                href="?cmd=author&act=list">
                                <i class="bi bi-person me-2"></i> Tác giả
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= ($data['module'] == 'genre') ? 'active' : ''; ?>"
                                href="?cmd=genre&act=list">
                                <i class="bi bi-tags me-2"></i> Thể loại
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    href="#submenuVanphongpham" role="button" aria-expanded="false" aria-controls="submenuVanphongpham">
                    <span><i class="bi bi-pen me-2"></i> Văn phòng phẩm</span>
                    <i class="bi bi-chevron-down arrow">
                    </i>
                </a>
                <div class="collapse" id="submenuVanphongpham">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= ($data['module'] == 'stationery') ? 'active' : ''; ?>"
                                href="?cmd=stationery&act=list">
                                <i class="bi bi-pencil-square me-2"></i> Sản phẩm
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= ($data['module'] == 'origin') ? 'active' : ''; ?>"
                                href="?cmd=origin&act=list">
                                <i class="bi bi-globe me-2"></i> Xuất xứ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= ($data['module'] == 'brand') ? 'active' : ''; ?>"
                                href="?cmd=brand&act=list">
                                <i class="bi bi-tags me-2"></i> Thương hiệu
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link d-flex align-items-center <?= ($data['module'] == 'order') ? 'active' : ''; ?>"
                    href="?cmd=order&act=list">
                    <i class="bi bi-receipt me-2"></i> Quản lý đơn hàng
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center <?= ($data['module'] == 'goods_receipts') ? 'active' : ''; ?>"
                    href="?cmd=goods_receipts&act=list">
                    <i class="bi bi-box-seam me-2"></i> Quản lý nhập hàng
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center <?= ($data['module'] == 'warehouse') ? 'active' : ''; ?>"
                    href="?cmd=warehouse&act=list">
                    <i class="bi bi-bar-chart me-2"></i> Quản lý kho hàng
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    href="#submenuBaiviet" role="button" aria-expanded="false" aria-controls="submenuBaiviet">
                    <span><i class="bi bi-journal me-2"></i> Quản lý bài viết</span>
                    <i class="bi bi-chevron-down arrow">
                    </i>
                </a>
                <div class="collapse" id="submenuBaiviet">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= ($data['module'] == 'new') ? 'active' : ''; ?>"
                                href="?cmd=new&act=list">
                                <i class="bi bi-newspaper me-2"></i> Bài viết
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= ($data['module'] == 'policy') ? 'active' : ''; ?>"
                                href="?cmd=policy&act=list">
                                <i class="bi bi-file-earmark-text me-2"></i> Chính sách
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= ($data['module'] == 'service') ? 'active' : ''; ?>"
                                href="?cmd=service&act=list">
                                <i class="bi bi-file-earmark-text me-2"></i> Dịch vụ
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    href="#submenuHinhanh" role="button" aria-expanded="false" aria-controls="submenuHinhanh">
                    <span><i class="bi bi-images me-2"></i> Quản lý hình ảnh</span>
                    <i class="bi bi-chevron-down arrow">
                    </i>
                </a>
                <div class="collapse" id="submenuHinhanh">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= ($data['module'] == 'slider') ? 'active' : ''; ?>"
                                href="?cmd=slider&act=list">
                                <i class="bi bi-card-image me-2"></i> Slider
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= ($data['module'] == 'banner') ? 'active' : ''; ?>"
                                href="?cmd=banner&act=list">
                                <i class="bi bi-card-image me-2"></i> Banner
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center <?= ($data['module'] == 'user') ? 'active' : ''; ?>"
                    href="?cmd=user&act=list">
                    <i class="bi bi-person me-2"></i> Quản lý tài khoản
                </a>
            </li>
        </ul>
    </div>
</nav>