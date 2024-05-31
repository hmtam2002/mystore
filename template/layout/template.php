<!DOCTYPE html>
<html lang="<?= _LANGUAGE ?>">

<head>
    <?php require_once _PATH_TEMPLATE . '/layout/head.php'; ?>
    <?php require_once _PATH_TEMPLATE . '/layout/css.php'; ?>
</head>

<body>
    <!-- header -->
    <?php require_once _PATH_TEMPLATE . '/layout/header.php'; ?>
    <!-- Nội dung -->
    <?= $noidung ?>
    <!-- end nội dung -->
    <!-- footer -->
    <?php require_once _PATH_TEMPLATE . '/layout/footer.php'; ?>
</body>

</html>