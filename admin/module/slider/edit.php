<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
if (!$f->isLogin())
{
    $f->redirect('?cmd=auth&act=login');
}
// $data = [
//     'titlePage' => 'Quản trị website'
// ];
$filterAll = $f->filter();

if (!(isset($_GET['status']) && ($_GET['status'] == '0' || $_GET['status'] == '1')))//nút status
{
    //cho chỉnh sửa thông tin
    if (!empty($filterAll['id']))
    {
        $authorId = $filterAll['id'];
        $author_name = $filterAll['author_name'];
        $author_data = $db->oneRaw("SELECT * FROM authors WHERE id=$authorId");
        if (!empty($author_data))
        {
            setFlashData('author_detail', $author_data);
        } else
        {
            $f->redirect("?cmd=author&act=list");
        }
    }
} else
{
    //cho nút status
    $statusValue = $filterAll['status'];
    if (!empty($filterAll['id']))
    {
        $imageId = $filterAll['id'];
        $image_detail = $db->oneRaw("SELECT * FROM images WHERE id=$imageId");
        if (!empty($image_detail))
        {
            $dataUpdate['status'] = ($statusValue == 0) ? 1 : 0;
            $condition = "id=$imageId";
            $updateStatus = $db->update('images', $dataUpdate, $condition);
            if ($updateStatus)
            {
                // setFlashData('authorStatus', 'Sửa thành công');
                // setFlashData('smg_type', 'success');
            } else
            {
                setFlashData('updatestatus', 'Sửa không thành công');
                setFlashData('smg_type', 'danger');
            }
        }
    }
    $f->redirect("?cmd=slider&act=list");
}