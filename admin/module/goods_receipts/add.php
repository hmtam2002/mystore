<?php
// Tạo list option
$productList = $db->getRaw('SELECT id,title,product_name,product_type_id FROM products');
$products = [];

// Xử lý khi 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $smg = '';
    $status = true;
    $product_id = $_POST['product_id'];
    $quantities = $_POST['quantity'];
    $total_prices = $_POST['total_price'];

    // Tính tổng số lượng nhập
    $total_quantity = 0;
    foreach ($quantities as $item)
    {
        $total_quantity += $item;
    }



    // Xử lý dữ liệu sản phẩm

    // Thêm dữ liệu vào bảng goods_receipts
    $code = $f->generateOrderId();
    $goods_receipts_insert = [
        'code' => $code,
        'admin_id' => getSession('admin_id'),
        'create_date' => date('Y-m-d H:i:s'),
        'total_quantity' => $total_quantity,
        'total_stock_quantity' => $total_quantity
    ];
    if (!$db->insert('goods_receipts', $goods_receipts_insert))
    {
        $status = false;
        $smg .= 'Lỗi bảng goods_receipts';
    } else
    {
        $goods_receipt_id = $db->oneRaw("SELECT id FROM goods_receipts WHERE code = '$code'");

        for ($i = 0; $i < count($product_id); $i++)
        {
            $products[] = [
                'goods_receipt_id' => $goods_receipt_id['id'],
                'product_id' => $product_id[$i],
                'quantity' => $quantities[$i],
                'total_price' => $total_prices[$i],
            ];
            $dataUpdate = [
                'stock_quantity' => $quantities[$i]
            ];
            if (
                !$db->query("UPDATE products
                            SET stock_quantity = stock_quantity + " . $quantities[$i] . "
                            WHERE id = " . $product_id[$i])
            )
            {
                $status = false;
                $smg .= 'lỗi bảng products';
            }
            if (!$db->insert('goods_receipt_details', $products[$i]))
            {
                $status = false;
                $smg .= 'lỗi bảng goods_receipt_details';
            }
        }
    }

    // Phản hồi sau khi xử lý
    if ($status)
    {
        echo 'thành công';
    } else
    {
        echo $smg;
    }
    exit();
}
?>
<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="?cmd=home&act=dashboard">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tạo mới hoá đơn nhập</li>
        </ol>
    </nav>
    <a href="?cmd=goods_receipts&act=list">
        <button class="btn btn-success mb-3">Quản lý hoá đơn nhập</button>
    </a>
    <div class="row">
        <div class="col-4">
            <p>Tài khoản đăng nhập: <span class="fw-bold"><?= getSession('adminName') ?></span></p>
            <p>Ngày giờ hiện tại: <span class="fw-bold"><?= date('H:i') ?></span></p>
        </div>
        <div class="col-4">

            <p>Tổng số lượng nhập: <span id="total_quantity" class="fw-bold text-danger fs-5">0</span><span
                    class="fw-bold text-success"> (quyển, cái)</span></p>
            <p>Tổng giá tiền nhập: <span id="total_price" class="fw-bold text-danger fs-5">0</span><span
                    class="fw-bold text-success">
                    đ</span></p>
        </div>
    </div>

    <form method="post" id="nhaphangForm">
        <div id="noidungnhaphang">
            <div class="row align-items-center">
                <div class="col-4">
                    <label class="form-label">Tiêu đề</label>
                </div>
                <div class="col">
                    <label for="total_price" class="form-label">Giá nhập</label>
                </div>
                <div class="col">
                    <label for="quantity" class="form-label">Số lượng</label>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row align-items-center mb-2 py-0 product-detail">
                <div class="col-4">
                    <select name="product_id[]" class="form-control select2 product" required>
                        <option value selected>Chọn sản phẩm</option>
                        <?php
                        foreach ($productList as $item)
                        {
                            echo '<option value="' . $item['id'] . '">' . ($item['product_type_id'] == 1 ? $item['title'] : $item['product_name']) . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <input placeholder="Giá 1 sản phẩm" min="1000" type="number" name="total_price[]"
                        class="form-control price" required>
                </div>
                <div class="col">
                    <input placeholder="Số lượng nhập" type="number" name="quantity[]" class="form-control quantity"
                        min="1" required>
                </div>
                <div class="col-2">
                    <a href="#" class="text-decoration-none remove-row" style="display: none;">- Xoá dòng</a>
                </div>
            </div>
        </div>
        <p class="mt-2"><a href="#" id="themsanpham" class="text-decoration-none">+ Thêm sản phẩm</a></p>
        <button type="submit" id="hoantatnhap" class="mt-4 btn btn-success">Hoàn tất nhập</button>
    </form>
</main>
<script>
$(document).ready(function() {
    // Hàm khởi tạo Select2 cho tất cả các thẻ select có class .select2
    function initializeSelect2() {
        $('.select2').select2({
            width: '100%' // Đảm bảo thẻ select sử dụng hết chiều rộng của container
        });
    }

    // Khởi tạo Select2 cho các thẻ select ban đầu
    initializeSelect2();


    // Định dạng số với dấu chấm phần nghìn
    function formatNumber(num) {
        return num.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    // Thêm sản phẩm mới
    $('#themsanpham').click(function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

        // Sao chép dòng sản phẩm đầu tiên
        let newProductDetail = $('.product-detail:first').clone();

        // Xóa các giá trị và khởi tạo lại Select2
        newProductDetail.find('select').val('').removeAttr('data-select2-id').removeClass(
            'select2-hidden-accessible').next('.select2-container').remove();
        newProductDetail.find('select').select2({
            width: '100%' // Đảm bảo thẻ select sử dụng hết chiều rộng của container
        });

        // Xóa giá trị các trường input
        newProductDetail.find('input').val('');

        // Hiển thị nút xóa cho dòng mới
        newProductDetail.find('.remove-row').show();

        // Thêm dòng mới vào form
        $('#noidungnhaphang').append(newProductDetail);

        // Cập nhật tùy chọn cho tất cả các thẻ select
        updateOptions();
    });

    // Cập nhật danh sách các tùy chọn trong thẻ select
    function updateOptions() {
        let selectedValues = [];
        $('.product').each(function() {
            let val = $(this).val();
            if (val) {
                selectedValues.push(val);
            }
        });

        $('.product').each(function() {
            let currentSelect = $(this);
            let currentValue = currentSelect.val();
            currentSelect.find('option').each(function() {
                if (selectedValues.includes($(this).val()) && $(this).val() != currentValue) {
                    $(this).prop('disabled', true);
                } else {
                    $(this).prop('disabled', false);
                }
            });
        });

        // Refresh Select2 to reflect disabled options
        $('.product').select2({
            width: '100%'
        });
    }

    // Bắt sự kiện change trên tất cả các thẻ select
    $('#nhaphangForm').on('change', '.product', function() {
        updateOptions();
    });

    // Cập nhật danh sách tùy chọn ban đầu
    updateOptions();
    // Xóa dòng sản phẩm
    $('#nhaphangForm').on('click', '.remove-row', function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

        // Xóa dòng sản phẩm
        $(this).closest('.product-detail').remove();

        // Cập nhật tùy chọn sau khi xóa dòng
        updateOptions();
    });

    // Định dạng số lượng và giá nhập
    // $('#nhaphangForm').on('input', '.quantity, .price', function() {
    //     let formattedValue = formatNumber($(this).val());
    //     $(this).val(formattedValue);
    // });
});
</script>
<script>
// Sau khi nhập hàng thành công
$("#nhaphangForm").submit(function(event) {
    event.preventDefault(); // Chặn sự kiện submit mặc định của form
    var formData = $(this).serialize();
    $.ajax({
        type: 'POST',
        url: '', // Thay đổi URL đến endpoint của bạn
        data: formData,
        success: function(response) {
            if (response.trim() === 'thành công') {
                window.location.href =
                    '?cmd=goods_receipts&act=list'; // Chuyển hướng đến trang thành công
                alert(response);
            } else {
                alert(response); // Alert nếu response không phải 'thành công'
            }
        },

    });

});


// Tính tổng và định dạng thập phân
$(document).ready(function() {
    function calculateTotal(name) {
        let total = 0;
        $(name).each(function() {
            let val = parseFloat($(this).val());
            if (!isNaN(val)) {
                total += val;
            }
        });
        return total;
    }

    function formatNumber(amount) {
        let parts = amount.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        return parts.join(".");
    }

    function calculateTotalPrice() {
        let totalPrice = 0;
        $('.product-detail').each(function() {
            let quantity = parseFloat($(this).find('.quantity').val());
            let price = parseFloat($(this).find('.price').val());
            if (!isNaN(quantity) && !isNaN(price)) {
                totalPrice += quantity * price;
            }
        });
        return totalPrice;
    }

    $('#nhaphangForm').on('change', '.quantity, .price', function() {
        $('#total_quantity').text(formatNumber(calculateTotal('.quantity')));
        $('#total_price').text(formatNumber(calculateTotalPrice()));
    });

    // Calculate total on initial page load (if values are present)
    $('#total_quantity').text(formatNumber(calculateTotal('.quantity')));
    $('#total_price').text(formatNumber(calculateTotalPrice()));
});
</script>