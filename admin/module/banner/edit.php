<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}

$filterAll = $f->filter();

if (!(isset($_GET['status']) && ($_GET['status'] == '0' || $_GET['status'] == '1')))//nút status
{
    //cho chỉnh sửa thông tin
    if (!empty($filterAll['id']))
    {
        $bannerId = $filterAll['id'];
        $bannerData = $db->oneRaw("SELECT * FROM images WHERE id=$bannerId");
        if (!empty($bannerData))
        {
            setFlashData('banner_Detail', $bannerData);
        } else
        {
            $f->redirect("?cmd=banner&act=list");
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
            if (!$updateStatus)
            {
                setFlashData('updatestatus', 'Sửa không thành công');
                setFlashData('smg_type', 'danger');
            }
        }
    }
    $f->redirect("?cmd=banner&act=list");
}

if ($f->isPOST())
{
    $filterAll = $f->filter();
    $errors = []; //mảng chứa các lỗi

    if (empty($errors))
    {
        //xử lý insert
        $dataUpdate = [
            'image' => $f->upload('imageUpload', 'images/banner'),
            'status' => $filterAll['status'],
        ];
        if ($dataUpdate['image'] === 'noimage.jpg')
        {
            unset($dataUpdate['image']);
        }
        foreach ($dataUpdate as $key => $value)
        {
            // Nếu giá trị của phần tử là null hoặc rỗng, xóa phần tử đó
            if (is_null($value) || $value === "")
            {
                unset($dataUpdate[$key]);
            }
        }
        // echo '<pre>';
        // print_r($dataUpdate);
        // echo '</pre>';
        // die();
        $condition = "id=$bannerId";
        $updateStatus = $db->update('images', $dataUpdate, $condition);
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
    $f->redirect("?cmd=banner&act=edit&id=" . $bannerId);
}



$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');
$banner_data = getFlashData('banner_Detail');
if (!empty($banner_data))
{
    $old = $banner_data;
}
?>

<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Banner</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
        <a href="?cmd=banner&act=list" class="btn btn-secondary">Quản lý</a>
        <a href="?cmd=banner&act=add" class="btn btn-success">Thêm mới</a>
    </div>

    <div class="container">
        <div class="row">
            <?php if (!empty($smg))
            {
                $f->getSmg($smg, $smg_type);
            } ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="imageUpload" id="imageUpload"
                                accept="image/*">
                        </div>
                        <div class="form-group">
                            <img id="previewImage" src="<?= $f->image_exists($f->old('image', $old), 'banner') ?>"
                                alt="Ảnh xem trước" style="max-width: 100%; max-height: 100%;  margin-top: 20px;">
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
                <input type="hidden" name="id" value="<?php echo $bannerId ?>">
                <button type="submit" class="btn btn-primary btn-block mg-btn" style="margin-top: 40px">
                    Cập nhật
                </button>
            </form>
        </div>
    </div>
</main>