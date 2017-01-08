<?php
Class Customer{

	public $id;
	public $name;
	public $description;
	public $contactNum;
	public $email; 
	public $city;
	public $address;
	public $createdDate;


	function create(){
		$db = new DB;
		//Query para INSERT nuevo Producto
		$query = "INSERT INTO `multivendor`.`customers`
		(`name`, `description`, `contact_num`, `email`, `city`, `address`, `created_date`)
		VALUES (?,?,?,?,?,?)";

		return $db->run($query, array($this->name,$this->description, $this->contact_num,$this->email,$this->city,$this->address, $this->created_date));
	}

	function update(){
		$db = new DB;

		$query = "UPDATE `multivendor`.`customers` SET `name` = ?, `description`= ?, `contact_num`= ?, `email`= ?, `city`= ?, `address`, `created_date` = ? WHERE `id` = ?";

		$result = $db->run($query, array($this->name, $this->description, $this->contact_num, $this->email, $this->city, $this->address, $this->created_date, $this->id));

		return $result;
	}

	function delete(){
		$db = new DB;
		
		$query = "DELETE FROM `multivendor`.`customers` WHERE `id` = ?";
		
		$result = $db->run($query, array($this->id));

		return $result;
	}

	function readOne(){
		$db = new DB;

		$query = "SELECT *
		FROM
		`multivendor`.`customers`
		WHERE
		`id` = ?
		LIMIT
		0, 1";

		$result = $db->run($query, array($this->id));
		$row = null;

		if($result){
			$row = $db->result()[0];

			$this->name = $row['name'];
			$this->description = $row['description'];
			$this->contactNum = $row['contact_num'];
			$this->email = $row['email'];
			$this->city = $row['city'];
			$this->address = $row['address'];
			$this->createdDate = $row['created_date'];
		}

		return $row;
	}

	function readAll($from_record_num, $records_per_page){
		$db = new DB;

		$query = "SELECT *
		FROM
		`multivendor`.`customers`
		ORDER BY
		id ASC
		LIMIT
		{$from_record_num}, {$records_per_page}";

		$result = $db->run($query);

		$rows = array();

		if($result){
			$rows = $db->result();
		}

		return $rows;
	}

	public function countAll(){
 		$db = new DB;

    	$query = "SELECT id FROM `multivendor`.`customers`";
 		
 		$db->run($query);
 	
 		$num = $db->count();
 
   		return $num;
	}
}
?>