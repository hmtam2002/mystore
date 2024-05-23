<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}
if (!$f->isLogin())
{
    $f->redirect('?cmd=auth&act=login');
}
$filterAll = $f->filter();
if (!empty($filterAll['id']))
{
    $productId = $filterAll['id'];
    //xử lý insert
    $product_data = $db->oneRaw("SELECT * FROM products WHERE id=$productId");
    if (!empty($product_data))
    {

        $dataInsert = $product_data;
        // $beforeTitle = $product_data["title"];
        // $afterTitle = $beforeTitle . '(1)';
        // $titleStatus = $db->oneRaw("SELECT * FROM products WHERE title=$afterTitle");
        // if (empty($titleStatus))
        // {
        //     $dataInsert['title'] = $afterTitle;
        // } else
        // {
        $dataInsert['title'] = $dataInsert['title'] . '(1)';
        // }
        $dataInsert['create_at'] = date('Y-m-d H:i:s');
        unset($dataInsert['id']);
        foreach ($dataInsert as $key => $value)
        {
            // Nếu giá trị của phần tử là null hoặc rỗng, xóa phần tử đó
            if (is_null($value) || $value === "")
            {
                unset($dataInsert[$key]);
            }
        }
        $insertStatus = $db->insert('products', $dataInsert);
        if ($insertStatus)
        {
            setFlashData('smg', 'Sao chép thành công');
            setFlashData('smg_type', 'success');
        } else
        {
            setFlashData('smg', 'Lỗi cơ sở dữ liệu');
            setFlashData('smg_type', 'danger');
        }
    }
    $f->redirect('?cmd=product&act=list');
}