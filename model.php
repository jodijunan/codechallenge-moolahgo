<?php

class myModel
{

    private $host = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "mycode";

    public $conn;

    public $data;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
    }

    public function write() {
        $arr = json_decode($this->getData(), true);

        $query = "INSERT INTO mytable(mydate, amount, percentage, fees) "
            . "VALUES(?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("siss",
            date('d/m/Y', strtotime($arr['mydate'])),
            $arr['amount'],
            $arr['percentage'],
            $arr['fees']
        );
        $resultSet = $stmt->execute();
        $id = $this->conn->insert_id;
        $stmt->close();
        return $id;
    }

    public function read() {
        $query = "SELECT * FROM mytable ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

}


?>