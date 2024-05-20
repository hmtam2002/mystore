<!-- phần mở đầu trang bao gồm include css -->
<?php
require_once _PATH_TEMPLATE . '/layout/head.php';
?>

<!-- body -->


<!-- header -->
<?php
require_once _PATH_TEMPLATE . '/layout/header.php';
?>


<!-- Nội dung trang con -->



<!-- footer -->
<?php
require_once _PATH_TEMPLATE . '/layout/footer.php';
?>

<!-- js tổng quát -->
<?php
require_once _PATH_TEMPLATE . '/layout/js.php';
?>

<!-- js viết thêm ở từng trang con -->


<!-- Đóng html -->
<?php
require_once _PATH_TEMPLATE . '/layout/end.php';
?>

<!DOCTYPE html>
<html lang="<?= _LANGUAGE ?>">

<head>
    <?= require_once _PATH_TEMPLATE . '/layout/head2.php'; ?>
    <?= require_once _PATH_TEMPLATE . '/layout/css.php'; ?>
</head>

<body>

</body>

</html>