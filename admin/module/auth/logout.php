<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
if ($f->isLogin())
{
    $token = getSession("loginToken");
    $db->delete("adminToken", "token = '$token'");
    removeSession("loginToken");
    removeSession("adminName");
    $f->redirect("?cmd=auth&act=login");
} else
{
    $f->redirect("?cmd=auth&act=login");
}