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
    $f->redirect("?cmd=auth&act=login");
} else
{
    $f->redirect("?cmd=auth&act=login");
}