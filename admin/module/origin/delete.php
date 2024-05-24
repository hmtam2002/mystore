<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
$filterAll = $f->filter();
if (!empty($filterAll['id']))
{
    $authorId = $filterAll['id'];
    $author_detail = $db->getRows("SELECT * FROM authors WHERE id=$authorId");
    if ($author_detail > 0)
    {
        //thực hiện xoá
        $deleteAuthor = $db->delete("authors", "id = $authorId");
        if ($deleteAuthor)
        {
            setFlashData("smg", "Đã xoá tác giả thành công");
            setFlashData("smg_type", "success");
        } else
        {
            setFlashData("smg", "Tác giả này đang được sử dụng");
            setFlashData("smg_type", "danger");
        }
    } else
    {
        setFlashData("smg", "Tác giả không tồn tại trong hệ thống");
        setFlashData("smg_type", "danger");
    }

} else
{
    setFlashData("smg", "Liên kết không tồn tại");
    setFlashData("smg_type", "danger");
}
$f->redirect("?cmd=author&act=list");