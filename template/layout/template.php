<!DOCTYPE html>
<html lang="<?= _LANGUAGE ?>">

<head>
  <?php require_once _PATH_TEMPLATE . '/layout/head.php'; ?>
  <?php require_once _PATH_TEMPLATE . '/layout/css.php'; ?>
</head>

<body class="bg-light-custom">

  <!-- header -->
  <?php require_once _PATH_TEMPLATE . '/layout/header.php'; ?>

  <!-- Nội dung -->
  <?= $noidung ?>
  <!-- end nội dung -->

  <!-- footer -->
  <?php
  if ($url != '/thanh-toan')// sẽ ẩn đi nếu ở trang thanh toán
  {
    require_once _PATH_TEMPLATE . '/layout/footer.php';
  }
  ?>

  <?php require_once _PATH_TEMPLATE . '/layout/js.php'; ?>

</body>

</html>