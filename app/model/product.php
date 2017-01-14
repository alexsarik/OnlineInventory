<?php
class Product{
 
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
		$product = null;

		if($result){
			$product = $db->result()[0];
            echo $result;
			$this->serial = $product['serial'];
			$this->purchasePrice = $product['purchase_price'];
			$this->salePrice = $product['sale_price'];
			$this->description = $product['description'];
			$this->quantity = $product['quantity'];
			$this->model = $product['model'];
			$this->location = $product['location'];
		}

		return $product;
	}

	function readAll($from_record_num, $records_per_page){
		$db = new DB;

		$query = "SELECT *
		FROM
		products
		ORDER BY
		id ASC
		LIMIT
		{$from_record_num}, {$records_per_page}";

		$result = $db->run($query);

		$products = array();

		if($result){
			$products = $db->result();
		}

		return $products;
	}

	public function countAll(){
 		$db = new DB;

    	$query = "SELECT id FROM products";
 		
 		$db->run($query);
 	
 		$num = $db->count();
 
   		return $num;
	}
}?>