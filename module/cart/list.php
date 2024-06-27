<?php
$orderListOffline = $c->getCart();


if (empty($orderListOffline))
{
    $thongbao = '<div class="alert alert-danger">Giỏ hàng của bạn trống</div>';
}
// Xử lý submit form
if ($f->isPOST() && isset($_POST['checkout']) && $_POST['checkout'] == true)
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
if ($f->isPOST() && isset($_POST['id']) && isset($_POST['quantity']))
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
// Xử lý yêu cầu xoá sản phẩm
if ($f->isPOST() && isset($_POST['action']) && $_POST['action'] == 'delete' && isset($_POST['id']))
{
    $productId = intval($_POST['id']);
    foreach ($_SESSION['cart'] as $key => $product)
    {
        if ($product['id'] == $productId)
        {
            unset($_SESSION['cart'][$key]);
            echo json_encode(["status" => "success"]);
            exit();
        }
    }
    echo json_encode(["status" => "error", "message" => "Product not found in cart."]);
    exit();
}
?>

<div class="wrap-content">

    <h1 class="my-2 my-md-3">Giỏ hàng</h1>
    <?= !empty($thongbao) ? $thongbao : '' ?>
    <form method="post">
        <div class="row mx-auto mx-md-0 mb-3 mb-md-5">
            <div class="col-md-8">
                <!-- nút chọn tất cả -->
                <div class="row p-md-2 py-2 border mb-2 rounded-3 bg-white align-items-center">
                    <div class="col-1 align-self-center">
                        <div class="form-check my-auto">
                            <input type="checkbox" class="form-check-input" name="checkAll">
                        </div>
                    </div>
                    <div class="col-md-5 col-5">Chọn tất cả</div>
                    <div class="col-md-3 col-3 text-center">Số lượng</div>
                    <div class="col-md-2 col text-md-center">Thành tiền</div>
                </div>
                <!-- các thành phần của giỏ hàng -->
                <?php
                $total = 0;
                foreach ($orderListOffline as $product):
                    $total += $product["discount"];
                    ?>
                    <div class="row p-md-2 py-2 border mb-1 rounded-3 bg-white align-items-center">
                        <div class="col-1 align-self-center">
                            <div class="form-check my-auto">
                                <input data-id="<?= $product['id'] ?>" value="<?= $product['id'] ?>" type="checkbox"
                                    class="product_check form-check-input" name="product_check[]">
                            </div>
                        </div>
                        <div class="col-2">
                            <img class="img-fluid" style="max-height: 100px;"
                                src="<?= _HOST_ASSETS . '/images/product/' . $product["image"]; ?>"
                                alt="<?= $product["title"]; ?>">
                        </div>
                        <div class="col-3 d-flex flex-column justify-content-between">
                            <div class="title"><?= $product["title"]; ?></div>
                            <div class="price d-flex flex-column flex-md-row align-items-md-baseline align-items-start">
                                <span class="fw-bold"><?= number_format($product["discount"]); ?>đ</span>
                                <span class="text-muted ms-md-2">
                                    <del><?= number_format($product["price"]); ?>đ</del>
                                </span>
                            </div>
                        </div>
                        <div class="col-3 justify-content-center quantity-controls">
                            <button type="button" data-id="<?= $product['id'] ?>"
                                class="btn btn-outline-secondary btn-sm decrease">-</button>
                            <input type="number" id="quantity-<?= $product['id'] ?>" data-id="<?= $product['id'] ?>"
                                class="fw-bold form-control form-control-sm quantity-input"
                                value="<?= $product['quantity'] ?>" readonly>
                            <button type="button" data-id="<?= $product['id'] ?>"
                                class="btn btn-outline-secondary btn-sm increase">+</button>
                        </div>
                        <div class="col-2 text-center fw-bold text-danger">
                            <?= number_format($product['discount'] * $product['quantity']) ?>đ
                        </div>
                        <div class="col-1 justify-content-center px-0 col-md ">
                            <button type="button" class="btn btn-sm btn-delete" data-id="<?= $product['id'] ?>">
                                <i class="fas fa-trash-alt text-danger fs-5"></i>
                            </button>
                        </div>
                    </div>
                    <?php
                endforeach ?>
            </div>
            <div class="col-md-4 px-0 ps-md-3">
                <div class="bg-white border rounded-3 p-3">
                    <div class="d-flex justify-content-between">
                        <span>Thành tiền</span>
                        <span id="total-amount-before"><?= number_format($c->totalCart()) ?> đ</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Phí vận chuyển (tạm tính)</span>
                        <span id="total-amount-before">0 đ</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span class="col d-flex flex-column justify-content-center"><b>Tổng Số Tiền (gồm VAT)</b></span>
                        <span class="text-danger fw-bold fs-5" id="total-amount"><?= number_format($c->totalCart()) ?>
                            đ</span>
                    </div>
                    <input type="hidden" name="checkout" value="true">
                    <button type="submit" class="mt-4 w-100 btn btn-danger" id="checkout-btn" disabled>Thanh
                        toán</button>
                </div>
            </div>
        </div>
    </form>

</div>
<script>
    $(document).ready(function () {
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
                success: function (response) {
                    console.log('Session updated successfully for product ' + productId);
                },
                error: function () {
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
            $('.product_check:checked').each(function () {
                let productRow = $(this).closest('.row');
                let quantity = parseInt(productRow.find('.quantity-input').val());
                let price = parseFloat(productRow.find('.price span.fw-bold').text().replace(/\D/g, ''));
                total += quantity * price;
            });
            $('#total-amount').text(formatNumber(total) + ' đ');
            $('#total-amount-before').text(formatNumber(total) + ' đ');
        }

        // Update product total price based on quantity
        function updateProductTotal(productRow) {
            let quantity = parseInt(productRow.find('.quantity-input').val());
            let price = parseFloat(productRow.find('.price span.fw-bold').text().replace(/\D/g, ''));
            let totalPrice = quantity * price;
            productRow.find('.fw-bold.text-danger').text(formatNumber(totalPrice) + ' đ');
        }

        // Check trạng thái của các checkbox và cập nhật nút "Thanh toán"
        function updateCheckoutButton() {
            if ($('.product_check:checked').length > 0) {
                $('#checkout-btn').prop('disabled', false);
            } else {
                $('#checkout-btn').prop('disabled', true);
            }
        }

        // Checkbox event handler
        $('input[name="checkAll"]').change(function () {
            $('.product_check').prop('checked', $(this).prop('checked'));
            calculateTotal();
            updateCheckoutButton();
        });

        $('.product_check').change(function () {
            calculateTotal();
            updateCheckoutButton();
        });

        // Quantity input event handler
        $('input[type="number"]').on('input', function () {
            let productRow = $(this).closest('.row');
            updateQuantity($(this));
            updateProductTotal(productRow);
            calculateTotal();
            updateCheckoutButton();
        });

        // Increase and decrease buttons event handler
        $('.quantity-controls button').on('click', function () {
            let input = $(this).siblings('input[type="number"]');
            let currentVal = parseInt(input.val());
            if ($(this).hasClass('increase')) {
                input.val(currentVal + 1).trigger('input');
            } else if ($(this).hasClass('decrease') && currentVal > 1) {
                input.val(currentVal - 1).trigger('input');
            }
        });

        // Xoá sản phẩm khỏi giỏ hàng
        $('.btn-delete').click(function () {
            let productId = $(this).data('id');
            $.post('', {
                action: 'delete',
                id: productId
            }, function (response) {
                let result = JSON.parse(response);
                if (result.status === 'success') {
                    location.reload();
                } else {
                    alert(result.message);
                }
            });
        });

        // Initialize total amount to 0
        $('#total-amount').text('0 đ');
        $('#total-amount-before').text('0 đ');
        updateCheckoutButton();
    });
</script>