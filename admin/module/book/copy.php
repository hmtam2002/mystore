<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
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
    $f->redirect('?cmd=book&act=list');
}