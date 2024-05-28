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
        position: fixed;
        /* Light border color */
    }

    .sidebar a {
        color: #333333;
        /* Dark text color */
        text-decoration: none;
    }

    .sidebar .nav-link:hover {
        background-color: #e0e0e0;
        /* border-radius: 10px 0 0 10px; */
        /* Light hover background color */
    }

    .nav-link.active {
        background-color: #e0e0e0;
        /* border-radius: 10px 0 0 10px; */
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
            position: static;
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

            $f->layout('menu_page', $data); ?>

            <?php echo $noidung; ?>

        </div>
    </div>

    <?php $f->layout('js', $data); ?>









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