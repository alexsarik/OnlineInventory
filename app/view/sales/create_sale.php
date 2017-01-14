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

        <legend>Datos del Cliente</legend>
        <div class="col-md-6">
            <div class="form-group col-xs-6 col-sm-12 col-md-12">

                <label for="client_name">Nombre del Cliente:</label>
                <select class="form-control selectpicker" data-live-search="true" id="client_name">
                    <?php foreach ($customers as $customer) : ?>
                        <option><?= $customer->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-xs-6 col-sm-12 col-md-12">
                <label for="client_description">Persona de Contacto:</label>
                <input class="form-control" type="text" name="client_description" placeholder="Daniel García">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group col-xs-12 col-sm-12 col-md-12">
                <label for="client_address">Dirección:</label>
                <input class="form-control" type="text" name="client_address" placeholder="Calle Ejemplo, 2, 1 B">
            </div>
            <div class="form-group col-xs-6 col-sm-6 col-md-6">
                <label for="client_address">Código Postal:</label>
                <input class="form-control" type="number" name="client_address" placeholder="28039">
            </div>
            <div class="form-group col-xs-6 col-sm-6 col-md-6">
                <label for="client_address">Población:</label>
                <input class="form-control" type="text" name="client_address" placeholder="Madrid">
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
                    <th>Descripcion</th>
                    <th>Modelo</th>
                    <th>Serial</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-success" name="action" value="create">Crear Venta</button>
    </form>
</div>