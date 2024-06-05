<?php
// echo 'Giỏ hàng online';

$orderList = $db->getRaw('SELECT * FROM cart');
// echo '<pre>';
// print_r($c->getCart());
// echo '</pre>';

// if (!empty($orderList))
// {
//     echo '<pre>';
//     print_r($orderList);
//     echo '</pre>';
// } else
// {
//     echo 'không có';
// }

$product_id_list = $c->getIdProduct();

$orderListOffline = $db->getRaw("SELECT id,image,title,price,discount FROM products WHERE id IN ($product_id_list)");

// echo "SELECT * FROM products WHERE id IN ($product_id_list)";

// if (!empty($orderListOffline))
// {
//     echo '<pre>';
//     print_r($orderListOffline);
//     echo '</pre>';
// } else
// {
//     echo 'không';
// }
// echo '<pre>';
// print_r($c->getIdProduct());
// echo '</pre>';

?>
<div class="container mt-5 mb-5 p-5" style="background-color: white;">
    <div class="row">
        <!-- Cart Items Section -->
        <div class="col-md-6">
            <h4 class="mb-4">Giỏ hàng của bạn</h4>
            <ul class="list-group mb-3">
                <?php

                $total = 0;
                foreach ($orderListOffline as $product):
                    $total += $product["discount"];
                    ?>
                <li class="list-group-item cart-item">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value=""
                            aria-label="Checkbox for following text input">
                    </div>
                    <div class="product-info">
                        <img src="<?= _HOST_ASSETS . '/images/product/' . $product["image"]; ?>"
                            alt="<?= $product["title"]; ?>">
                        <div class="product-details">
                            <h6 class="my-0"><?= $product["title"]; ?></h6>

                        </div>
                    </div>
                    <div class="product-price">
                        <span class="text-muted"><del><?= number_format($product["price"]); ?> VND</del></span><br>
                        <span class="text-muted"><?= number_format($product["discount"]); ?> VND</span>
                    </div>
                    <div class="quantity-controls">
                        <button type="button" class="btn btn-outline-secondary btn-sm btn-decrement">-</button>
                        <input type="number" class="form-control form-control-sm quantity-input" value="<?php foreach ($c->getCart() as $item)
                            {
                                if ($item['id'] == $product['id'])
                                {
                                    echo $item['quantity'];
                                }
                            } ?>">
                        <button type="button" class="btn btn-outline-secondary btn-sm btn-increment">+</button>
                    </div>
                    <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                </li>
                <?php endforeach; ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Tổng cộng (VND)</span>
                    <strong><?= number_format($total); ?> VND</strong>
                </li>
            </ul>
        </div>
        <!-- Shipping Information Section -->
        <div class="col-md-6">
            <h4 class="mb-4">Thông tin giao hàng</h4>
            <form>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Họ</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email <span class="text-muted">(Tuỳ
                                chọn)</span></label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                    </div>

                    <div class="col-12">
                        <label for="address2" class="form-label">Địa chỉ 2 <span class="text-muted">(Tuỳ
                                chọn)</span></label>
                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div>

                    <div class="col-md-5">
                        <label for="country" class="form-label">Quốc gia</label>
                        <select class="form-select" id="country" required>
                            <option value="">Chọn...</option>
                            <option>Việt Nam</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="state" class="form-label">Tỉnh/Thành phố</label>
                        <select class="form-select" id="state" required>
                            <option value="">Chọn...</option>
                            <option>Hà Nội</option>
                            <option>Hồ Chí Minh</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="zip" class="form-label">Mã bưu điện</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required>
                    </div>
                </div>

                <hr class="my-4">

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="same-address">
                    <label class="form-check-label" for="same-address">Giao hàng tới địa chỉ này</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="save-info">
                    <label class="form-check-label" for="save-info">Lưu thông tin này cho lần sau</label>
                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">Tiếp tục tới thanh toán</button>
            </form>
        </div>
    </div>
</div>