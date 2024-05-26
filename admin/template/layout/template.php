<?php
$f = new func();
?>

<!DOCTYPE html>
<html lang="<?= _LANGUAGE ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator - Muasach.vn</title>
    <?php $f->layout('css'); ?>
    <style>
    .sidebar {
        /* Light background for the sidebar */
        color: #333333;
        /* Dark text color */
        flex-shrink: 0;
        padding: 15px;
        border-right: 1px solid #dee2e6;
        /* Light border color */
    }

    .sidebar a {
        color: #333333;
        /* Dark text color */
        text-decoration: none;
    }

    .sidebar .nav-link:hover {
        background-color: #e0e0e0;
        border-radius: 10px 0 0 10px;
        /* Light hover background color */
    }

    .main-content {
        flex-grow: 1;
        padding: 20px;
        background-color: #ffffff;
        /* Light background for the main content */
    }

    .arrow {
        transition: transform 0.3s;
    }

    .arrow.rotated {
        transform: rotate(90deg);
    }

    @media (max-width: 767.98px) {
        .sidebar {
            top: 11.5rem;
            padding: 0;
        }
    }

    @media (min-width: 767.98px) {
        .navbar {
            top: 0;
            position: sticky;
            z-index: 999;
        }
    }
    </style>
</head>

<body>
    <?php $f->layout('header'); ?>

    <div class="container-fluid">
        <div class="row">
            <?php 
            $f->layout('menu_page'); ?>
            <?php echo $noidung; ?>
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>




    <script src="<?= _WEB_HOST_TEMPLATE ?>/ckeditor/ckeditor.js"></script>
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

    <script src="<?= _WEB_HOST_TEMPLATE ?>/js/bootstrap.bundle.min.js"></script>
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
                    // document.getElementById('previewImage').style.display = 'block';
                }
                // Đọc dữ liệu của file được chọn
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    </script>
</body>

</html>