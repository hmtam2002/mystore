<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
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
        $brandId = $filterAll['id'];
        $brand_data = $db->oneRaw("SELECT * FROM brands WHERE id=$brandId");
        if (!empty($brand_data))
        {
            setFlashData('brand_detail', $brand_data);
        } else
        {
            $f->redirect("?cmd=brand&act=list");
        }
    }
} else
{
    //cho nút status
    $statusValue = $filterAll['status'];
    if (!empty($filterAll['id']))
    {
        $brandId = $filterAll['id'];
        $brand_detail = $db->oneRaw("SELECT * FROM brands WHERE id=$brandId");
        if (!empty($brand_detail))
        {
            $dataUpdate['status'] = ($statusValue == 0) ? 1 : 0;
            $condition = "id=$brandId";
            $updateStatus = $db->update('brands', $dataUpdate, $condition);
            if (!$updateStatus)
            {
                setFlashData('smg', 'Sửa không thành công');
                setFlashData('smg_type', 'danger');
            }
        }
    }
    $f->redirect("?cmd=brand&act=list");
}



if ($f->isPOST())
{
    $filterAll = $f->filter();
    $errors = []; //mảng chứa các lỗi
    //validate author_name
    // if (empty($filterAll['author_name']))
    // {
    //     $errors['author_name']['required'] = 'Tên tác giả bắt buộc phải nhập';
    // } else
    // {
    //     if (strlen($filterAll['author_name']) < 5)
    //     {
    //         $errors['author_name']['min'] = 'Tên tác giả phải có ít nhất 5 ký tự';
    //     } else
    //     {
    //         if ($filterAll['author_name'] == $author_name)
    //         {
    //             $errors['author_name']['exist'] = 'Bạn chưa sửa tên tác giả';
    //         }
    //     }
    // }
    if (empty($errors))
    {
        //xử lý insert
        $dataUpdate = [
            'brand_name' => $filterAll['brand_name'],
            'status' => $filterAll['status'],
            'update_at' => date('Y-m-d H:i:s')
        ];
        $condition = "id=$brandId";
        $updateStatus = $db->update('brands', $dataUpdate, $condition);
        if ($updateStatus)
        {
            setFlashData('smg', 'Sửa thành công');
            setFlashData('smg_type', 'success');
        } else
        {
            setFlashData('smg', 'Sửa không thành công');
            setFlashData('smg_type', 'danger');
        }
    } else
    {
        setFlashData('smg', 'Vui lòng kiểm tra lại dữ liệu');
        setFlashData('smg_type', 'danger');
        setFlashData('errors', $errors);
        setFlashData('old', $filterAll);
    }
    $f->redirect("?cmd=brand&act=edit&id=" . $brandId);
}



$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');
$brand_data = getFlashData('brand_detail');
if (!empty($brand_data))
{
    $old = $brand_data;
}
?>

<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thương hiệu</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=brand&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=brand&act=add" class="btn btn-success">Thêm mới</a>
    </div>

    <div class="container">
        <div class="row">
            <?php if (!empty($smg))
            {
                $f->getSmg($smg, $smg_type);
            } ?>
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <div class="form-group mg-form">
                            <label for="">Thương hiệu</label>
                            <input name="brand_name" class="form-control" placeholder="Thương hiệu" value="<?php
                            echo $f->old('brand_name', $old);
                            ?>">
                            <?php
                            echo $f->formError('brand_name', '<span class="error">', '</span>', $errors);
                            ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <select name="status" id="mySelect" class="form-control" style="width: 50% display=block;">
                                <option value="1" <?= $f->old('status', $old) == 1 ? "selected" : null ?>>Đã kích hoạt
                                </option>
                                <option value="0" <?= $f->old('status', $old) == 0 ? "selected" : null ?>>Chưa kích hoạt
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $brandId ?>">
                <button type="submit" class="btn btn-primary btn-block mg-btn" style="margin-top: 40px">
                    Cập nhật
                </button>
            </form>
        </div>
    </div>
</main>