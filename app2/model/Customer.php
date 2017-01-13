<?php

/**
 * Created by PhpStorm.
 * User: markc
 * Date: 10/01/2017
 * Time: 22:34
 */
class Customer
{

    public $id;
    public $name;
    public $description;
    public $contactNum;
    public $email;
    public $city;
    public $address;
    public $db;

    /**
     * Customer constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $contactNum
     * @param $email
     * @param $city
     * @param $address
     * @param $db
     */
    public function __construct($id = null, $name = null, $description = null, $contactNum = null,
                                $email = null, $city = null, $address = null, $db = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->contactNum = $contactNum;
        $this->email = $email;
        $this->city = $city;
        $this->address = $address;
        $this->db = new DB;
    }


    function create()
    {
        $db = new DB;
        //Query para INSERT nuevo Producto
        $query = "INSERT INTO `multivendor`.`customers` (`name`, `description`, `contact_num`, `email`, `city`, `address`)
		          VALUES (?,?,?,?,?,?)";

        $parameters = array($this->name, $this->description, $this->contactNum, $this->email, $this->city, $this->address);

        return $db->run($query, $parameters);
    }

    function update()
    {
        $db = new DB;

        $query = "UPDATE `multivendor`.`customers` 
                  SET `name` = ?, `description`= ?, `contact_num`= ?, `email`= ?, `city`= ?, `address` = ? 
                  WHERE `id` = ?";

        $parameters = array($this->name, $this->description, $this->contactNum, $this->email, $this->city, $this->address, $this->id);

        $result = $db->run($query, $parameters);

        return $result;
    }

    function delete()
    {
        $db = new DB;

        $query = "DELETE FROM `multivendor`.`customers` 
                  WHERE `id` = ?";

        $parameters = array($this->id);

        $result = $db->run($query, $parameters);

        return $result;
    }

    function readOne()
    {
        $db = new DB;

        $query = "SELECT *
                  FROM `multivendor`.`customers`
                  WHERE `id` = ?
                  LIMIT 0, 1";

        $parameters = array($this->id);

        $result = $db->run($query, $parameters);
        $row = null;

        if ($result) {
            $row = $db->result()[0];

            $this->name = $row['name'];
            $this->description = $row['description'];
            $this->contactNum = $row['contact_num'];
            $this->email = $row['email'];
            $this->city = $row['city'];
            $this->address = $row['address'];
        }

        return $row;
    }

    function readAll($from_record_num, $records_per_page)
    {
        $db = new DB;

        $query = "SELECT * FROM `multivendor`.`customers`
		ORDER BY id ASC
		LIMIT {$from_record_num}, {$records_per_page}";

        $result = $db->run($query);

        $rows = array();

        if ($result) {
            $rows = $db->result();
        }

        return $rows;
    }

    public function countAll()
    {
        $db = new DB;

        $query = "SELECT id 
                  FROM `multivendor`.`customers`";

        $db->run($query);

        $num = $db->count();

        return $num;
    }

}