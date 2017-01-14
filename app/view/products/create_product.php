<?php
/**
 * Created by PhpStorm.
 * User: markc
 * Date: 13/01/2017
 * Time: 23:22
 */
//var_dump($render_data);
?>
<!-- HTML form for creating a product -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?c=product&a=list_products">Inventario</a></li>
    <li class="breadcrumb-item active">Añadir Producto</li>
</ol>
<h2>Añadir Producto</h2>
<form action='index.php?c=product&a=create' method='post'>

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Serial</td>
            <td><input type='text' width='30' name='serial' class='form-control' autofocus/></td>
        </tr>


        <tr>
            <td>Descripción</td>
            <td><input type='text' width='150' name='description' class='form-control'> </td>
        </tr>

        <tr>
            <td>Modelo</td>
            <td><input type='text' width='150' name='model' class='form-control'> </td>
        </tr>

        <tr>
            <td>Ubicación</td>
            <td><input type='text' width='150' name='location' class='form-control'> </td>
        </tr>

        <tr>
            <td>Precio de Compra</td>
            <td><input type='number' name='purchase_price' class='form-control' /></td>
        </tr>

        <tr>
            <td>Precio de Venta</td>
            <td><input type='number' name='sale_price' class='form-control' /></td>
        </tr>

        <tr>
            <td>Cantidad</td>
            <td><input type='number' name='quantity' class='form-control' /></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-success" name="action" value="create">Añadir</button>
            </td>
        </tr>

    </table>
</form>
