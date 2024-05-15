<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
$filterAll = $f->filter();
if (!empty($filterAll['id']))
{
    $genreId = $filterAll['id'];
    $genre_detail = $db->getRows("SELECT * FROM genres WHERE id=$genreId");
    if ($genre_detail > 0)
    {
        //thực hiện xoá
        $deleteGenre = $db->delete("genres", "id = $genreId");
        if ($deleteGenre)
        {
            setFlashData("smg", "Đã xoá thể loại thành công");
            setFlashData("smg_type", "success");
        } else
        {
            setFlashData("smg", "Thể loại này đang được sử dụng");
            setFlashData("smg_type", "danger");
        }
    } else
    {
        setFlashData("smg", "Thể loại không tồn tại trong hệ thống");
        setFlashData("smg_type", "danger");
    }

} else
{
    setFlashData("smg", "Liên kết không tồn tại");
    setFlashData("smg_type", "danger");
}
$f->redirect("?cmd=genre&act=list");