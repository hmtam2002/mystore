<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quản lý sách</li>
        </ol>
    </nav>
    <div class="btn-group">
        <a href="index.php?cmd=book&act=manager" class="btn btn-secondary">Quản lý</a>
        <a href="index.php?cmd=book&act=add" class="btn btn-success">Thêm mới</a>
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
        case 'status':
            status();
            break;
        case 'manager':
            manager();
            break;
        default:
            manager();
    }
    function status()
    {
        global $f;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = 0;
        }
        if (isset($_GET['status'])) {
            $status = $_GET['status'];
        } else {
            $status = 0;
        }
        if ($status == 1) {
            $sql = "UPDATE books SET status=0 WHERE `id` = $id";
        } else {
            $sql = "UPDATE books SET status=1 WHERE `id` = $id";
        }
    
        if (mysqli_query($f->conn, $sql)) {
            $f->messager('Thành công');
        } else {
            $f->messager('Có lỗi');
        }
    }
    function add()
    {
        global $f;
        if (isset($_POST['sbm'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $content = $_POST['content'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $image = $f->upload('image');
            $sql = "INSERT INTO `books`(`name`, `discount`, `description`,`content`, `price`, `image`) 
                VALUES ('{$name}','{$discount}','{$description}','{$content}','{$price}','{$image}')";
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
                <label for="discount" class="form-label">discount</label>
                <input type="" class="form-control" name="discount" id="discount">
              </div>
              <div class="mb-3">
              <label for="description" class="form-label">description</label>
              <textarea class="form-control" name="description" id="description"></textarea>
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">price</label>
                <input type="number" class="form-control" name="price" id="price">
              </div>
              <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="image">
              </div>
              <div class="mb-3">
              <label for="content" class="form-label">content</label>
              <textarea class="form-control" name="content" id="content"></textarea>
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
            $title = $_POST['name'];
            $author = $_POST['discount'];
            $genre=$_POST['genre'];
            $publisher = $_POST['description'];
            $description = $_POST['content'];
            $price = $_POST['price'];
            // $image = $f->upload('image');
            $sql = "UPDATE `books` SET 
        `title`='{$title}',
        `author`='{$author}',
        `publisher`='{$publisher}', 
        `genre`='{$genre}',
        `description`='{$description}', 
        `price`= '{$price}'
         where id=$id";
            if (mysqli_query($f->conn, $sql)) {
                $f->messager('Thành công nhân');
            } else {
                $f->messager('Có lỗi');
            }
        }
        $sql = "select * from books where id=$id";
        $result = mysqli_query($f->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo '
      <form action="" method="POST" enctype="multipart/form-data"> 
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="' .
            $row['title'] .
            '">
      </div>
      <div class="mb-3">
        <label for="discount" class="form-label">author</label>
        <input type="discount" class="form-control" name="discount" id="discount"  value="' .
            $row['author'] .
            '">
      </div>
      <div class="mb-3">
      <label for="description" class="form-label">publisher</label>
      <textarea class="form-control" name="description" id="description" >' .
            $row['publisher'] .
            '</textarea>
      </div>
      <div class="mb-3">
      <label for="description" class="form-label">genre</label>
      <textarea class="form-control" name="genre" id="genre" >' .
            $row['genre'] .
            '</textarea>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">price</label>
        <input type="number" class="form-control" name="price" id="price"  value="' .
            $row['price'] .
            '">
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" id="image">
      </div>
      <div class="mb-3">
      <label for="content" class="form-label">description</label>
      <textarea class="form-control" name="content" id="content">' .
            $row['description'] .
            '</textarea>
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
        $sql = "DELETE FROM books WHERE `id` = $id";
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
                <th scope="col">Tiêu đề</th>
                <th scope="col">Tác giả</th>
                <th scope="col">Giá</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xoá</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>';
        $count = 1;
        $sql = 'select * from books';
        $result = mysqli_query($f->conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['status'] == 1) {
                $status = ' <td><a href="index.php?cmd=book&act=status&id=' . $row['id'] . '&status=' . $row['status'] . '" class="btn btn-success">Mở</a></td>';
            } else {
                $status = ' <td><a href="index.php?cmd=book&act=status&id=' . $row['id'] . '&status=' . $row['status'] . '" class="btn btn-warning">Đóng</a></td>';
            }
            echo '
            <tr>
              <td scope="row">' .
                $count++ .
                '</td>
              <td>' .
                $row['title'] .
                '</td>
              <td>' .
                $row['author'] .
                '</td>
              <td>' .
                $row['price'] .
                '</td>
              <td><a href="index.php?cmd=book&act=edit&id=' .
                $row['id'] .
                '" class="btn btn-primary">Sửa</a></td>
              <td><a href="index.php?cmd=book&act=del&id=' .
                $row['id'] .
                '" class="btn btn-danger">Xóa</a></td>
              ' .
                $status .
                '
            </tr>
            ';
        }
        echo '</tbody>
            </table>';
    }
    ?>
</main>
