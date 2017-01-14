<?php
/**
 * Created by PhpStorm.
 * User: markc
 * Date: 14/01/2017
 * Time: 10:00
 */

?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?c=product&a=list_products">Inventario</a></li>
    <li class="breadcrumb-item active">Detalles de Producto</li>
</ol>

<div class='right-button-margin'>
    <a href='index.php?c=product&a=update&id=<?=$product->id?>' class='btn btn-primary pull-right'>Modificar Producto</a>
</div>

<h2>Detalles de Producto</h2>

<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td><strong>Serial</strong></td>
        <td style='width:70%;text-align:right;'><?= $product->serial ?></td>
        </tr>

    <tr>
        <td><strong>Descripción</strong></td>
        <td style='width:70%;text-align:right;'><?= $product->description?></td>
        </tr>

    <tr>
        <td><strong>Modelo</strong></td>
        <td style='width:70%;text-align:right;'><?= $product->model?></td>
        </tr>

    <tr>
        <td><strong>Ubicación</strong></td>
        <td style='width:70%;text-align:right;'><?= $product->location?></td>
        </tr>

    <tr>
        <td><strong>Precio Compra (€)</strong></td>
        <td style='width:70%;text-align:right;'><?= $product->purchase_price?></td>
        </tr>

    <tr>
        <td><strong>Precio Venta (€)</strong></td>
        <td style='width:70%;text-align:right;'><?= $product->sale_price?></td>
        </tr>

    <tr>
        <td><strong>Cantidad (Uds.)</strong></td>
        <td style='width:70%;text-align:right;'><?=$product->quantity ?></td>
        </tr>

    </table>

