<!-- bootstrap -->
<script src="<?= _HOST . '/admin/template/js/bootstrap.bundle.min.js' ?>"></script>
<!-- áp dụng cho tất cả trang -->
<script src="<?= _HOST . '/admin/template/js/custom.js?ver=' . rand(100, 999) ?>"></script>

<?php
if ($data['action'] == 'add' || $data['action'] == 'edit')
{ ?>
<script src="<?= _WEB_HOST_TEMPLATE ?>/ckeditor/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#description'), {})
    .then(editor => {
        window.editor = editor;
    })
    .catch(err => {
        console.error(err.stack);
    });
</script>
<script>
function createSlug(text) {
    const from =
        "ÁÀẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬÉÈẺẼẸÊẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢÚÙỦŨỤƯỨỪỬỮỰÝỲỶỸỴáàảãạăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵđĐ";
    const to =
        "AAAAAAAAAAAAAAAAAEEEEEEEEEEEIIIIIOOOOOOOOOOOOOOOOOUUUUUUUUUUUYYYYYaaaaaaaaaaaaaaaaaeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyyyyydD";

    const convertVietnamese = (str) => {
        let newStr = '';
        for (let i = 0; i < str.length; i++) {
            const index = from.indexOf(str[i]);
            if (index !== -1) {
                newStr += to[index];
            } else {
                newStr += str[i];
            }
        }
        return newStr;
    };

    let slug = convertVietnamese(text);
    slug = slug.toLowerCase();
    slug = slug.replace(/[^a-z0-9\s-]/g,
            '') // Loại bỏ ký tự không phải là chữ cái, số, khoảng trắng và dấu gạch ngang
        .replace(/\s+/g, '-') // Thay thế khoảng trắng bằng dấu gạch ngang
        .replace(/-+/g, '-') // Thay thế nhiều dấu gạch ngang liên tiếp bằng một dấu gạch ngang
        .replace(/^-+|-+$/g, ''); // Loại bỏ dấu gạch ngang ở đầu và cuối chuỗi

    return slug;
}
const labelElement2 = document.getElementById('slugLabel');

document.getElementById('title').addEventListener('input', function() {
    const title = this.value;
    const slug = createSlug(title);
    document.getElementById('slugInput').value = slug;
    labelElement2.textContent = 'Đường dẫn mẫu: localhost/mystore/' + slug;
});
</script>
<script>
// Lấy thẻ input và thẻ label bằng ID
const inputElement = document.getElementById('slugInput');
const labelElement = document.getElementById('slugLabel');

// Thêm sự kiện lắng nghe khi có sự thay đổi trong thẻ input
inputElement.addEventListener('input', function() {
    // Lấy giá trị hiện tại của thẻ input
    const inputValue = inputElement.value;

    // Cập nhật nội dung của thẻ label
    labelElement.textContent = 'Đường dẫn mẫu: localhost/mystore/' + inputValue;
});
</script>
<?php
} ?>

<?php if (false)
{ ?>
<script>
document.getElementById('showPasswordCheckbox').addEventListener('change', function() {
    console.log(this.checked);
    var passwordField = document.getElementById('passwordField');
    passwordField.type = this.checked ? "text" : "password";
});
document.getElementById('showPasswordconfirmCheckbox').addEventListener('change', function() {
    console.log(this.checked);
    var passwordField = document.getElementById('passwordconfirmField');
    passwordField.type = this.checked ? "text" : "password";
});
</script>
<?php
}
?>