<?php
/**
 * Created by PhpStorm.
 * User: markc
 * Date: 14/01/2017
 * Time: 14:12
 */
?>
<!-- HTML form for creating a sale -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?c=sale&a=list_sales">Ventas</a></li>
    <li class="breadcrumb-item active">Crear Venta</li>
</ol>
<h2>Crear Venta</h2>
<div class="row">
    <form action='index.php?c=sale&a=create' method='post' class="col-xs-12 col-md-12">

        <legend>Datos del customere</legend>
        <div class="col-md-6">
            <div class="form-group col-xs-6 col-sm-12 col-md-12">

                <label for="customer_name">Nombre del customere:</label>
                <select class="form-control selectpicker customer_name" data-live-search="true" id="customer_name">
                    <?php foreach ($customers as $customer) : ?>
                        <option><?= $customer->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-xs-6 col-sm-12 col-md-12">
                <label for="customer_description">Persona de Contacto:</label>
                <input id="customer_description" class="form-control" type="text" name="customer_description" placeholder="Daniel García">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group col-xs-12 col-sm-12 col-md-12">
                <label for="customer_address">Dirección:</label>
                <input id="customer_address" class="form-control" type="text" name="customer_address" placeholder="Calle Ejemplo, 2, 1 B">
            </div>
            <div class="form-group col-xs-6 col-sm-6 col-md-6">
                <label for="customer_postal_code">Código Postal:</label>
                <input id="customer_postal_code" class="form-control" type="number" name="customer_postal_code" placeholder="28039">
            </div>
            <div class="form-group col-xs-6 col-sm-6 col-md-6">
                <label for="customer_city">Población:</label>
                <input id="customer_city" class="form-control" type="text" name="customer_city" placeholder="Madrid">
            </div>
        </div>
        <legend>Artículos</legend>

        <a class="btn btn-success add-row">Añadir Producto</a>

        <br/>
        <br/>
        <div class="form-group" style="overflow-x: scroll">
            <table class="table table-responsive table-bordered" id="products_table">
                <thead>
                <tr>
                    <th>Serial</th>
                    <th>Descripción</th>
                    <th>Modelo</th>
                    <th>Ubicación</th>
                    <th>Precio Compra (€)</th>
                    <th>Precio Venta (€)</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <tr class="tr_clone">
                    <td>
                        <select class="selectpicker" data-live-search="true" id="product_serial">
                            <?php foreach ($products as $product): ?>
                               <option> <?= $product->serial ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <?= $products[0]->description ?>
                    </td>
                    <td>
                        <?= $products[0]->model ?>
                    </td>
                    <td>
                        <?= $products[0]->location ?>
                    </td>
                    <td>
                        <?= $products[0]->purchase_price ?>
                    </td>
                    <td>
                        <?= $products[0]->sale_price ?>
                    </td>
                    <td>
                        <?= $products[0]->quantity ?>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="javascript:void(0);" id="remove">Remove</a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-success" name="action" value="create">Crear Venta</button>
    </form>
</div>