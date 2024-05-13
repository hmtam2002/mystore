<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
$filterAll = $f->filter();
if (!empty($filterAll['id']))
{
    $userId = $filterAll['id'];
    $user_detail = $db->oneRaw("SELECT * FROM admin WHERE id=$userId");
    if (!empty($user_detail))
    {
        setFlashData('user_detail', $user_detail);
    } else
    {
        $f->redirect("?cmd=user&act=list");
    }
}