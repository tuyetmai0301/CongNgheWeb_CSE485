<?php

class Database {
    private $host = "127.0.0.1";
    private $port = "3306";
    private $db_name = "onlinecourse"; // TÊN CSDL CỦA BẠN
    private $username = "root";
    private $password = "";
    public $conn;

    public function connect() {
        $this->conn = null;

        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db_name};charset=utf8";
            $this->conn = new PDO($dsn, $this->username, $this->password);

            // Bắt lỗi
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }

        return $this->conn;
    }
}
