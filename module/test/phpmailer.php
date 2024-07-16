<?php

$status = $f->sendMail('huynhminhtamm2002@gmail.com', 'Tiêu đề', 'Nội dung');
if ($status)
{
    echo 'Thành công';
} else
{
    echo 'Thất bại';
}