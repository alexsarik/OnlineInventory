<?php
/**
 * Created by PhpStorm.
 * User: markc
 * Date: 14/01/2017
 * Time: 12:47
 */
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?c=customer&a=list_customers">Clientes</a></li>
    <li class="breadcrumb-item active">Detalles de Cliente</li>
</ol>

<div class='right-button-margin'>
    <a href='index.php?c=customer&a=update&id=<?=$customer->id?>' class='btn btn-primary pull-right'>Modificar Cliente</a>
</div>

<h2>Detalles de Cliente</h2>

<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td><strong>Nombre</strong></td>
        <td style='width:70%;text-align:right;'><?= $customer->name ?></td>
    </tr>

    <tr>
        <td><strong>Persona de Contacto</strong></td>
        <td style='width:70%;text-align:right;'><?= $customer->description?></td>
    </tr>

    <tr>
        <td><strong>Dirección</strong></td>
        <td style='width:70%;text-align:right;'><?= $customer->address?></td>
    </tr>

    <tr>
        <td><strong>Código Postal</strong></td>
        <td style='width:70%;text-align:right;'><?= $customer->postal_code?></td>
    </tr>

    <tr>
        <td><strong>Ciudad</strong></td>
        <td style='width:70%;text-align:right;'><?= $customer->city?></td>
    </tr>

    <tr>
        <td><strong>Email</strong></td>
        <td style='width:70%;text-align:right;'><a href="mailto:<?= $customer->email?>"><?= $customer->email?></td>
    </tr>

    <tr>
        <td><strong>Num. Contacto</strong></td>
        <td style='width:70%;text-align:right;'><a href="tel:<?= $customer->contact_num?>"><?= $customer->contact_num?></a></td>
    </tr>

</table>


