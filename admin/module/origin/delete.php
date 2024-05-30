<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
$filterAll = $f->filter();
if (!empty($filterAll['id']))
{
    $originId = $filterAll['id'];
    $origin_detail = $db->getRows("SELECT * FROM origins WHERE id=$originId");
    if ($origin_detail > 0)
    {
        //thực hiện xoá
        $deleteOrigin = $db->delete("origins", "id = $originId");
        if ($deleteOrigin)
        {
            setFlashData("smg", "Đã xoá thành công");
            setFlashData("smg_type", "success");
        } else
        {
            setFlashData("smg", "Dữ liệu đang được sử dụng, không thể xoá");
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
$f->redirect("?cmd=origin&act=list");