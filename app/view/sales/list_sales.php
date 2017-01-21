<?php
/**
 * Created by PhpStorm.
 * User: markc
 * Date: 14/01/2017
 * Time: 13:25
 */


?>
<section>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Ventas</a></li>
        <li class="breadcrumb-item active">Ver Ventas</li>
    </ol>

    <div class='right-button-margin'>
        <a href='index.php?c=sale&a=create' class='btn btn-success pull-right'>Añadir Venta</a>
    </div>

    <h2>Listado de Ventas</h2>
    <p>Mostrando <?= count($sales) ?> venta(s).</p>
    <div class="table-responsive ">
        <table class="table table-hover table-bordered">
            <thead>
            <th>Nº Oferta</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Vendedor</th>
            <th>Acciones</th>
            </thead>
            <tbody>
            <?php foreach ($sales as $sale) : ?>
                <tr id='sale<?= $sale->id ?>'>
                    <td><?= $sale->sale_number ?></td>
                    <td><?= $sale->date_created ?></td>
                    <td><?= $sale->customer_name ?></td>
                    <td><?= $sale->user_name?></td>
                    <td style='white-space:nowrap'>
                        <a href='index.php?c=sale&a=details&id=<?= $sale->id ?>' class='btn btn-primary left-margin'><span class='glyphicon glyphicon-list'></span> Detalles</a>
                        <a href='index.php?c=sale&a=update&id=<?= $sale->id ?>' class='btn btn-info left-margin'><span class='glyphicon glyphicon-list'></span> Modificar</a>
                        <a href='index.php?c=sale&a=delete&id=<?= $sale->id ?>' class='btn btn-danger delete-object'><span class='glyphicon glyphicon-list'></span> Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</section>
