<div class="wrap-content mt-4">
    <p class="text-center fw-bold fs-3">Tình trạng vận chuyển</p>
    <div class="row col-md-7 col-lg-6 col-11 mx-auto">
        <div class="col d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512">
                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#dc3545"
                    d="M32 32H480c17.7 0 32 14.3 32 32V96c0 17.7-14.3 32-32 32H32C14.3 128 0 113.7 0 96V64C0 46.3 14.3 32 32 32zm0 128H480V416c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V160zm128 80c0 8.8 7.2 16 16 16H336c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z" />
            </svg>
        </div>
        <div class="col d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="32" width="28" viewBox="0 0 448 512">
                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="<?= $thongtindonhang['status'] > 1 ? '#dc3545' : '' ?>"
                    d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
            </svg>
        </div>
        <div class="col d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="32" width="40" viewBox="0 0 640 512">
                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="<?= $thongtindonhang['status'] > 2 ? '#dc3545' : '' ?>"
                    d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
            </svg>
        </div>
        <div class="col d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="32" width="40" viewBox="0 0 640 512">
                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="<?= $thongtindonhang['status'] > 3 ? '#dc3545' : '' ?>"
                    d="M58.9 42.1c3-6.1 9.6-9.6 16.3-8.7L320 64 564.8 33.4c6.7-.8 13.3 2.7 16.3 8.7l41.7 83.4c9 17.9-.6 39.6-19.8 45.1L439.6 217.3c-13.9 4-28.8-1.9-36.2-14.3L320 64 236.6 203c-7.4 12.4-22.3 18.3-36.2 14.3L37.1 170.6c-19.3-5.5-28.8-27.2-19.8-45.1L58.9 42.1zM321.1 128l54.9 91.4c14.9 24.8 44.6 36.6 72.5 28.6L576 211.6v167c0 22-15 41.2-36.4 46.6l-204.1 51c-10.2 2.6-20.9 2.6-31 0l-204.1-51C79 419.7 64 400.5 64 378.5v-167L191.6 248c27.8 8 57.6-3.8 72.5-28.6L318.9 128h2.2z" />
            </svg>
        </div>
    </div>
    <div class="row col-md-7 col-lg-6 col-11 mx-auto mt-3">
        <div class="col d-flex align-items-center justify-content-center">
            <p class="text-center text-danger fw-bold">Đặt hàng<br>thành công</p>
        </div>
        <div class="col d-flex align-items-center justify-content-center">
            <p class="text-center <?= $thongtindonhang['status'] > 1 ? 'text-danger fw-bold' : '' ?>">Đã<br>xác nhận</p>
        </div>
        <div class="col d-flex align-items-center justify-content-center">
            <p class="text-center <?= $thongtindonhang['status'] > 2 ? 'text-danger fw-bold' : '' ?>">Đang<br>vận chuyển
            </p>
        </div>
        <div class="col d-flex align-items-center justify-content-center">
            <p class="text-center <?= $thongtindonhang['status'] > 3 ? 'text-danger fw-bold' : '' ?>">Đã<br>giao hàng
            </p>
        </div>
    </div>
</div>