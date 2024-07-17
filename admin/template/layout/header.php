<nav class="navbar navbar-light bg-light p-3 d-flex align-items-center justify-content-between" style="
    border-bottom: 1px solid #dee2e6;">
    <div class=" col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Bảng điều khiển</h4>
        <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <!-- <div class="col-12 col-md-4 col-lg-2">
        <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
    </div> -->
    <div
        class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0 justify-content-between">
        <!-- <a class="text-decoration-none me-5 text-body" target="_blank" href="<?= _HOST ?>">Xem trang web <i
                class="fa-solid fa-arrow-up-right-from-square"></i></a>
        <a class="text-decoration-none me-5 text-body" href="?cmd=auth&act=logout">Đăng xuất <i
                class="fa-solid fa-arrow-up-right-from-square"></i></a> -->
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false">
                Xin chào, <?= getSession('adminName') ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" target="_blank" href="<?= _HOST ?>">Xem website</a></li>
                <li><a class="dropdown-item" href="?cmd=setting&act=list">Cài đặt</a></li>
                <li><a class="dropdown-item" href="?cmd=auth&act=logout">Đăng xuất</a></li>
            </ul>
        </div>
    </div>
</nav>