<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
$filterAll = $f->filter();
if (!empty($filterAll['id']))
{
    $bannerId = $filterAll['id'];
    $banner_detail = $db->getRows("SELECT * FROM images WHERE id=$bannerId");
    if ($banner_detail > 0)
    {
        //thực hiện xoá
        $deleteBanner = $db->delete("images", "id = $bannerId");
        if ($deleteBanner)
        {
            setFlashData("smg", "Đã xoá ảnh thành công");
            setFlashData("smg_type", "success");
        } else
        {
            setFlashData("smg", "Đã xoá ảnh thành công");
            setFlashData("smg_type", "success");
        }
    } else
    {
        setFlashData("smg", "Ảnh không tồn tại trong hệ thống");
        setFlashData("smg_type", "danger");
    }

} else
{
    setFlashData("smg", "Liên kết không tồn tại");
    setFlashData("smg_type", "danger");
}
$f->redirect("?cmd=banner&act=list");