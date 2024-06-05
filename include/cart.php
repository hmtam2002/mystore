<?php
if (!isset($_SESSION['cart']))
{
    setSession('cart', []);
}
// $cart = getSession('cart');
class cart
{
    public function getCart()
    {
        return getSession('cart');
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
}