<!-- áp dụng cho tất cả trang -->
<script src="<?= _HOST . '/admin/template/js/custom.js?ver=' . rand(100, 999) ?>"></script>


<!-- áp dụng cho sidebar -->
<!-- thử nghiệm -->
<!-- <script>
$(document).ready(function() {
    // Load initial content based on the URL
    loadContent(window.location.search);

    // Handle menu link clicks
    $('a.nav-link').on('click', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        loadContent(href);
        window.history.pushState({
            path: href
        }, '', href);
    });

    // Handle browser back/forward buttons
    window.onpopstate = function(event) {
        if (event.state) {
            loadContent(window.location.search);
        }
    };

    // Function to load content via AJAX
    function loadContent(href) {
        $.ajax({
            url: href,
            method: 'GET',
            success: function(response) {
                $('#content').html($(response).find('#content').html());

                // Display notifications if any
                var notification = $(response).find('#notification').html();
                if (notification) {
                    $('#notification').html(notification).show();
                } else {
                    $('#notification').hide();
                }

                // Get cmd and act from the URL
                var urlParams = new URLSearchParams(href.split('?')[1]);
                var cmd = urlParams.get('cmd');
                var act = urlParams.get('act');
                activateMenuItem(cmd, act);
            },
            error: function() {
                alert('Failed to load content.');
            }
        });
    }

    // Function to activate the menu item
    function activateMenuItem(cmd, act) {
        $('a.nav-link').removeClass('active');
        $('a.nav-link').each(function() {
            var href = $(this).attr('href');
            if (href.includes('cmd=' + cmd) && (href.includes('act=' + act) || href.includes(
                    'act=list'))) {
                $(this).addClass('active');
                // Open parent collapse if it's inside one
                var collapseParent = $(this).closest('.collapse');
                if (collapseParent.length > 0) {
                    collapseParent.addClass('show');
                    $('a[href="#' + collapseParent.attr('id') + '"] .arrow').addClass('rotated');
                }
            }
        });
    }

    // Restore collapsed state
    var collapsedState = JSON.parse(localStorage.getItem('collapsedState')) || {};
    for (var id in collapsedState) {
        if (collapsedState[id]) {
            $('#' + id).addClass('show');
            $('a[href="#' + id + '"] .arrow').addClass('rotated');
        }
    }

    // Handle collapse show/hide events
    $('.collapse').on('shown.bs.collapse', function() {
        var id = $(this).attr('id');
        collapsedState[id] = true;
        localStorage.setItem('collapsedState', JSON.stringify(collapsedState));
        $('a[href="#' + id + '"] .arrow').addClass('rotated');
    });

    $('.collapse').on('hidden.bs.collapse', function() {
        var id = $(this).attr('id');
        collapsedState[id] = false;
        localStorage.setItem('collapsedState', JSON.stringify(collapsedState));
        $('a[href="#' + id + '"] .arrow').removeClass('rotated');
    });
});
</script> -->
<!-- phiên bản có ajax -->
<!-- <script>
$(document).ready(function() {
    // Load initial content based on the URL
    loadContent(window.location.search);

    // Handle menu link clicks
    $('a.nav-link').on('click', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        var page = $(this).data('page');
        loadContent(href);
        window.history.pushState({
            path: href
        }, '', href);
        activateMenuItem(page);
    });

    // Handle browser back/forward buttons
    ow.onpopstate = function(event) {
        if (event.state) {
            loadContent(window.location.search);
        }
    };

    // Function to load content via AJAX
    function loadContent(href) {
        $.ajax({
            url: href,
            method: 'GET',
            success: function(response) {
                $('#content').html($(response).find('#content').html());
                var cmd = new URLSearchParams(window.location.search).get('cmd');
                activateMenuItem(cmd);
            },
            error: function() {
                alert('Failed to load content.');
            }
        });
    }

    // Function to activate the menu item
    function activateMenuItem(cmd) {
        $('a.nav-link').removeClass('active');
        $('a.nav-link').each(function() {
            if ($(this).attr('href').includes('cmd=' + cmd)) {
                $(this).addClass('active');
            }
        });
    }

    // Restore collapsed state
    var collapsedState = JSON.parse(localStorage.getItem('collapsedState')) || {};
    for (var id in collapsedState) {
        if (collapsedState[id]) {
            $('#' + id).addClass('show');
            $('a[href="#' + id + '"] .arrow').addClass('rotated');
        }
    }

    // Handle collapse show/hide events
    $('.collapse').on('shown.bs.collapse', function() {
        var id = $(this).attr('id');
        collapsedState[id] = true;
        localStorage.setItem('collapsedState', JSON.stringify(collapsedState));
        $('a[href="#' + id + '"] .arrow').addClass('rotated');
    });

    $('.collapse').on('hidden.bs.collapse', function() {
        var id = $(this).attr('id');
        collapsedState[id] = false;
        localStorage.setItem('collapsedState', JSON.stringify(collapsedState));
        $('a[href="#' + id + '"] .arrow').removeClass('rotated');
    });
});
</script> -->
<!-- phiên bản này lưu cả cuộn nha -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const arrows = document.querySelectorAll('.arrow');
        const sidebar = document.getElementById('sidebar');

        // Tạm thời vô hiệu hóa chuyển tiếp trên các mũi tên
        arrows.forEach(arrow => arrow.style.transition = 'none');

        document.querySelectorAll('.collapse').forEach((collapse) => {
            // Set initial state from localStorage
            const state = localStorage.getItem(collapse.id);
            if (state === "shown") {
                collapse.classList.add("show");
                const arrow = document.querySelector(`a[href="#${collapse.id}"] .arrow`);
                if (arrow) {
                    arrow.classList.add("rotated");
                }
            } else {
                collapse.classList.remove("show");
                const arrow = document.querySelector(`a[href="#${collapse.id}"] .arrow`);
                if (arrow) {
                    arrow.classList.remove("rotated");
                }
            }

            collapse.addEventListener("shown.bs.collapse", function () {
                const arrow = document.querySelector(`a[href="#${this.id}"] .arrow`);
                if (arrow) {
                    arrow.classList.add("rotated");
                }
                localStorage.setItem(this.id, "shown");
            });

            collapse.addEventListener("hidden.bs.collapse", function () {
                const arrow = document.querySelector(`a[href="#${this.id}"] .arrow`);
                if (arrow) {
                    arrow.classList.remove("rotated");
                }
                localStorage.setItem(this.id, "hidden");
            });
        });

        // Sau khi thiết lập trạng thái ban đầu, bật lại chuyển tiếp
        setTimeout(() => {
            arrows.forEach(arrow => arrow.style.transition = '0.3s');
        }, 0);

        // Lưu trạng thái cuộn của menu
        sidebar.addEventListener('scroll', function () {
            localStorage.setItem('sidebarScrollPosition', sidebar.scrollTop);
        });

        // Khôi phục trạng thái cuộn của menu
        const scrollPosition = localStorage.getItem('sidebarScrollPosition');
        if (scrollPosition !== null) {
            sidebar.scrollTop = scrollPosition;
        }
    });
</script>
<!-- Phiên bản không bung, không hiệu ứng mũi tên -->
<!-- <script>
document.addEventListener("DOMContentLoaded", function() {
    const arrows = document.querySelectorAll('.arrow');
    // Tạm thời vô hiệu hóa chuyển tiếp trên các mũi tên
    arrows.forEach(arrow => arrow.style.transition = 'none');

    document.querySelectorAll('.collapse').forEach((collapse) => {
        // Set initial state from localStorage
        const state = localStorage.getItem(collapse.id);
        if (state === "shown") {
            collapse.classList.add("show");
            const arrow = document.querySelector(`a[href="#${collapse.id}"] .arrow`);
            if (arrow) {
                arrow.classList.add("rotated");
            }
        } else {
            collapse.classList.remove("show");
            const arrow = document.querySelector(`a[href="#${collapse.id}"] .arrow`);
            if (arrow) {
                arrow.classList.remove("rotated");
            }
        }

        collapse.addEventListener("shown.bs.collapse", function() {
            const arrow = document.querySelector(`a[href="#${this.id}"] .arrow`);
            if (arrow) {
                arrow.classList.add("rotated");
            }
            localStorage.setItem(this.id, "shown");
        });

        collapse.addEventListener("hidden.bs.collapse", function() {
            const arrow = document.querySelector(`a[href="#${this.id}"] .arrow`);
            if (arrow) {
                arrow.classList.remove("rotated");
            }
            localStorage.setItem(this.id, "hidden");
        });
    });

    // Sau khi thiết lập trạng thái ban đầu, bật lại chuyển tiếp
    setTimeout(() => {
        arrows.forEach(arrow => arrow.style.transition = '0.3s');
    }, 0);
});
</script> -->
<!-- Phiên bản không bung -->
<!-- <script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.collapse').forEach((collapse) => {
        // Set initial state from localStorage
        const state = localStorage.getItem(collapse.id);
        if (state === "shown") {
            collapse.classList.add("show");
            const arrow = document.querySelector(`a[href="#${collapse.id}"] .arrow`);
            if (arrow) {
                arrow.classList.add("rotated");
            }
        } else {
            collapse.classList.remove("show");
            const arrow = document.querySelector(`a[href="#${collapse.id}"] .arrow`);
            if (arrow) {
                arrow.classList.remove("rotated");
            }
        }

        collapse.addEventListener("shown.bs.collapse", function() {
            const arrow = document.querySelector(`a[href="#${this.id}"] .arrow`);
            if (arrow) {
                arrow.classList.add("rotated");
            }
            localStorage.setItem(this.id, "shown");
        });

        collapse.addEventListener("hidden.bs.collapse", function() {
            const arrow = document.querySelector(`a[href="#${this.id}"] .arrow`);
            if (arrow) {
                arrow.classList.remove("rotated");
            }
            localStorage.setItem(this.id, "hidden");
        });
    });
});
</script> -->
<!-- phiên bản không ajax -->
<!-- <script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.collapse').forEach((collapse) => {
        // Set initial state from localStorage
        const state = localStorage.getItem(collapse.id);
        if (state === "shown") {
            new bootstrap.Collapse(collapse, {
                toggle: true
            });
        } else {
            new bootstrap.Collapse(collapse, {
                toggle: false
            });
        }

        collapse.addEventListener("shown.bs.collapse", function() {
            const arrow = document.querySelector(`a[href="#${this.id}"] .arrow`);
            if (arrow) {
                arrow.classList.add("rotated");
            }
            localStorage.setItem(this.id, "shown");
        });

        collapse.addEventListener("hidden.bs.collapse", function() {
            const arrow = document.querySelector(`a[href="#${this.id}"] .arrow`);
            if (arrow) {
                arrow.classList.remove("rotated");
            }
            localStorage.setItem(this.id, "hidden");
        });
    });
});
</script> -->

<!-- Cái nào có upload hình thì xài -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Lắng nghe sự kiện change trên input file
        document.getElementById('imageUpload').addEventListener('change', function (event) {
            // Kiểm tra xem có file được chọn hay không
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
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

<?php
if ($data['action'] == 'add' || $data['action'] == 'edit')
{ ?>
    <!-- ckeditor offline -->
    <script src="<?= _WEB_HOST_TEMPLATE ?>/ckeditor/ckeditor.js"></script>
    <!-- ckeditor online -->
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script> -->

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

        document.getElementById('title').addEventListener('input', function () {
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
        inputElement.addEventListener('input', function () {
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
        document.getElementById('showPasswordCheckbox').addEventListener('change', function () {
            console.log(this.checked);
            var passwordField = document.getElementById('passwordField');
            passwordField.type = this.checked ? "text" : "password";
        });
        document.getElementById('showPasswordconfirmCheckbox').addEventListener('change', function () {
            console.log(this.checked);
            var passwordField = document.getElementById('passwordconfirmField');
            passwordField.type = this.checked ? "text" : "password";
        });
    </script>
<?php } ?>