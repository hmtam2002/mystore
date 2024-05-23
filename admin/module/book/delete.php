<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
$filterAll = $f->filter();
if (!empty($filterAll['id']))
{
    $productId = $filterAll['id'];
    $productDetail = $db->getRows("SELECT * FROM products WHERE id=$productId");
    if ($productDetail > 0)
    {
        //thực hiện xoá
        $deleteProduct = $db->delete("products", "id = $productId");
        if ($deleteProduct)
        {
            setFlashData("smg", "Đã xoá sách thành công");
            setFlashData("smg_type", "success");
        } else
        {
            setFlashData("smg", "Sách này đang được sử dụng");
            setFlashData("smg_type", "danger");
        }
    } else
    {
        setFlashData("smg", "Sách không tồn tại trong hệ thống");
        setFlashData("smg_type", "danger");
    }

} else
{
    setFlashData("smg", "Liên kết không tồn tại");
    setFlashData("smg_type", "danger");
}
$f->redirect("?cmd=book&act=list");