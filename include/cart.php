<?php
class cart
{
    public function __construct()
    {
        if (!isset($_SESSION['cart']))
        {
            $_SESSION['cart'] = [];
        }
    }
    public function getCart()
    {
        return $_SESSION['cart'];
    }
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
    public function removeCart()
    {
        removeSession('cart');
    }
    public function numberOfCart()
    {
        return count($this->getCart());
    }
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
    public function totalCart()
    {
        $total = 0;
        foreach ($this->getCart() as $item)
        {
            $total += $item['discount'] * $item['quantity'];
        }
        return $total;
    }
}