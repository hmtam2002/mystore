<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">slider</li>
        </ol>
    </nav>
    <div class="btn-group">
        <a href="index.php?cmd=account&act=manager" class="btn btn-secondary">Quản lý</a>
        <a href="index.php?cmd=account&act=add" class="btn btn-success">Thêm mới</a>
    </div>
    <?php
    if (isset($_SESSION['flash']) && $_SESSION['flash'] != '') {
        echo $_SESSION['flash'];
    }
    if (isset($_SESSION['flash'])) {
        unset($_SESSION['flash']);
    }
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
    } else {
        $act = 'manager';
    }
    switch ($act) {
        case 'add':
            add();
            break;
        case 'edit':
            edit();
            break;
        case 'del':
            del();
            break;
        case 'manager':
            manager();
            break;
        default:
            manager();
    }
    function add()
    {
        global $f;
        if (isset($_POST['sbm'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $image = $f->upload('image');
            $sql = "INSERT INTO `account`(`name`, `email`, `password`, `phone`, `image`) 
            VALUES ('{$name}','{$email}','{$password}','{$phone}','{$image}')";
            if (mysqli_query($f->conn, $sql)) {
                $f->messager('Thành công');
            } else {
                $f->messager('Có lỗi');
            }
        }
        echo '
          <form action="" method="POST" enctype="multipart/form-data"> 
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" class="form-control" name="email" id="email">
          </div>
          <div class="mb-3">
          <label for="password" class="form-label">password</label>
          <input type="text" class="form-control" name="password" id="password">
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">phone</label>
            <input type="number" class="form-control" name="phone" id="phone">
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" id="image">
          </div>
          <button type="submit" name="sbm"class="btn btn-primary">Thực hiện</button>
        </form>
          ';
    }
    function edit()
    {
        global $f;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = 0;
        }
        if (isset($_POST['sbm'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $image = $f->upload('image');
            $sql = "UPDATE `account` SET 
            `name`='{$name}', 
            `email`='{$email}', 
            `password`='{$password}', 
            `phone`= '{$phone}',
            `image`='{$image}'
             where id=$id";
            if (mysqli_query($f->conn, $sql)) {
                $f->messager('Thành công công');
            } else {
                $f->messager('Có lỗi');
            }
        }
        $sql = "select * from account where id=$id";
        $result = mysqli_query($f->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo '
          <form action="" method="POST" enctype="multipart/form-data"> 
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="' .
            $row['name'] .
            '">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" class="form-control" name="email" id="email"  value="' .
            $row['email'] .
            '">
          </div>
          <div class="mb-3">
          <label for="password" class="form-label">password</label>
          <input type="text" class="form-control" name="password" id="password"  value="' .
            $row['password'] .
            '">
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">phone</label>
            <input type="number" class="form-control" name="phone" id="phone"  value="' .
            $row['phone'] .
            '">
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" id="image">
          </div>
          <button type="submit" name="sbm"class="btn btn-primary">Thực hiện</button>
        </form>
          ';
    }
    function del()
    {
        global $f;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = 0;
        }
        $sql = "DELETE FROM account WHERE `id` = $id";
        if (mysqli_query($f->conn, $sql)) {
            $f->messager('Thành công');
        } else {
            $f->messager('Có lỗi');
        }
    }
    function manager()
    {
        global $f;
        echo '<table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>';
        $count = 1;
        $sql = 'select * from account';
        $result = mysqli_query($f->conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
        <tr>
          <th scope="row">' .
                $count++ .
                '</th>
          <td><img src="upload/' .
                $row['image'] .
                '" width="50" /></td>
          <td>' .
                $row['name'] .
                '</td>
          <td>' .
                $row['phone'] .
                '</td>
          <td>' .
                $row['email'] .
                '</td>
          <td><a href="index.php?cmd=account&act=edit&id=' .
                $row['id'] .
                '" class="btn btn-primary">Sửa</a></td>
          <td><a href="index.php?cmd=account&act=del&id=' .
                $row['id'] .
                '" class="btn btn-danger">Xóa</a></td>
        </tr>
        ';
        }
        echo '</tbody>
        </table>';
    }
    ?>
</main>
