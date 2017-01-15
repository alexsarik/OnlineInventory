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

        <legend role="button" data-toggle="collapse" href="#form-customer-info" aria-expanded="false"
                aria-controls="form-customer-info">
            Datos del Cliente<span class="pull-right glyphicon glyphicon-chevron-down"></span></legend>
        <div id="form-customer-info" class="collapse in">
            <div class="col-md-6 section-1">
                <div class="form-group col-xs-12 col-sm-6 col-md-12">

                    <label for="name">Nombre del Cliente:</label>
                    <select class="form-control selectpicker name" data-live-search="true" id="name" name="customer_id">
                        <?php foreach ($customers as $customer) : ?>
                            <option value="<?= $customer->id ?>"><?= $customer->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-12">
                    <label for="description">Persona de Contacto:</label>
                    <input id="description" class="form-control" type="text"
                           placeholder="Daniel García" disabled>
                </div>
            </div>
            <div class="col-md-6 section-2">
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <label for="address">Dirección:</label>
                    <input id="address" class="form-control" type="text"
                           placeholder="Calle Ejemplo, 2, 1 B" disabled>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-6">
                    <label for="postal_code">Código Postal:</label>
                    <input id="postal_code" class="form-control" type="number"
                           placeholder="28039" disabled>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-6">
                    <label for="city">Población:</label>
                    <input id="city" class="form-control" type="text"
                           placeholder="Madrid" disabled>
                </div>
            </div>
        </div>
        <legend role="button" data-toggle="collapse" href="#form-products-list" aria-expanded="false"
                aria-controls="form-products-list">Artículos<span
                    class="pull-right glyphicon glyphicon-chevron-down"></span></legend>
        <div id="form-products-list">
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
                        <th>Precio Compra (€)</th>
                        <th>Precio Venta (€)</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="tr_clone">
                        <td class="product_serial">
                            <select data-width="fit" class="selectpicker" data-live-search="true" id="product_serial" name="product_id"
                                    data-container="body">
                                <?php foreach ($products as $product): ?>
                                    <option value="<?= $product->id ?>"> <?= $product->serial ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td class="product_description"><?= $products[0]->description ?></td>
                        <td class="product_model"><?= $products[0]->model ?></td>
                        <td class="product_purchase_price"><?= $products[0]->purchase_price ?></td>
                        <td class="product_sale_price"><?= $products[0]->sale_price ?></td>
                        <td class="product_quantity"><input name="quantity" class="form-control" type="number" value="1" step="1"
                                                            min="1" max="<?= $products[0]->quantity ?>"</td>
                        <td>

                            <a class="btn btn-danger" href="javascript:void(0);" id="remove">Remove</a></td>
                    </tr>
                    </tbody>
                </table>


        <button type="submit" class="btn btn-success" name="action" value="create">Crear Venta</button>
    </form>
</div>