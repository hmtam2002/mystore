<?php
// echo 'Giỏ hàng online';

$orderList = $db->getRaw('SELECT * FROM cart');

$orderListOffline = $c->getCart();
// if ($f->isPOST())
// {
//     $filterAll = $f->filter();
//     $_SESSION['checkout'] = $filterAll;
//     $f->redirect(_HOST . '/thanh-toan');
// }

if (isset($_GET['action']))
{
    $filterAll = $f->filter();
    if ($filterAll['action'] == 'delete')
    {
        echo $filterAll['id'];
    }
}

if (empty($orderListOffline))
{
    $thongbao = '<div class="alert alert-danger">Giỏ hàng của bạn trống</div>';
}
// Xử lý submit form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkout']))
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
                                <div class="price d-flex">
                                    <span class=""><?= number_format($product["discount"]); ?>đ</span>
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
                                <a href="?module=cart&action=remove&id=<?= $item['id'] ?>" class="text-danger"><i
                                        class="fas fa-trash-alt"></i></a>
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
                    <input type="hidden" name="checkout" value="1">
                    <button type="submit" class="mt-4 w-100 btn btn-danger">Thanh toán</button>
                </div>
            </div>
        </div>
    </form>

</div>
<!-- <script>
$(document).ready(function() {
    $('input[type="number"]').on('input', function() {
        var quantity = $(this).val();
        var productId = $(this).data('id');
        $.ajax({
            url: '', // Gửi yêu cầu tới chính file hiện tại
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
    });
});
</script> -->
<script>
$(document).ready(function() {
    function updateQuantity(input) {
        var quantity = input.val();
        var productId = input.data('id');
        $.ajax({
            url: '', // Gửi yêu cầu tới chính file hiện tại
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

    $('input[type="number"]').on('input', function() {
        updateQuantity($(this));
    });

    $('.quantity-controls button').on('click', function() {
        var input = $(this).siblings('input[type="number"]');
        var currentVal = parseInt(input.val());
        if ($(this).hasClass('increase')) {
            input.val(currentVal + 1).trigger('input');
        } else if ($(this).hasClass('decrease') && currentVal > 1) {
            input.val(currentVal - 1).trigger('input');
        }
    });
});
</script>