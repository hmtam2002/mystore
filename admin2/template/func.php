<?php
class func
{
  private $hostnamedb = 'localhost';
  private $usernamedb = 'root';
  private $passworddb = '';
  private $namedb = 'database';
  public $conn;
  function __construct()
  {
    $this->conn = $this->connect($this->hostnamedb, $this->usernamedb, $this->passworddb, $this->namedb);
    if (!$this->conn)
      echo 'error connect to database!';
  }
  function __destruct()
  {
    //  Phương thức hủy, mặc định chạy sau chót
    mysqli_close($this->conn);
  }
  function connect($hostnamedb, $usernamedb, $passworddb, $namedb)
  {
    return mysqli_connect($hostnamedb, $usernamedb, $passworddb, $namedb);
  }
  public function login($email, $pwd)
  {
    $sql = "select email,password,name from account where email='{$email}' and password='{$pwd}'";
    $result = mysqli_query($this->conn, $sql);//hàm thực thi truy vấn csdl
    $total = mysqli_num_rows($result);//đếm số dòng/bộ/record trả ề từ truy vấn
    if ($total == 1)
    {
      $row = mysqli_fetch_assoc($result);//tách dòng trả về từ truy vấn
      $_SESSION['loginname'] = $row['name'];
      $_SESSION['loginstatus'] = true;

    } else
    {
      $_SESSION['loginstatus'] = false;
    }
    return $_SESSION['loginstatus'];
  }
  function signout($cmd, $value = '')
  {
    if (isset($_GET[$cmd]) && $_GET[$cmd] == $value)
    {
      unset($_SESSION['loginstatus']);
      header('location:login.php');
    }
  }
  function messager($text = '')
  {
    global $cmd;
    $_SESSION['flash'] = '<div class="alert alert-success" role="alert">' . $text . '</div>';
    echo "<script>document.location.href='index.php?cmd=" . $cmd . "'</script>";
  }
  function upload($filenameupload)
  {
    $check = true;
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES[$filenameupload]["name"]);//"upload/1.jpg"
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));//jpg
    $new_filename = time() . '.' . $imageFileType;//4534534523.jpg
    $allow_file_upload = array("jpg", "png", "gif", "jfif");
    if (!in_array($imageFileType, $allow_file_upload))
      $check = false;
    if ($check == true)
    {
      if (move_uploaded_file($_FILES[$filenameupload]["tmp_name"], $target_dir . $new_filename))
        return $new_filename;
      else
        return "noimage.jpg";
    } else
      $this->messager('File upload không hợp lệ!');
  }
}
$f = new func;