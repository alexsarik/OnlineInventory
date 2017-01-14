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


}