</div>
</div>

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
<script>
document.addEventListener("DOMContentLoaded", function() {
    var selectElement = document.getElementById("mySelect");

    // Xác định lớp cần thêm dựa trên giá trị của tùy chọn và thêm nó khi tùy chọn thay đổi
    selectElement.addEventListener("change", function() {
        var selectedOption = this.options[this.selectedIndex];
        var selectedValue = selectedOption.value;

        // Xóa lớp CSS cũ
        selectElement.className = "";

        // Thêm lớp CSS mới
        if (selectedValue === "0") {
            selectElement.classList.add("form-control");
            selectElement.classList.add("btn-warning");
            selectElement.classList.add("btn");
        } else if (selectedValue === "1") {
            selectElement.classList.add("form-control");
            selectElement.classList.add("btn-success");
            selectElement.classList.add("btn");
        }
    });

    // Kích hoạt sự kiện change ban đầu để áp dụng lớp cho tùy chọn mặc định
    selectElement.dispatchEvent(new Event("change"));
});
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>


<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
new Chartist.Line('#traffic-chart', {
    labels: ['January', 'Februrary', 'March', 'April', 'May', 'June'],
    series: [
        [23000, 25000, 19000, 34000, 56000, 64000]
    ]
}, {
    low: 0,
    showArea: true
});
</script>

<script src="<?= _WEB_HOST_TEMPLATE ?>/ckeditor/ckeditor.js"></script>
<script src="<?= _WEB_HOST_TEMPLATE ?>/js/sidebars.js"></script>

<script>
ClassicEditor
    .create(document.querySelector('#description'), {
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        // height: 500 // Chiều cao tính bằng pixel
    })
    .then(editor => {
        window.editor = editor;
    })
    .catch(err => {
        console.error(err.stack);
    });
</script>
<script src="<?= _WEB_HOST_TEMPLATE ?>/js/bootstrap.bundle.min.js">
</script>
<script>
// document.getElementById('showPasswordBtn').addEventListener('click', function () {
//     var passwordField = document.getElementById('passwordField');
//     if (passwordField.type === "password") {
//         passwordField.type = "text";
//     } else {
//         passwordField.type = "password";
//     }
// });

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
<script>
function createSlug(text) {
    const from =
        "ÁÀẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬÉÈẺẼẸÊẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢÚÙỦŨỤƯỨỪỬỮỰÝỲỶỸỴáàảãạăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵđĐ";
    const to =
        "AAAAAAAAAAAAAAAAAEEEEEEEEEEEIIIIIOOOOOOOOOOOOOOOOOUUUUUUUUUUUYYYYYaaaaaaaaaaaaaaaaaeeeeeeeeeeeiiiiiooooooooooooooooooouuuuuuuuuuuyyyyydD";

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
    slug = slug.replace(/[^a-z0-9\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-')
        .replace(/^-+|-+$/g, '');

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
document.addEventListener("DOMContentLoaded", function() {
    // Lắng nghe sự kiện change trên input file
    document.getElementById('imageUpload').addEventListener('change', function(event) {
        // Kiểm tra xem có file được chọn hay không
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // Cập nhật nguồn ảnh cho thẻ img
                document.getElementById('previewImage').src = e.target.result;
                // Hiển thị thẻ img
                document.getElementById('previewImage').style.display = 'block';
            }
            // Đọc dữ liệu của file được chọn
            reader.readAsDataURL(this.files[0]);
        }
    });
});
</script>
</body>

</html>