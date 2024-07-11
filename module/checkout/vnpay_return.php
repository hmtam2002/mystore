<?php
$loi = false;
$filterAll = getFlashData('order');
$orderInsert = [
    'code' => $filterAll['code'],
    'order_date' => date('Y-m-d H:i:s'),
    'price' => $filterAll['tongdon'],
    'shipfee' => $filterAll['tienship'],
    'total_price' => $filterAll['tongdon'] + $filterAll['tienship'],
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
} else
{
    // echo '<pre>';
    // print_r($orderInsert);
    // echo '</pre>';
    echo 'Có lỗi xảy ra';
    exit();
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
// require_once 'view/VNPAY/thanhtoanthanhcong.php';
$f->redirect(_HOST . '/thanh-toan/?payonline=success');