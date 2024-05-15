<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}


class DatabaseConnection
{
    private $conn;

    public function __construct()
    {
        $dbConfig = new DatabaseConfig();
        $this->conn = $dbConfig->getConnection();

        if ($this->conn->connect_error)
        {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}