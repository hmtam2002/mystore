<?php
$loi = false;
$orderInsert = [
    'code' => $code,
    'order_date' => date('Y-m-d H:i:s'),
    'price' => $tongdon,
    'shipfee' => $tienship,
    'total_price' => $tongdon + $tienship,
    'fullname' => $fillterAll['fullname'],
    'email' => $fillterAll['email'],
    'phone_number' => $fillterAll['phone_number'],
    'tinh' => $fillterAll['tinh'],
    'huyen' => $fillterAll['huyen'],
    'xa' => $fillterAll['xa'],
    'address' => $fillterAll['address'],
    'payments' => $fillterAll['flexRadioDefault'],
    'note' => $fillterAll['ghichu'],
    'gtgt-fullname' => $fillterAll['gtgt_fullname'],
    'gtgt-company_name' => $fillterAll['gtgt_company-name'],
    'gtgt-address' => $fillterAll['gtgt_company-address'],
    'gtgt-mst' => $fillterAll['gtgt_company-mst']
];
if ($db->insert('orders', $orderInsert))
{
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
    $subject = 'Đặt hàng thành công - MUASACH.VN';
    $content = 'Chào khách hàng ' . $fillterAll['fullname'] . '<br>';
    $content .= 'Anh /chị đã đặt hàng thành công với mã đơn hàng là ' . $code . '<br>';
    $content .= 'Để kiểm tra thông tin đơn anh chị vui lòng truy cập MUASACH.VN mục tra cứu đơn hàng<br>';
    $content .= 'Trân Trọng';

    $email = $fillterAll['email'];

    $f->sendMail($email, $subject, $content);
    $f->redirect(_HOST . '/thanh-toan/?redirect=success');
}