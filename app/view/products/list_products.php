<?php
/**
 * Created by PhpStorm.
 * User: markc
 * Date: 12/01/2017
 * Time: 22:43
 */

#$page = isset($_GET['page']) ? $_GET['page'] : 1;
// set number of records per page
#$records_per_page = 3;
// calculate for the query LIMIT clause
#$from_record_num = ($records_per_page * $page) - $records_per_page;
?>

<section>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Inventario</a></li>
        <li class="breadcrumb-item active">Ver Productos</li>
    </ol>

    <div class='right-button-margin'>
        <a href='index.php?c=product&a=create' class='btn btn-success pull-right'>Añadir Producto</a>
    </div>

    <h2>Lista de Productos</h2>
    <p>Mostrando <?= count($products) ?> producto(s).</p>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
            <th>Serial</th>
            <th>Descripción</th>
            <th>Modelo</th>
            <th>Ubicación</th>
            <th>Precio Compra (€)</th>
            <th>Precio Venta (€)</th>
            <th>Cantidad (Uds.)</th>
            <th>Acciones</th>
            </thead>
            <tbody>
            <?php foreach ($products as $product) : ?>
                <tr id='product<?= $product->id ?>'>
                    <td><?= $product->serial ?></td>
                    <td><?= $product->description ?></td>
                    <td><?= $product->model ?></td>
                    <td><?= $product->location ?></td>
                    <td><?= $product->purchase_price ?></td>
                    <td><?= $product->sale_price ?></td>
                    <td><?= $product->quantity ?></td>
                    <td style='white-space:nowrap'>
                        <a href='index.php?c=product&a=details&id=<?= $product->id ?>' class='btn btn-primary left-margin'><span class='glyphicon glyphicon-list'></span> Detalles</a>
                        <a href='index.php?c=product&a=update&id=<?= $product->id ?>' class='btn btn-info left-margin'><span class='glyphicon glyphicon-list'></span> Modificar</a>
                        <a href='index.php?c=product&a=delete&id=<?= $product->id ?>' class='btn btn-danger delete-object'><span class='glyphicon glyphicon-list'></span> Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</section>