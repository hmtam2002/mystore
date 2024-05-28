<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
$filterAll = $f->filter();
if (!empty($filterAll['id']))
{
    $productId = $filterAll['id'];
    $productDetail = $db->getRows("SELECT * FROM news WHERE id=$productId");
    if ($productDetail > 0)
    {
        //thực hiện xoá
        $deleteProduct = $db->delete("news", "id = $productId");
        if ($deleteProduct)
        {
            setFlashData("smg", "Đã xoá bài viết thành công");
            setFlashData("smg_type", "success");
        } else
        {
            setFlashData("smg", "Bài viết này đang được sử dụng");
            setFlashData("smg_type", "danger");
        }
    } else
    {
        setFlashData("smg", "Bài viết không tồn tại trong hệ thống");
        setFlashData("smg_type", "danger");
    }

} else
{
    setFlashData("smg", "Liên kết không tồn tại");
    setFlashData("smg_type", "danger");
}
$f->redirect("?cmd=service&act=list");