<?php
class func
{
    private $hostnamedb = 'localhost';
    private $usernamedb = 'root';
    private $passworddb = '';
    private $namedb = 'mystore';
    public $conn;
    function __construct()
    {
        $this->conn = $this->connect($this->hostnamedb, $this->usernamedb, $this->passworddb, $this->namedb);
        if (!$this->conn) {
            echo 'error connect to database!';
        }
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
    public function login($username, $pwd)
    {
        $sql = "select username,password from admin where username='{$username}' and password='{$pwd}'";
        $result = mysqli_query($this->conn, $sql); //hàm thực thi truy vấn csdl
        $total = mysqli_num_rows($result); //đếm số dòng/bộ/record trả ề từ truy vấn
        if ($total == 1) {
            $row = mysqli_fetch_assoc($result); //tách dòng trả về từ truy vấn
            $_SESSION['loginname'] = $row['username'];
            $_SESSION['loginstatus'] = true;
        } else {
            $_SESSION['loginstatus'] = false;
        }
        return $_SESSION['loginstatus'];
    }
    function signout($cmd, $value = '')
    {
        if (isset($_GET[$cmd]) && $_GET[$cmd] == $value) {
            unset($_SESSION['loginstatus']);
            header('location: template/login.php');
        }
    }
    function messager($text = '')
    {
        global $cmd;
        $_SESSION['flash'] = '<div class="alert alert-success" role="alert">' . $text . '</div>';
        echo "<script>document.location.href='index.php?cmd=" . $cmd . "'</script>";
    }
}
$f = new func();
?>
