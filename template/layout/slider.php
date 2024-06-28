<!-- slider -->
<div class="wrap-content mt-4 bg-white mb-4 p-4 pb-2 rounded-3">
    <div class="slideshow">
        <div class="slider">
            <?php
            $sliderList = $db->getRaw('SELECT * FROM images WHERE status = "1" and type="slider"');
            foreach ($sliderList as $item)
            {
                ?>
            <div>
                <img src="<?= _HOST . '/assets/images/slider/' . $item['image'] ?>" alt="Image 4" />
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $(".slider").slick({
        autoplay: true,
        autoplaySpeed: 2000, // Tự động chuyển slide sau mỗi 2 giây
        dots: true, // Hiển thị chấm chỉ mục
        arrows: true, // Hiển thị mũi tên điều hướng
    });
});
</script>