</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var selectElement = document.getElementById("mySelect");

        // Xác định lớp cần thêm dựa trên giá trị của tùy chọn và thêm nó khi tùy chọn thay đổi
        selectElement.addEventListener("change", function () {
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
        .create(document.querySelector('#content_editor'), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
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
</body>

</html>