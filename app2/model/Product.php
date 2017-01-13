<?php

/**
 * Created by PhpStorm.
 * User: markc
 * Date: 10/01/2017
 * Time: 22:32
 */
class Product
{

    //propiedades del objeto
    public $id;
    public $serial;
    public $model;
    public $description;
    public $location;
    public $sale_price;
    public $purchase_price;
    public $quantity;
    public $sale_date;
    public $purchase_date;
    public $db;

    /**
     * Product constructor.
     * @param $id
     * @param $serial
     * @param $model
     * @param $description
     * @param $location
     * @param $sale_price
     * @param $purchase_price
     * @param $quantity
     * @param $sale_date
     * @param $purchase_date
     */
    public function __construct($id = null, $serial = null, $model = null, $description = null,
                                $location = null, $sale_price = null, $purchase_price = null,
                                $quantity = null, $sale_date = null, $purchase_date = null)
    {
        $this->id = $id;
        $this->serial = $serial;
        $this->model = $model;
        $this->description = $description;
        $this->location = $location;
        $this->sale_price = $sale_price;
        $this->purchase_price = $purchase_price;
        $this->quantity = $quantity;
        $this->sale_date = $sale_date;
        $this->purchase_date = $purchase_date;


    }


    public function create()
    {
        $db = new DB;
        //Query para INSERT nuevo Producto
        $query = "INSERT INTO `multivendor`.`products`
		(`serial`, `description`, `model`, `location`, `purchase_price`, `sale_price`, `quantity`)
		VALUES (?,?,?,?,?,?,?)";

        $parameters = array($this->serial, $this->description, $this->model, $this->location, $this->purchase_price, $this->sale_price, $this->quantity);

        return $db->run($query, $parameters);
    }

    public function update()
    {
        $db = new DB;

        $query = "UPDATE `multivendor`.`products` SET `serial` = ?, `description`= ?, `model`= ?, `location`= ?, `purchase_price`= ?, `sale_price`= ?,`quantity`= ? WHERE `id` = ?";

        $parameters = array($this->serial, $this->description, $this->model, $this->location, $this->purchase_price, $this->sale_price, $this->quantity, $this->id);

        $result = $db->run($query, $parameters);

        return $result;
    }

    public function delete()
    {
        $db = new DB;

        $query = "DELETE FROM `multivendor`.`products` WHERE `id` = ?";

        $parameters = array($this->id);

        $result = $db->run($query, $parameters);

        return $result;
    }

    public static function getByID($id)
    {
        $db = new DB;

        $query = "SELECT *
		FROM
		`products`
		WHERE
		`id` = ?";

        $parameters = array($id);
        $db->run($query, $parameters);

        $product = new Product();

        foreach ($db->result()[0] as $property => $value) {
            $product->$property = $value;
        }

        return $product;
    }

    public static function readOne()
    {
        $db = new DB;
        $product = new Product();

        $query = "SELECT *
		FROM
		products
		WHERE
		id = ?
		LIMIT
		0, 1";

        $parameters = array($product->id);

        $result = $db->run($query, $parameters);
        $row = null;

        if ($result) {
            $row = $db->result()[0];

            $product->serial = $row['serial'];
            $product->purchase_price = $row['purchase_price'];
            $product->sale_price = $row['sale_price'];
            $product->description = $row['description'];
            $product->quantity = $row['quantity'];
            $product->model = $row['model'];
            $product->location = $row['location'];
        }

        return $row;
    }

    public static function readAll($from_record_num = null, $records_per_page = null)
    {
        $db = new DB;
        if ($from_record_num == null) {
            $query = "SELECT *
                        FROM
                        products
                        ORDER BY
                        id ASC";

            $result = $db->run($query);

        } else {
            $query = "SELECT *
                        FROM
                        products
                        ORDER BY
                        id ASC
                        LIMIT
                        {$from_record_num}, {$records_per_page}";

            $result = $db->run($query);
        }
        $rows = array();

        if ($result) {
            $rows = $db->result();
        }

        return $rows;
    }

    public static function countAll()
    {
        $db = new DB;

        $query = "SELECT id FROM products";

        $db->run($query);

        $num = $db->count();

        return $num;
    }

}