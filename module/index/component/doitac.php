<div class="wrap-content rounded-3 p-4 pb-0 mb-5">
    <div class="title-main"><span>Đối tác</span></div>
    <div class="slick-partner">
        <div>
            <img class="img-fluid" src="<?= _HOST ?>/assets/images/l2.jpg" alt="">
        </div>
        <div>
            <img class="img-fluid" src="<?= _HOST ?>/assets/images/l1.jpg" alt="">
        </div>
        <div>
            <img class="img-fluid" src="<?= _HOST ?>/assets/images/bn.jpg" alt="">
        </div>
        <div>
            <img class="img-fluid" src="<?= _HOST ?>/assets/images/l2.jpg" alt="">
        </div>
        <div>
            <img class="img-fluid" src="<?= _HOST ?>/assets/images/l1.jpg" alt="">
        </div>
        <div>
            <img class="img-fluid" src="<?= _HOST ?>/assets/images/bn.jpg" alt="">
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".slick-partner").slick({
            autoplay: false,
            autoplaySpeed: 2000, // Tự động chuyển slide sau mỗi 2 giây
            dots: false, // Hiển thị chấm chỉ mục
            arrows: true, // Hiển thị mũi tên điều hướng
            slidesToShow: 5, // Hiển thị số lượng item
            slidesToScroll: 1, // Hiển thị số lượng item chạy qua
        });
    });
</script>