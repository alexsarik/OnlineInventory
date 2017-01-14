<?php

/**
 * Created by PhpStorm.
 * User: markc
 * Date: 14/01/2017
 * Time: 12:05
 */
class customerController extends Controller
{

    public function create()
    {
        $render_data = array();
        $customer = new Customer();
        if ($this->checkAction("create")) {

            extract($_POST);

            $customer->name = $name;
            $customer->description = $description;
            $customer->address = $address;
            $customer->city = $city;
            $customer->email = $email;
            $customer->contact_num= $contact_num;

            if ($customer->create()) {
                $render_data['info'] = "Cliente creado.";
                header('Refresh: 1; url="index.php?c=customer&a=list_customers');
            } else {
                $render_data['error'] = "No se ha podido crear el Cliente.";
            }
        }

        $render_data['title'] = "Añadir Cliente";
        $this->render('customers/create_customer', $render_data);
    }


    public function details()
    {
        $render_data = array();
        $id = $_GET['id'];
        $customer = Customer::readOne($id);
        //var_dump($customer);
        $render_data['customer'] = $customer;
        $render_data['title'] = "Detalles de Cliente";
        $this->render('customers/read_one_customer', $render_data);
    }

    public function update()
    {
        $render_data = array();
        $customer = Customer::readOne($_GET['id']);

        if ($this->checkAction("update")) {
            extract($_POST);

            $customer->id = $_GET['id'];
            $customer->name = $name;
            $customer->description = $description;
            $customer->address = $address;
            $customer->city = $city;
            $customer->email = $email;
            $customer->contact_num= $contact_num;

            if ($customer->update()) {
                $render_data['info'] = "Cliente actualizado.";
                header('Refresh: 1; url= index.php?c=customer&a=list_customers');
            } else {
                $render_data['error'] = "No se ha podido actualizar la información del Cliente.";
            }

        }
        $render_data['customer'] = $customer;
        $render_data['title'] = "Actualizar Cliente";
        $this->render('customers/update_customer', $render_data);
    }

    public function delete()
    {
        $id = $_GET['id'];
        extract($_GET);
        if ($id != 0 && !is_null($id) && isset($id)) {
            $customer = Customer::readOne($id);
            if ($customer->delete()) {
                $render_data['info'] = "Cliente eliminado.";
            } else {
                $render_data['error'] = "No se ha podido eliminar el Cliente.";
            }
        }
        $this->list_customers($render_data);
    }

    public function list_customers($data = null)
    {

        $render_data['title'] = "Clientes";
        $render_data['customers'] = Customer::readAll();
        //var_dump($render_data);
        if (isset($data)) {
            $render_data = array_merge($render_data, $data);

        }
        $this->render('customers/list_customers', $render_data);
    }
}