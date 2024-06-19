<div class="wrap-content mt-5 mb-5 bg-white rounded-3 p-4 d-flex justify-content-center">
    <div class="col-lg-4 col-md-6 col-sm-8">
        <h2 class="text-center">Đăng nhập</h2>
        <form method="post">
            <div class="mb-3 form-group">
                <label class="form-label" for="fullname">Họ tên</label>
                <input class="form-control" type="text" name="fullname" placeholder="Nhập họ tên">
            </div>
            <div class="mb-3 form-group">
                <label class="form-label" for="password">Mật khẩu</label>
                <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu">
            </div>
            <div class="mb-3 form-group form-check">
                <input type="checkbox" id="forgotpassword" class="form-check-input">
                <label class="form-check-label" for="forgotpassword">Hiện mật khẩu</label>
            </div>
            <div class="mb-3 form-group">
                <button id="btn_dangnhap" type="button" class="w-100 btn btn-primary">Đăng nhập</button>
            </div>
        </form>
        <span id="thunghiem"></span>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#btn_dangnhap').click(function() {
        $.ajax({
            url: '<?php echo _HOST . "/include/ajax.php" ?>',
            type: 'POST',
            data: {
                name: 'Tam',
                pass: '123'
            },
            success: function(response) {
                $('#thunghiem').html(response);
            },
            error: function() {

            }
        });
    });
});
</script>