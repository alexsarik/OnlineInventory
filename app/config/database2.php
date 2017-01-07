<?php 

class DB{
	private $host;
	private $dbname;
	private $user;
	private $pass;

	private $connection;
	private $query;

	function __construct() {
		$this->host = "localhost";
		/*
		$this->user = "mrcotcbe_admin";
		$this->pass = "r000t";
		$this->dbname = "mrcotcbe_multivendor";
		*/

		$this->user = "root";
		$this->pass = "";
		$this->dbname = "multivendor";
		

		$this->connection = new PDO("mysql:dbname=".$this->dbname."; host=".$this->host, $this->user, $this->pass, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}

	public function run($q, $data = array()) {
		$this->query = $this->connection->prepare($q);

		try{
			return $this->query->execute($data);
		} catch (PDOException $e) {
			print_r($e);
			return false;
		}
	}
	public function result() {
		return $this->query->fetchAll(PDO::FETCH_ASSOC);
	}
	public function count() {
		return $this->query->rowCount();
	}
	public function lastId() {
		return $this->connection->lastInsertId();
	}
}