<script src="<?php echo _WEB_HOST_TEMPLATE ?>/js/bootstrap.min.js"></script>
<script src="<?php echo _WEB_HOST_TEMPLATE ?>/js/custom.js"></script>
<script>
    document.getElementById('showPasswordCheckbox').addEventListener('change', function () {
        console.log(this.checked);
        var passwordField = document.getElementById('passwordField');
        passwordField.type = this.checked ? "text" : "password";
    });
    document.getElementById('showPasswordconfirmCheckbox').addEventListener('change', function () {
        console.log(this.checked);
        var passwordField = document.getElementById('passwordconfirmField');
        passwordField.type = this.checked ? "text" : "password";
    });
</script>
</body>

</html>