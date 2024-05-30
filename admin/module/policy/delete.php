<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
$filterAll = $f->filter();
if (!empty($filterAll['id']))
{
    $policyId = $filterAll['id'];
    $policyDetail = $db->getRows("SELECT * FROM news WHERE id=$policyId");
    if ($policyDetail > 0)
    {
        //thực hiện xoá
        $deletePolicy = $db->delete("news", "id = $policyId");
        if ($deletePolicy)
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
$f->redirect("?cmd=policy&act=list");