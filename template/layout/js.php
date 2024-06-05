<!-- js dùng chung -->
<script src="<?= _HOST_TEMPLATE ?>/css/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= _HOST_TEMPLATE ?>/css/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- cài slick chưa được nè -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"
    integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
    integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Custom JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const decrementButtons = document.querySelectorAll('.btn-decrement');
    const incrementButtons = document.querySelectorAll('.btn-increment');
    const quantityInputs = document.querySelectorAll('.quantity-input');

    decrementButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            const quantityInput = quantityInputs[index];
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        });
    });

    incrementButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            const quantityInput = quantityInputs[index];
            quantityInput.value = parseInt(quantityInput.value) + 1;
        });
    });
});
</script>