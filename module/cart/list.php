<?php
$orderListOffline = $c->getCart();


if (empty($orderListOffline))
{
    $thongbao = '<div class="alert alert-danger">Giỏ hàng của bạn trống</div>';
}
// Xử lý submit form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkout']) && $_POST['checkout'] == true)
{
    $filterAll = $f->filter();
    $_SESSION['filterAll'] = $filterAll;
    $selectedProducts = [];
    if (isset($_POST['product_check']))
    {
        foreach ($_SESSION['cart'] as $product)
        {
            if (in_array($product['id'], $_POST['product_check']))
            {
                $selectedProducts[] = $product;
            }
        }
    }

    // Xử lý các sản phẩm đã chọn
    // Ví dụ, lưu vào session để xử lý thanh toán sau
    $_SESSION['checkout'] = $selectedProducts;
    $f->redirect(_HOST . '/thanh-toan');
}
// Xử lý yêu cầu AJAX để cập nhật số lượng sản phẩm
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['quantity']))
{
    $productId = intval($_POST['id']);
    $quantity = intval($_POST['quantity']);

    if ($quantity > 0)
    {
        foreach ($_SESSION['cart'] as &$product)
        {
            if ($product['id'] == $productId)
            {
                $product['quantity'] = $quantity;
                echo json_encode(["status" => "success"]);
                exit();
            }
        }
        echo json_encode(["status" => "error", "message" => "Product not found in cart."]);
    } else
    {
        echo json_encode(["status" => "error", "message" => "Quantity must be a positive integer."]);
    }
    exit();
}
?>

<div class="wrap-content">

    <h1 class="mt-3 mb-3">Giỏ hàng</h1>
    <?= !empty($thongbao) ? $thongbao : '' ?>
    <form method="post">
        <div class="row mb-5">
            <div class="col-md-8">
                <!-- nút chọn tất cả -->
                <div class="row ms-auto border mb-2 rounded-3">
                    <div class="p-4 pt-2 pb-2 bg-white rounded-3">
                        <div class="row">
                            <div class="col-1">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="checkAll">
                                </div>
                            </div>
                            <div class="col-6">Chọn tất cả</div>
                            <div class="col-2 ps-4">Số lượng</div>
                            <div class="col">Thành tiền</div>
                        </div>
                    </div>
                </div>
                <!-- các thành phần của giỏ hàng -->
                <?php
                $total = 0;
                foreach ($orderListOffline as $product):
                    $total += $product["discount"];
                    ?>
                <div class="row ms-auto border mb-1 rounded-3">
                    <div class="p-4 bg-white rounded-3">
                        <div class="row">
                            <div class="col-1 d-flex flex-column justify-content-center">
                                <div class="form-check">
                                    <input data-id="<?= $product['id'] ?>" value="<?= $product['id'] ?>" type="checkbox"
                                        class="product_check form-check-input" name="product_check[]">
                                </div>
                            </div>
                            <div class="col-2 col-md-2">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img class="img-fluid" style="max-height: 100px;"
                                        src="<?= _HOST_ASSETS . '/images/product/' . $product["image"]; ?>"
                                        alt="<?= $product["title"]; ?>">
                                </div>
                            </div>
                            <div class="col-3 ms-2 me-5 d-flex flex-column justify-content-between">
                                <div class="title"><?= $product["title"]; ?></div>
                                <div class="price d-flex align-items-baseline">
                                    <span class="fw-bold"><?= number_format($product["discount"]); ?>đ</span>
                                    <span class="text-muted ms-2">
                                        <del><?= number_format($product["price"]); ?>đ</del>
                                    </span>
                                </div>
                            </div>
                            <div class="col-2 ms-2 quantity-controls">
                                <button type="button" data-id="<?= $product['id'] ?>"
                                    class="btn btn-outline-secondary btn-sm decrease">-</button>
                                <input type="number" id="quantity-<?= $product['id'] ?>" data-id="<?= $product['id'] ?>"
                                    class="fw-bold form-control form-control-sm quantity-input"
                                    value="<?= $product['quantity'] ?>" readonly>
                                <button type="button" data-id="<?= $product['id'] ?>"
                                    class="btn btn-outline-secondary btn-sm increase">+</button>
                            </div>
                            <div class="col-2 d-flex align-items-center fw-bold text-danger">
                                <?= number_format($product['discount'] * $product['quantity']) ?>đ
                            </div>
                            <div class="col d-flex align-items-center">
                                <!-- <a href="?module=cart&action=remove&id=" class="text-danger"><i
                                        class="fas fa-trash-alt"></i></a> -->
                                <form method="post">
                                    <input type="hidden" name="checkout" value="false">
                                    <button type="submit" class="btn btn-sm"><i
                                            class="fas fa-trash-alt fs-5 text-danger"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                endforeach ?>
            </div>
            <div class="col-md-4">
                <div class="bg-white border rounded-3 p-3">
                    <div class="d-flex justify-content-between">
                        <span>Thành tiền</span>
                        <span><?= number_format($c->totalCart()) ?> đ</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span class="col d-flex flex-column justify-content-center"><b>Tổng Số Tiền (gồm VAT)</b></span>
                        <span class="text-danger fw-bold fs-5" id="total-amount"><?= number_format($c->totalCart()) ?>
                            đ</span>
                    </div>
                    <input type="hidden" name="checkout" value="true">
                    <button type="submit" class="mt-4 w-100 btn btn-danger">Thanh toán</button>
                </div>
            </div>
        </div>
    </form>

</div>
<script>
$(document).ready(function() {
    // Update product quantity in the session via AJAX
    function updateQuantity(input) {
        var quantity = input.val();
        var productId = input.data('id');
        $.ajax({
            url: '', // Send request to the current file
            method: 'POST',
            data: {
                id: productId,
                quantity: quantity
            },
            success: function(response) {
                console.log('Session updated successfully for product ' + productId);
            },
            error: function() {
                console.log('Error updating session for product ' + productId);
            }
        });
    }

    // Calculate and format number with thousands separator
    function formatNumber(amount) {
        let parts = amount.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        return parts.join(".");
    }

    // Calculate total price of selected products
    function calculateTotal() {
        let total = 0;
        $('.product_check:checked').each(function() {
            let productRow = $(this).closest('.row');
            let quantity = parseInt(productRow.find('.quantity-input').val());
            let price = parseFloat(productRow.find('.price span.fw-bold').text().replace(/\D/g, ''));
            total += quantity * price;
        });
        $('#total-amount').text(formatNumber(total) + ' đ');
    }

    // Update product total price based on quantity
    function updateProductTotal(productRow) {
        let quantity = parseInt(productRow.find('.quantity-input').val());
        let price = parseFloat(productRow.find('.price span.fw-bold').text().replace(/\D/g, ''));
        let totalPrice = quantity * price;
        productRow.find('.fw-bold.text-danger').text(formatNumber(totalPrice) + ' đ');
    }

    // Checkbox event handler
    $('input[name="checkAll"]').change(function() {
        $('.product_check').prop('checked', $(this).prop('checked'));
        calculateTotal();
    });

    $('.product_check').change(function() {
        calculateTotal();
    });

    // Quantity input event handler
    $('input[type="number"]').on('input', function() {
        let productRow = $(this).closest('.row');
        updateQuantity($(this));
        updateProductTotal(productRow);
        calculateTotal();
    });

    // Increase and decrease buttons event handler
    $('.quantity-controls button').on('click', function() {
        let input = $(this).siblings('input[type="number"]');
        let currentVal = parseInt(input.val());
        if ($(this).hasClass('increase')) {
            input.val(currentVal + 1).trigger('input');
        } else if ($(this).hasClass('decrease') && currentVal > 1) {
            input.val(currentVal - 1).trigger('input');
        }
    });

    // Initialize total amount to 0
    $('#total-amount').text('0 đ');
});
</script>