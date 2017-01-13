<?php

/**
 * Created by PhpStorm.
 * User: markc
 * Date: 10/01/2017
 * Time: 22:32
 */
class User
{

    public $id;
    public $name;
    public $password;
    public $email;
    public $contact_num;
    public $role;
    public $db;

    /**
     * User constructor.
     * @param $id
     * @param $name
     * @param $password
     * @param $email
     * @param $contact_num
     * @param $role
     * @param $db
     */
    public function __construct($id = null, $name = null, $password = null, $email = null, $contact_num = null, $role = null, $db = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->contact_num = $contact_num;
        $this->role = $role;
        $this->db = $db;
    }


    public function create()
    {

        $db = new DB;

        $query = "INSERT INTO `users`(`name`, `email`, `contact_num`, `role`, `password`)
                  VALUES (?,?,?,?,?)";

        $parameters = array($this->name, $this->email, $this->contact_num, $this->role, $this->password);

        return $db->run($query, $parameters);

    }

    public function update()
    {

        $db = new DB;
        $query = "UPDATE `users` 
                  SET `name`=?,`email`=?,`contact_num`=?,`role`=?,`password`=? 
                  WHERE `id` = ?";
        $parameters = array();
        return $db->run($query);
    }

    public function delete()
    {

        $db = new DB;
        $query = "DELETE FROM `users` 
                  WHERE `id` = ?";
        $parameters = array();
        return $db->run($query, $parameters);
    }

    public static function getById($id)
    {

        $db = new DB;
        $query = "SELECT * FROM `users` 
                  WHERE `id` = ?";
        $parameters = array($id);
        $db->run($query, $parameters);

        $user = new User;

        foreach ($db->result()[0] as $property => $value) {
            $user->$property = $value;
        }

        return $user;

    }

    public static function getByUsername($name)
    {

        $db = new DB;
        $query = "SELECT * FROM `users` 
                  WHERE `name` = ?";
        $parameters = array($name);
        $db->run($query, $parameters);

        $user = new User;
        foreach ($db->result()[0] as $attr => $value) {
            $user->$attr = $value;
        }

        return $user;

    }

    public static function exist($name)
    {

        $db = new DB;
        $query = "SELECT count('x') AS count 
                  FROM `users` 
                  WHERE `name` = ?";
        $parameters = array($name);
        $db->run($query, $parameters);
        return $db->result()[0]['count'] > 0;
    }


}