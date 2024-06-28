<!-- slider -->
<?php include _PATH_TEMPLATE . '/layout/slider.php' ?>

<!-- danh mục sản phẩm -->
<?php require_once 'component/danhmucsanpham.php'; ?>

<!-- Bảng xếp hạng -->
<?php require_once 'component/bangxephang.php'; ?>

<!-- Văn phòng phẩm -->
<?php require_once 'component/vanphongpham.php'; ?>


<!-- Tiểu thuyết lãng mạng -->
<?php require_once 'component/tieuthuyetlangman.php'; ?>


<!-- doi tac -->
<?php require_once 'component/doitac.php'; ?>

<!-- js tổng quát -->
<?php //require_once _PATH_TEMPLATE . '/layout/js.php'; ?>


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