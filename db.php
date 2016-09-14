<?php


require_once "dataTable.php";

class db
{
    private $host;
    private $user;
    private $pwd;
    private $port = 3306;
    private $database;
    private $conn;
    private $tables;
    private $sql = 'show tables';

    /**
     * db constructor.
     * @param $host
     * @param $user
     * @param $pwd
     * @param int $port
     */
    public function __construct($host, $user, $pwd, $database, $port = "")
    {
        $this->host = $host;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->database = $database;
        $this->port = $port == "" ? $this->port : $port;
        // 创建连接
        $this->conn = new mysqli($this->host, $this->user, $this->pwd, $this->database, $this->port);
        // 检测连接
        if ($this->conn->connect_error) {
            die("连接失败: " . $this->conn->connect_error);
        }
        $this->conn->query("SET NAMES UTF8");
        $this->tables();
    }

    private function tables()
    {
        $tables = $this->conn->query($this->sql);
        if ($tables->num_rows > 0) {
            // 输出每行数据
            while ($row = $tables->fetch_assoc()) {
                $this->tables[] = new dataTable($row['Tables_in_'.$this->database], $this->conn);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getTables()
    {
        return $this->tables;
    }


}