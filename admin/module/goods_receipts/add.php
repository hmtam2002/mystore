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

    // Xử lý dữ liệu sản phẩm

    // Thêm dữ liệu vào bảng goods_receipts
    $code = $f->generateOrderId();
    $goods_receipts_insert = [
        'code' => $code,
        'admin_id' => getSession('admin_id'),
        'create_date' => date('Y-m-d H:i:s')
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
        <div class="col">
            <p>Tổng số lượng nhập: <span id="total_quantity" class="fw-bold text-danger fs-5">0</span></p>
            <p>Tổng giá tiền nhập: <span id="total_price" class="fw-bold text-success fs-5">0</span><span
                    class="fw-bold text-danger">
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
                    <label for="quantity" class="form-label">Số lượng</label>
                </div>
                <div class="col">
                    <label for="total_price" class="form-label">Giá nhập</label>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row align-items-center py-0">
                <div class="col-4">
                    <select id="product_name" name="product_id[]" class="form-control" required>
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
                    <input placeholder="Số lượng nhập" type="number" name="quantity[]" class="form-control quantity"
                        min="1" required>
                </div>
                <div class="col">
                    <input placeholder="Nhập số tiền" min="1000" type="number" name="total_price[]"
                        class="form-control price" required>
                </div>
                <div class="col-2">
                    <!-- <a class="text-decoration-none" href="#">- Xoá dòng</a> -->
                </div>
            </div>
        </div>
        <p class="mt-2"><a href="#" id="themsanpham" class="text-decoration-none">+ Thêm sản phẩm</a></p>
        <button type="submit" id="hoantatnhap" class="mt-4 btn btn-success">Hoàn tất nhập</button>
    </form>

</main>
<script>
$(document).ready(function() {
    $('#product_name').select2();
});
$(document).ready(function() {
    var dropdownCounter = 1; // Biến đếm để đảm bảo id duy nhất cho mỗi dropdown

    // Xử lý sự kiện khi nhấn nút "Thêm sản phẩm"
    $('#themsanpham').click(function(event) {
        event.preventDefault();

        // Xây dựng chuỗi HTML cho các tùy chọn sản phẩm
        var optionsHtml = '<option value="" selected>Chọn sản phẩm</option>';
        <?php foreach ($productList as $item): ?>
        var title = '<?php echo addslashes($item['title']); ?>';
        var productName = '<?php echo addslashes($item['product_name']); ?>';
        var optionValue = '<?php echo addslashes($item['id']); ?>';
        var productTypeId = '<?php echo addslashes($item['product_type_id']); ?>';

        var optionText = productTypeId == 1 ? title : productName;
        optionsHtml += '<option value="' + optionValue + '">' + optionText + '</option>';
        <?php endforeach; ?>

        // Tạo id duy nhất cho dropdown mới
        var dropdownId = 'product_name_' + dropdownCounter;

        // Thêm các tùy chọn vào dropdown và sử dụng Select2
        $('#noidungnhaphang').append(
            '<div class="row mt-2 align-items-center">' +
            '<div class="col-4">' +
            '<select id="' + dropdownId +
            '" name="product_id[]" class="form-control select2" required>' +
            optionsHtml +
            '</select>' +
            '</div>' +
            '<div class="col">' +
            '<input placeholder="Số lượng nhập" type="number" name="quantity[]" class="form-control quantity" min="1" required>' +
            '</div>' +
            '<div class="col">' +
            '<input placeholder="Nhập số tiền" type="number" min="1000" name="total_price[]" class="form-control price" required>' +
            '</div>' +
            '<div class="col-2 d-flex align-items-center"><a class="text-decoration-none delete-row" href="#">- Xoá dòng</a></div>' +
            '</div>'
        );

        // Khởi tạo Select2 cho dropdown mới thêm vào
        $('#' + dropdownId).select2();

        // Tăng biến đếm để chuẩn bị cho dropdown tiếp theo
        dropdownCounter++;
    });

    // Xử lý sự kiện khi nhấn nút "Xoá dòng"
    $('#noidungnhaphang').on('click', '.delete-row', function(event) {
        event.preventDefault();

        // Xoá dòng chứa liên kết được nhấn
        $(this).closest('.row').remove();
    });
});

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

    // Bắt sự kiện change cho các thẻ input có class 'quantity'
    $('.quantity').on('change', function() {
        $('#total_quantity').text(calculateTotal('.quantity'));
    });
    $('.price').on('change', function() {
        $('#total_price').text(calculateTotal('.price'));
    });

    // Tính tổng khi trang được tải lần đầu tiên (nếu có giá trị sẵn)
    calculateTotal();
});
</script>