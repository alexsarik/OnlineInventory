<?php

/**
 * Created by PhpStorm.
 * User: markc
 * Date: 14/01/2017
 * Time: 13:57
 */
class saleController extends Controller
{


    public function create()
    {
        $render_data = array();

        $sale = new Sale();
        $customer = new Customer();
        $product = new Product();

        $customers = Customer::readAll();
        $products = Product::readAll();

        $injection = ["customers"=>$customers, "products"=>$products];

        $render_data['customers'] = $customers;
        $render_data['products'] = $products;
        $render_data['injection'] = $injection;

        if ($this->checkAction("create")) {
            var_dump($_POST);
            extract($_POST);


            $sale->user_id = $this->currentUser()->id;
            $sale->customer_id = $customer_id;
            $sale->date_created = date('Y-m-d');


            if ($sale->create()) {
                $render_data['info'] = "Venta creada.";
                header('Refresh: 1; url="index.php?c=sale&a=list_sales');
            } else {
                $render_data['error'] = "No se ha podido crear la Venta.";
            }

        }
        $render_data['title'] = "Añadir Venta";
        $this->render('sales/create_sale', $render_data);
    }

    public function delete()
    {
        $id = $_GET['id'];
        extract($_GET);
        if ($id != 0 && !is_null($id) && isset($id)) {
            $sale = Sale::readOne($id);
            if ($sale->delete()) {
                $render_data['info'] = "Venta eliminado.";
            } else {
                $render_data['error'] = "No se ha podido eliminar la Venta.";
            }
        }
        $this->list_sales($render_data);
    }

    public function list_sales()
    {
        $render_data['title'] = "Ventas";
        $render_data['sales'] = Sale::readAll();
        $render_data['customers'] = Customer::readAll();
        $render_data['products'] = Product::readAll();

        //var_dump($render_data);
        if (isset($data)) {
            $render_data = array_merge($render_data, $data);

        }
        $this->render('sales/list_sales', $render_data);
    }

}