<?php

/**
 * Created by PhpStorm.
 * User: markc
 * Date: 14/01/2017
 * Time: 13:57
 */
class Sale
{
    public $id;
    public $user_id;
    public $user_name;
    public $customer_id;
    public $customer_name;
    public $date_created;

    public $db;

    /**
     * Sale constructor.
     * @param $id
     * @param $user_id
     * @param $customer_id
     * @param $date_created
     * @param $db
     */
    public function __construct($id = null, $user_id = null, $customer_id = null, $date_created = null)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->customer_id = $customer_id;
        $this->date_created = $date_created;
    }

    public function create(){
        $db = new DB;

        $query = "INSERT INTO `sales_orders`(`customer_id`, `user_id`, `date_created`) VALUES ( ?, ?, ?);";
        $parameters = array($this->customer_id,$this->user_id, $this->date_created);

        if($db->run($query, $parameters)){
            return $db->lastId();
        }else{
            return false;
        }
    }


    public static function readOne($id){
        $db = new DB;
        $sale = new Sale();

        $query = "SELECT *
                  FROM `sales_orders`
                  WHERE `id` = ?
                  LIMIT 0, 1";

        $parameters = array($id);
        $db->run($query, $parameters);

        foreach ($db->result()[0] as $property => $value) {
            $sale->$property = $value;
        }

        return $sale;

    }

    public static function readAll(){
        $db = new DB;
        $sales = [];
        $query = "SELECT s.`id`,s.`user_id`, u.name as user_name,s.`customer_id`, c.name as customer_name, `date_created` 
                    FROM `sales_orders` as s 
                    JOIN users as u ON u.id = s.`user_id` 
                    JOIN customers as c ON c.id = s.`customer_id` 
                    ORDER BY `date_created` DESC";
        if($db->run($query)) {
            $results = $db->result();
            foreach($results as $result){
                $sale = new Sale();
                foreach ($result as $property=>$value){
                    $sale->$property = $value;
                }
                $sales[] = $sale;
            }
        }
        return $sales;
    }

    function delete()
    {
        $db = new DB;

        $query = "DELETE FROM `sales_orders` 
                  WHERE `id` = ?";

        $parameters = array($this->id);

        $result = $db->run($query, $parameters);

        return $result;
    }


}