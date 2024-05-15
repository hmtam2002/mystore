<script src="<?= _HOST_TEMPLATE ?>/css/bootstrap/js/bootstrap.min.js"></script>
<!-- cài slick chưa được nè -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"
    integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
    integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
$(document).ready(function() {
    $(".slider").slick({
        autoplay: true,
        autoplaySpeed: 2000, // Tự động chuyển slide sau mỗi 2 giây
        dots: true, // Hiển thị chấm chỉ mục
        arrows: true, // Hiển thị mũi tên điều hướng
    });
});

$(document).ready(function() {
    $(".vanphongpham").slick({
        autoplay: true,
        autoplaySpeed: 2000, // Tự động chuyển slide sau mỗi 2 giây
        dots: false, // Hiển thị chấm chỉ mục
        arrows: true, // Hiển thị mũi tên điều hướng
        slidesToShow: 4, // Hiển thị số lượng item
        slidesToScroll: 1 // Hiển thị số lượng item chạy qua
    });
});
$(document).ready(function() {
    $(".slick-partner").slick({
        autoplay: true,
        autoplaySpeed: 2000, // Tự động chuyển slide sau mỗi 2 giây
        dots: false, // Hiển thị chấm chỉ mục
        arrows: true, // Hiển thị mũi tên điều hướng
        slidesToShow: 5, // Hiển thị số lượng item
        slidesToScroll: 1 // Hiển thị số lượng item chạy qua
    });
});
</script>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

</body>

</html>