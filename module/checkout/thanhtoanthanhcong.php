<?php
if ($_GET['vnp_ResponseCode'] == '00')
{
    $loi = false;
    $filterAll = getFlashData('order');
    $orderInsert = [
        'code' => $filterAll['code'],
        'order_date' => date('Y-m-d H:i:s'),
        'total_price' => $filterAll['tongdon'],
        'fullname' => $filterAll['fullname'],
        'email' => $filterAll['email'],
        'phone_number' => $filterAll['phone_number'],
        'tinh' => $filterAll['tinh'],
        'huyen' => $filterAll['huyen'],
        'xa' => $filterAll['xa'],
        'address' => $filterAll['address'],
        'payments' => $filterAll['flexRadioDefault'],
        'note' => $filterAll['ghichu'],
        'gtgt-fullname' => $filterAll['gtgt_fullname'],
        'gtgt-company_name' => $filterAll['gtgt_company-name'],
        'gtgt-address' => $filterAll['gtgt_company-address'],
        'gtgt-mst' => $filterAll['gtgt_company-mst']
    ];
    if ($db->insert('orders', $orderInsert))
    {
        $code = $filterAll['code'];
        $orderId = $db->oneRaw("SELECT id FROM orders WHERE code = '$code'")['id'];
        foreach ($_SESSION['checkout'] as $item)
        {
            $orderDetailInsert = [
                'order_id' => $orderId,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'discount' => $item['discount'],
            ];
            if (!$db->insert('order_details', $orderDetailInsert))
            {
                $loi = true;
            }
        }
    }
    if ($loi)
    {
        echo 'Có lỗi';
        die();
    } else
    {
        $result = [];

        foreach ($_SESSION['cart'] as $item1)
        {
            $found = false;
            foreach ($_SESSION['checkout'] as $item2)
            {
                if ($item1['id'] == $item2['id'])
                {
                    $found = true;
                    break;
                }
            }
            if (!$found)
            {
                $result[] = $item1;
            }
        }
        $_SESSION['cart'] = $result;

        unset($_SESSION['checkout']);
    }
    ?>
    <div class="wrap-content my-3 bg-white p-4">
        <p class="fs-3 text-center fw-bold text-success mb-5">Giao dịch thành công</p>
        <div style="width: 100px; height: 100px;"
            class="animate__animated animate__tada mx-auto d-flex justify-content-center align-items-center rounded-circle border border-success">
            <i class="text-success fa fa-solid fa-check fs-1"></i>
        </div>
        <div class="row col-lg-3 col-sm-5 col mx-auto mt-5">
            <a href="<?= _HOST ?>" class="btn btn-success">Quay về trang chủ</a>
        </div>
    </div>
    <?php
} else
{ ?>
    <div class="wrap-content my-3 bg-white p-4">
        <p class="fs-3 text-center fw-bold text-warning mb-5">Giao dịch thất bại</p>
        <div style="width: 100px; height: 100px;"
            class="animate__animated animate__tada mx-auto d-flex justify-content-center align-items-center rounded-circle border border-warning">
            <i class="text-warning fas fa-exclamation  fs-1"></i>
        </div>
        <div class="row col-lg-3 col-sm-5 col mx-auto mt-5">
            <a href="<?= _HOST ?>" class="btn btn-warning">Quay về trang chủ</a>
        </div>
    </div>
    <?php
}
?>