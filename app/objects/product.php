<?php
class Product{

	private $table_name = "products";

	//propiedades del objeto
	public $id;
	public $serial;
	public $model;
	public $description;
	public $location;
	public $salePrice;
	public $purchasePrice;
	public $quantity;
	public $saleDate;
	public $purchaseDate;

	function create(){
		$db = new DB;
		//Query para INSERT nuevo Producto
		$query = "INSERT INTO `multivendor`.`products`
		(`serial`, `description`, `model`, `location`, `purchase_price`, `sale_price`, `quantity`)
		VALUES (?,?,?,?,?,?,?)";

		return $db->run($query, array($this->serial,$this->description, $this->model,$this->location,$this->purchasePrice,$this->salePrice,$this->quantity));
	}

	function update(){
		$db = new DB;

		$query = "UPDATE `multivendor`.`products` SET `serial` = ?, `description`= ?, `model`= ?, `location`= ?, `purchase_price`= ?, `sale_price`= ?,`quantity`= ? WHERE `id` = ?";

		$result = $db->run($query, array($this->serial, $this->description, $this->model, $this->location, $this->purchasePrice, $this->salePrice, $this->quantity, $this->id));

		return $result;
	}

	function delete(){
		$db = new DB;
		
		$query = "DELETE FROM `multivendor`.`products` WHERE `id` = ?";
		
		$result = $db->run($query, array($this->id));

		return $result;
	}

	function readOne(){
		$db = new DB;

		$query = "SELECT *
		FROM
		products
		WHERE
		id = ?
		LIMIT
		0, 1";

		$result = $db->run($query, array($this->id));
		$row = null;

		if($result){
			$row = $db->result()[0];

			$this->name = $row['name'];
			$this->price = $row['price'];
			$this->description = $row['description'];
			$this->category_id = $row['category_id'];
		}

		return $row;
	}

	function readAll($from_record_num, $records_per_page){
		$db = new DB;

		$query = "SELECT *
		FROM
		products
		ORDER BY
		description ASC
		LIMIT
		{$from_record_num}, {$records_per_page}";

		$result = $db->run($query);
		$rows = array();

		if($result){
			$rows = $db->result();
		}
		return $rows;
	}
}
?>