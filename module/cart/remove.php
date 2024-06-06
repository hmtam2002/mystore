<?php
echo $_GET['id'];
if (isset($_POST['gui']))
{
    echo $_POST['name'];
}
?>
<form method="post">
    <input type="text" name="name" id="name">
    <button type="submit" name="gui">Gửi lại</button>
</form>