<?php

/**
 * Created by PhpStorm.
 * User: markc
 * Date: 15/01/2017
 * Time: 7:44
 */
class SaleItem
{
    public $id;
    public $sale_order_id;
    public $product_id;
    public $quantity;
    public $db;
    /**
     * SaleItem constructor.
     * @param $id
     * @param $sale_order_id
     * @param $product_id
     * @param $quantity
     */
    public function __construct($id = null, $sale_order_id= null, $product_id= null, $quantity= null)
    {
        $this->id = $id;
        $this->sale_order_id = $sale_order_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    public function create(){
        $this->db = new DB;

        $query = "INSERT INTO `sales_order_item`(`sale_order_id`, `product_id`, `quantity`) VALUES (?,?,?);";
        $parameters = array($this->sale_order_id,$this->product_id,$this->quantity);


        if($this->db->run($query, $parameters)){
            return $this->db->lastId();
        }else{
            return false;
        }
    }

    public static function readAll(){
        $db = new DB;

        $sale_items = [];

        $query = "SELECT * FROM `sales_order_item`
		ORDER BY `id` ASC ";


        if ($db->run($query)) {
            $results = $db->result();
            foreach ($results as $result) {
                $sale_item = new SaleItem();
                foreach ($result as $property => $value) {
                    $sale_item->$property = $value;
                }
                $sale_items[] = $sale_item;
            }
        }

        return $sale_items;
    }

}