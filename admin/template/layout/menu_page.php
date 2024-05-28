<!-- <nav id="sidebar" class="h-100 col-md-3 col-lg-2 d-md-block bg-light sidebar collapse  overflow-auto">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="?cmd=home&act=dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="ml-2">Trang chủ</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="?cmd=book&act=list">
                    <span class="ml-2">Sách</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="?cmd=author&act=list">
                    <span class="ml-2">Tác giả</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="?cmd=genre&act=list">
                    <span class="ml-2">Thể loại</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="?cmd=stationery&act=list">
                    <span class="ml-2">Văn phòng phẩm</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="?cmd=origin&act=list">
                    <span class="ml-2">Xuất xứ</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="?cmd=brand&act=list">
                    <span class="ml-2">Thương hiệu</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="?cmd=user&act=list">
                    <span class="ml-2">Tài khoản</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="?cmd=new&act=list">
                    <span class="ml-2">Tin tức</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="?cmd=slider&act=list">
                    <span class="ml-2">Slider</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="?cmd=policy&act=list">
                    <span class="ml-2">Chính sách</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="?cmd=policy&act=list">
                    <span class="ml-2">Quản lý đơn hàng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="?cmd=policy&act=list">
                    <span class="ml-2">Quản lý nhập hàng</span>
                </a>
            </li>
        </ul>
    </div>
</nav> -->

<?php
// Lấy giá trị của cmd và act từ URL
$cmd = $data['module'];
$act = $data['action'];

// Con của sách
$bookCommands = ['book', 'author', 'genre'];
// Con của văn phòng phẩm
$stationeryCommands = ['stationery', 'origin', 'brand'];
// Con của bài viết
$postCommands = ['new', 'policy'];
?>

<!-- <nav id="sidebar" class="col-md-3 h-100 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active d-flex align-items-center <?php echo ($cmd == 'home') ? 'actived' : ''; ?>"
                    href="?cmd=home&act=dashboard">
                    <i class="bi bi-house-door me-2"></i> Trang chủ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    href="#submenuSach" role="button"
                    aria-expanded="<?php echo in_array($cmd, $bookCommands) ? 'true' : 'false'; ?>"
                    aria-controls="submenuSach">
                    <span><i class="bi bi-book me-2"></i> Quản lý sách</span>
                    <i class="bi bi-chevron-down arrow <?php echo in_array($cmd, $bookCommands) ? '' : 'rotated'; ?>">
                    </i>
                </a>
                <div class="collapse <?php echo in_array($cmd, $bookCommands) ? 'show' : ''; ?>" id="submenuSach">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'book') ? 'actived' : ''; ?>"
                                href="
                                ?cmd=book&act=list">
                                <i class="bi bi-book-fill me-2"></i> Sách
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'author') ? 'actived' : ''; ?>"
                                href="?cmd=author&act=list">
                                <i class="bi bi-person me-2"></i> Tác giả
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'genre') ? 'active' : ''; ?>"
                                href="?cmd=genre&act=list">
                                <i class="bi bi-tags me-2"></i> Thể loại
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    href="#submenuVanphongpham" role="button"
                    aria-expanded="<?php echo in_array($cmd, $stationeryCommands) ? 'true' : 'false'; ?>"
                    aria-controls="submenuVanphongpham">
                    <span><i class="bi bi-book me-2"></i> Văn phòng phẩm</span>
                    <i
                        class="bi bi-chevron-down arrow <?php echo in_array($cmd, $stationeryCommands) ? '' : 'rotated'; ?>">
                    </i>
                </a>
                <div class="collapse <?php echo in_array($cmd, $stationeryCommands) ? 'show' : ''; ?>"
                    id="submenuVanphongpham">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'stationery') ? 'active' : ''; ?>"
                                href="?cmd=stationery&act=list">
                                <i class="bi bi-book-fill me-2"></i> Sản phẩm
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'origin') ? 'active' : ''; ?>"
                                href="?cmd=origin&act=list">
                                <i class="bi bi-person me-2"></i> Xuất xứ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'brand') ? 'actived' : ''; ?>"
                                href="?cmd=brand&act=list">
                                <i class="bi bi-tags me-2"></i> Thương hiệu
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="?cmd=policy&act=list">
                    <i class="bi bi-info-circle me-2"></i> Quản lý đơn hàng
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="?cmd=policy&act=list">
                    <i class="bi bi-briefcase me-2"></i> Quản lý nhập hàng
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    href="#submenuBaiviet" role="button"
                    aria-expanded="<?php echo in_array($cmd, $stationeryCommands) ? 'true' : 'false'; ?>"
                    aria-controls="submenuBaiviet">
                    <span><i class="bi bi-book me-2"></i> Quản lý bài viết</span>
                    <i
                        class="bi bi-chevron-down arrow <?php echo in_array($cmd, $stationeryCommands) ? '' : 'rotated'; ?>">
                    </i>
                </a>
                <div class="collapse <?php echo in_array($cmd, $postCommands) ? 'show' : ''; ?>" id="submenuBaiviet">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'new') ? 'actived' : ''; ?>"
                                href="?cmd=new&act=list">
                                <i class="bi bi-book-fill me-2"></i> Tin tức
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'policy') ? 'actived' : ''; ?>"
                                href="?cmd=policy&act=list">
                                <i class="bi bi-person me-2"></i> Chính sách
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="#">
                    <i class="bi bi-envelope me-2"></i> Contact
                </a>
            </li>
        </ul>
    </div>
</nav> -->


<nav id="sidebar" class="col-md-3 h-100 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'home') ? 'active' : ''; ?>"
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
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'book') ? 'active' : ''; ?>"
                                href="
                                ?cmd=book&act=list">
                                <i class="bi bi-book-half me-2"></i> Sách
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'author') ? 'active' : ''; ?>"
                                href="?cmd=author&act=list">
                                <i class="bi bi-person me-2"></i> Tác giả
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'genre') ? 'active' : ''; ?>"
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
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'stationery') ? 'active' : ''; ?>"
                                href="?cmd=stationery&act=list">
                                <i class="bi bi-pencil-square me-2"></i> Sản phẩm
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'origin') ? 'active' : ''; ?>"
                                href="?cmd=origin&act=list">
                                <i class="bi bi-globe me-2"></i> Xuất xứ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'brand') ? 'active' : ''; ?>"
                                href="?cmd=brand&act=list">
                                <i class="bi bi-tags me-2"></i> Thương hiệu
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'order') ? 'active' : ''; ?>"
                    href="?cmd=order&act=list">
                    <i class="bi bi-receipt me-2"></i> Quản lý đơn hàng
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'warehouse') ? 'active' : ''; ?>"
                    href="?cmd=warehouse&act=list">
                    <i class="bi bi-box-seam me-2"></i> Quản lý nhập hàng
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
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'new') ? 'active' : ''; ?>"
                                href="?cmd=new&act=list">
                                <i class="bi bi-newspaper me-2"></i> Tin tức
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'policy') ? 'active' : ''; ?>"
                                href="?cmd=policy&act=list">
                                <i class="bi bi-file-earmark-text me-2"></i> Chính sách
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'service') ? 'active' : ''; ?>"
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
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'slider') ? 'active' : ''; ?>"
                                href="?cmd=slider&act=list">
                                <i class="bi bi-card-image me-2"></i> Slider
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'paner') ? 'active' : ''; ?>"
                                href="?cmd=paner&act=list">
                                <i class="bi bi-card-image me-2"></i> Paner
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center <?php echo ($cmd == 'user') ? 'active' : ''; ?>"
                    href="?cmd=user&act=list">
                    <i class="bi bi-person me-2"></i> Quản lý tài khoản
                </a>
            </li>
        </ul>
    </div>
</nav>