<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
$filterAll = $f->filter();
if (!empty($filterAll['id']))
{
    $authorId = $filterAll['id'];
    $author_detail = $db->getRows("SELECT * FROM brands WHERE id=$authorId");
    if ($author_detail > 0)
    {
        //thực hiện xoá
        $deleteAuthor = $db->delete("brands", "id = $authorId");
        if ($deleteAuthor)
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