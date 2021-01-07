<?php
class Database{
	private $host = "localhost";
	private $db_name = "mg_moohlago";
	private $username = "root";
	private $password = "root";
	public $conn;

	public function getConnection(){
		$this->conn = null;
		try{
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
		}catch(Exception $e){
			echo "Connection error: " . $e->getMessage();
		}
		return $this->conn;
	}
}
?>