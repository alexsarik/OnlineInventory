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
        $render_data = array();
        $product = new Product();
        if (isset($_POST['action']) && $_POST['action'] == "create") {
            var_dump($_POST);
            extract($_POST);

            $isSerial = !is_null($_POST['serial']) && $_POST['serial'] != "";
            $isDescription = !is_null($description);
            $isModel = !is_null($model);
            $isLocation = !is_null($location);
            $isPurchasePrice = !is_null($purchase_price);
            $isSalePrice = !is_null($sale_price);
            $isQuantity = !is_null($quantity);

            if ($isSerial && $isDescription && $isModel && $isLocation && $isPurchasePrice && $isSalePrice && $isQuantity) {
                $product->serial = $serial;
                $product->description = $description;
                $product->model = $model;
                $product->location = $location;
                $product->purchase_price = $purchase_price;
                $product->sale_price = $sale_price;
                $product->quantity = $quantity;

                if ($product->create()) {
                    $render_data['info'] = "Producto creado.";
                } else {
                    $render_data['error'] = "No se ha podido crear el Producto.";
                }
            }else{
                $render_data['error'] = "Rellene todos los campos.";
            }
        }
        $render_data['title'] = "Añadir Producto";
        $this->render('products/create_product', $render_data);
    }

    #  serial,   description,   model,   location,   purchasePrice,   salePrice,   quantity,   id
    public function update()
    {
        $render_data = array();
        $product = Product::readOne($_GET['id']);

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
                header('Refresh: 1; url= index.php?c=product&a=list_products');
            } else {
                $render_data['error'] = "No se ha podido actualizar la información del producto.";
            }

        }
        $render_data['product'] =  $product;
        $render_data['title'] = "Actualizar Producto";
        $this->render('products/update_product', $render_data);
    }

    public function delete()
    {

        #$this->render('update_product', $render_data);
    }

    public function details()
    {
        $render_data = array();
        $id = $_GET['id'];
        $product = Product::readOne($id);
        //var_dump($product);
        $render_data['product'] = $product;
        $render_data['title'] = "Detalles de Producto";
        $this->render('products/read_one_product', $render_data);
    }

    public function list_products()
    {
        $render_data['title'] = "Productos";
        $render_data['products'] = Product::readAll();
        //var_dump($render_data);

        $this->render('products/list_products', $render_data);

    }
}