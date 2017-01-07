<?php
class Database{
	private $host = "127.0.0.1";
	private $dbname = "multivendor";
	private $username = "root";
	private $password = "";

	public $conn;

	public function getConnection(){
		$this->conn = null;

		$this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

		if ($this->conn->connect_errno) {
	 	   echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}

		return $this->conn;
	}
}

?>