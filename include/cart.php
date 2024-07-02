<?php
class cart
{
    // Khởi tạo biến giỏ hàng
    public function __construct()
    {
        if (!isset($_SESSION['cart']))
        {
            $_SESSION['cart'] = [];
        }
    }
    // gọi giỏ hàng ra
    public function getCart()
    {
        return $_SESSION['cart'];
    }
    // thêm sản phẩm vào giỏ hàng
    public function updateCart($data = [])
    {
        $cart = $this->getCart();
        $found = false;
        foreach ($cart as &$cartItem)
        {
            if ($cartItem['id'] == $data['id'])
            {
                $cartItem['quantity'] += $data['quantity']; // Cộng số lượng sản phẩm
                $found = true;
                break;
            }
        }
        if (!$found)
        {
            $cart[] = $data;
        }
        setSession('cart', $cart);
    }
    //xoá hết sản phẩm trong giỏ hàng
    public function removeCart()
    {
        removeSession('cart');
    }
    //đếm số lượng sản phẩm trong giỏ hàng
    public function numberOfCart()
    {
        return count($this->getCart());
    }
    //trả về mảng danh sách các id trong giỏ hàng
    public function getIdProduct()
    {
        $productIds = '';
        foreach ($this->getCart() as $item)
        {
            $productIds .= "'" . $item['id'] . "',";
        }
        // Xóa dấu phẩy cuối cùng
        $productIds = rtrim($productIds, ",");
        return $productIds;
    }
    //tính tổng tiền có trong giỏ hàng bằng công thức tổng sl * đơn giá của từng sản phẩm
    public function totalCart()
    {
        $total = 0;
        foreach ($this->getCart() as $item)
        {
            $total += $item['discount'] * $item['quantity'];
        }
        return $total;
    }
    public function totalCheckout($checkout = [])
    {
        $total = 0;
        foreach ($checkout as $item)
        {
            $total += $item['discount'] * $item['quantity'];
        }
        return $total;
    }
}