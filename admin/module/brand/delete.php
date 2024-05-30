<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
$filterAll = $f->filter();
if (!empty($filterAll['id']))
{
    $brandId = $filterAll['id'];
    $brand_detail = $db->getRows("SELECT * FROM brands WHERE id=$brandId");
    if ($brand_detail > 0)
    {
        //thực hiện xoá
        $brandAuthor = $db->delete("brands", "id = $brandId");
        if ($brandAuthor)
        {
            setFlashData("smg", "Đã xoá dữ liệu thành công");
            setFlashData("smg_type", "success");
        } else
        {
            setFlashData("smg", "Dữ liệu này đang được sử dụng");
            setFlashData("smg_type", "danger");
        }
    } else
    {
        setFlashData("smg", "Dữ liệu không tồn tại trong hệ thống");
        setFlashData("smg_type", "danger");
    }

} else
{
    setFlashData("smg", "Liên kết không tồn tại");
    setFlashData("smg_type", "danger");
}
$f->redirect("?cmd=brand&act=list");