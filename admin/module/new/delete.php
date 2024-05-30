<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
$filterAll = $f->filter();
if (!empty($filterAll['id']))
{
    $newId = $filterAll['id'];
    $newDetail = $db->getRows("SELECT * FROM news WHERE id=$newId");
    if ($newDetail > 0)
    {
        //thực hiện xoá
        $deleteNew = $db->delete("news", "id = $newId");
        if ($deleteNew)
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
$f->redirect("?cmd=new&act=list");