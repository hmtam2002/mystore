<!-- áp dụng cho sidebar -->
<script src="<?= _HOST . '/admin/template/js/sidebar.js?ver=' . rand(100, 999) ?>"></script>

<!-- áp dụng cho trang add và edit -->
<?php
if ($data['action'] == 'add' || $data['action'] == 'edit')
{ ?>

    <script src="<?= _WEB_HOST_TEMPLATE ?>/ckeditor/ckeditor.js"></script>
    <!-- <script src="<?= _HOST . '/admin/template/js/custom.js?ver=' . rand(100, 999) ?>"></script> -->

    <?php
} ?>