<?php

/**
 * Created by PhpStorm.
 * User: markc
 * Date: 12/01/2017
 * Time: 22:18
 */
class productController extends Controller
{
    #needs serial, description, model, location, purchasePrice, salePrice, quantity
    public function create()
    {
        $product = new Product();
        #$product->serial =
        #$product->create();
        #var_dump($_POST);

    }

    #  serial,   description,   model,   location,   purchasePrice,   salePrice,   quantity,   id
    public function update()
    {
        $render_data = array();
        $product = Product::getByID($_GET['id']);

        if (isset($_POST['action']) && $_POST['action'] == "update") {
            extract($_POST);

            $product->id = $_GET['id'];
            $product->serial = $serial;
            $product->description = $description;
            $product->model = $model;
            $product->location = $location;
            $product->purchase_price = $purchase_price;
            $product->sale_price = $sale_price;
            $product->quantity = $quantity;
            if ($product->update()) {
                $render_data['info'] = "Producto actualizado.";
            } else {
                $render_data['error'] = "No se ha podido actualizar la información del producto.";
            }

        }
        $render_data['product'] = (array) $product;
        $render_data['title'] = "Actualizar Producto";
        $this->render('update_product', $render_data);
    }

    public function delete()
    {

        #$this->render('update_product', $render_data);
    }

    public function details()
    {
        $render_data = array();
        $this->render('details', $render_data);
    }

    public function list_products()
    {
        $render_data['title'] = "Productos";
        $render_data['products'] = Product::readAll();
        //var_dump($product_array);

        $this->render('list_products', $render_data);

    }
}