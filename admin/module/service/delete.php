<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
$filterAll = $f->filter();
if (!empty($filterAll['id']))
{
    $serviceId = $filterAll['id'];
    $serviceDetail = $db->getRows("SELECT * FROM news WHERE id=$serviceId");
    if ($serviceDetail > 0)
    {
        //thực hiện xoá
        $deleteService = $db->delete("news", "id = $serviceId");
        if ($deleteService)
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