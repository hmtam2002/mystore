<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
$filterAll = $f->filter();
if (!empty($filterAll['id']))
{
    $userId = $filterAll['id'];
    $user_detail = $db->getRows("SELECT * FROM admin WHERE id=$userId");
    if ($user_detail > 0)
    {
        //thực hiện xoá
        $deleteUser = $db->delete("admin", "id = $userId");
        if ($deleteUser)
        {
            setFlashData("smg", "Đã xoá người dùng loại thành công");
            setFlashData("smg_type", "success");
        } else
        {
            setFlashData("smg", "Người dùng này đang được sử dụng");
            setFlashData("smg_type", "danger");
        }
    } else
    {
        setFlashData("smg", "Người dùng không tồn tại trong hệ thống");
        setFlashData("smg_type", "danger");
    }

} else
{
    setFlashData("smg", "Liên kết không tồn tại");
    setFlashData("smg_type", "danger");
}
$f->redirect("?cmd=user&act=list");