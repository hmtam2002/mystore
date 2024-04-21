<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tài khoản</li>
        </ol>
    </nav>
    <div class="btn-group mb-3">
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
            $username=$_POST['username'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            // $image = $f->upload('image');
            $image = '1.png';
            $date=date("Y-m-d H:i:s");;
            $sql = "INSERT INTO `admin`(`username`,`fullname`, `email`, `password`, `phone_number`, `image`,`date`) 
                VALUES ('{$username}','{$name}','{$email}','{$password}','{$phone}','{$image}','{$date}')";
            if (mysqli_query($f->conn, $sql)) {
                $f->messager('Thành công');
            } else {
                $f->messager('Có lỗi');
            }
        }
        echo '
              <form action="" method="POST" enctype="multipart/form-data"> 
              <div class="mb-3">
                <label for="username" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" name="username" id="username">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Họ tên</label>
                <input type="text" class="form-control" name="name" id="name">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email">
              </div>
              <div class="mb-3">
              <label for="password" class="form-label">Mật khẩu</label>
              <input type="text" class="form-control" name="password" id="password">
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="number" class="form-control" name="phone" id="phone">
              </div>
              <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh</label>
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
            // $image = $f->upload('image');
            $image = '1.png';
            $sql = "UPDATE `admin` SET 
                `fullname`='{$name}', 
                `email`='{$email}', 
                `password`='{$password}', 
                `phone_number`= '{$phone}',
                `image`='{$image}'
                 where id=$id";
            if (mysqli_query($f->conn, $sql)) {
                $f->messager('Thành công');
            } else {
                $f->messager('Có lỗi');
            }
        }
        $sql = "select * from admin where id=$id";
        $result = mysqli_query($f->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo '
              <form action="" method="POST" enctype="multipart/form-data"> 
              <div class="mb-3">
                <label for="name" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" name="name" id="name" value="' .
            $row['username'] .
            '">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Họ tên</label>
                <input type="text" class="form-control" name="name" id="name" value="' .
            $row['fullname'] .
            '">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email"  value="' .
            $row['email'] .
            '">
              </div>
              <div class="mb-3">
              <label for="password" class="form-label">Mật khẩu</label>
              <input type="text" class="form-control" name="password" id="password"  value="' .
            $row['password'] .
            '">
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="number" class="form-control" name="phone" id="phone"  value="' .
            $row['phone_number'] .
            '">
              </div>
              <div class="mb-3">
                <label for="image" class="form-label">Ảnh đại diện</label>
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
        $sql = "DELETE FROM admin WHERE `id` = $id";
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
                <th scope="col">STT</th>
                <th scope="col">Họ tên</th>
                <th scope="col">SĐT</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>';
        $count = 1;
        $sql = 'select * from admin';
        $result = mysqli_query($f->conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <tr>
              <td scope="row">' .
                $count++ .
                '</td>' .
                '<td>' .
                $row['fullname'] .
                '</td>
              <td>' .
                $row['phone_number'] .
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