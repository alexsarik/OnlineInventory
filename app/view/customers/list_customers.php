<?php
/**
 * Created by PhpStorm.
 * User: markc
 * Date: 14/01/2017
 * Time: 11:24
 */
?>


<section>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Clientes</a></li>
        <li class="breadcrumb-item active">Ver Clientes</li>
    </ol>

    <div class='right-button-margin'>
        <a href='index.php?c=customer&a=create' class='btn btn-success pull-right'>Añadir Cliente</a>
    </div>

    <h2>Lista de Clientes</h2>
    <p>Mostrando <?= count($customers) ?> cliente(s).</p>
    <div class="table-default" style="overflow-x: scroll">
        <table class="table table-hover table-responsive table-bordered">
            <thead>
            <th>Nombre</th>
            <th>Persona de Contacto</th>
            <th>Dirección</th>
            <th>Codigo Postal</th>
            <th>Ciudad</th>
            <th>Email</th>
            <th>Num. Contacto</th>
            <th>Acciones</th>
            </thead>
            <tbody>
            <?php foreach ($customers as $customer) : ?>
                <tr id='customer<?= $customer->id ?>'>
                    <td><?= $customer->name ?></td>
                    <td><?= $customer->description ?></td>
                    <td><?= $customer->address ?></td>
                    <td><?= $customer->postal_code ?></td>
                    <td><?= $customer->city ?></td>
                    <td><a href="mailto:<?= $customer->email ?>"><?= $customer->email ?></a></td>
                    <td><a href="tel:<?= $customer->contact_num?>"><?= $customer->contact_num?></a></td>
                    <td style='white-space:nowrap'>
                        <a href='index.php?c=customer&a=details&id=<?= $customer->id ?>' class='btn btn-primary left-margin'><span class='glyphicon glyphicon-list'></span> Detalles</a>
                        <a href='index.php?c=customer&a=update&id=<?= $customer->id ?>' class='btn btn-info left-margin'><span class='glyphicon glyphicon-list'></span> Modificar</a>
                        <a href='index.php?c=customer&a=delete&id=<?= $customer->id ?>' class='btn btn-danger delete-object'><span class='glyphicon glyphicon-list'></span> Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</section>
