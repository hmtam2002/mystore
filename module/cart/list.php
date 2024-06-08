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
                                <div class="form-check ">
                                    <input type="checkbox" class="form-check-input" name="checkAll">
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
                            <div class="col-2 d-flex align-items-center">Tổng cộng</div>
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
            <div class="col-md-4 ">
                <div class="bg-white border rounded-3 p-3">
                    <div class="d-flex justify-content-between">
                        <span>Thành tiền</span>
                        <span>900.000đ</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span><b>Tổng Số Tiền (gồm VAT)</b></span>
                        <span>900.000đ</span>
                    </div>
                    <button type="submit" class="mt-4 w-100 btn btn-danger">Thanh toán</button>
                </div>
            </div>
        </div>
    </form>

</div>