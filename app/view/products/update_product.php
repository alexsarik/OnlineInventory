<?php
/**
 * Created by PhpStorm.
 * User: markc
 * Date: 12/01/2017
 * Time: 23:00
 */
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?c=product&a=list_products">Inventario</a></li>
    <li class="breadcrumb-item active">Modificar Producto</li>
</ol>
<h2>Modificar Producto</h2>

<form action='index.php?c=product&a=update&id=<?= $product->id ?>'  method='post'>
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Serial</td>
            <td><input type="text" name="serial" value="<?= $product->serial ?>" class="form-control"></td>
        </tr>
        <tr>
            <td>Descripción</td>
            <td><input type='text' name='description' value='<?= $product->description ?>' class='form-control'/></td>
        </tr>
        <tr>
            <td>Modelo</td>
            <td><input type='text' name='model' value='<?= $product->model ?>' class='form-control'/></td>
        </tr>
        <tr>
            <td>Ubicación</td>
            <td><input type='text' name='location' value='<?= $product->location ?>' class='form-control'/></td>
        </tr>
        <tr>
            <td>Precio Compra (€)</td>
            <td><input type='number' name='purchase_price' value='<?= $product->purchase_price ?>'
                       class='form-control'/></td>
        </tr>
        <tr>
            <td>Precio Venta (€)</td>
            <td><input type='number' name='sale_price' value='<?= $product->sale_price ?>' class='form-control'/></td>
        </tr>
        <tr>
            <td>Cantidad (Uds.)</td>
            <td><input type='number' name='quantity' value='<?= $product->quantity ?>' class='form-control'/></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary" name="action" value="update">Actualizar</button>
            </td>
        </tr>
    </table>
</form>
