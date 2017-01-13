<?php
/**
 * Created by PhpStorm.
 * User: markc
 * Date: 12/01/2017
 * Time: 23:00
 */
extract($render_data);
?>
<form action='index.php?c=product&a=update&id=<?= $product['id'] ?>' method='post'>

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Serial</td>
            <td><input type='text' name='serial' value='<?= $product["serial"] ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Descripción</td>
            <td><input type='text' name='description' value='<?php echo $product["description"] ?>' class='form-control'/></td>
        </tr>

        <tr>
            <td>Modelo</td>
            <td><input type='text' name='model' value='<?php echo $product["model"] ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Ubicación</td>
            <td><input type='text' name='location' value='<?php echo $product["location"] ?>' class='form-control' /></td>
        </tr>


        <tr>
            <td>Precio Compra (€)</td>
            <td><input type='number' name='purchase_price' value='<?php echo $product["purchase_price"] ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Precio Venta (€)</td>
            <td><input type='number' name='sale_price' value='<?php echo $product["sale_price"] ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Cantidad (Uds.)</td>
            <td><input type='number' name='quantity' value='<?php echo $product["quantity"] ?>' class='form-control' /></td>
        </tr>



        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary" name="action" value="update">Actualizar</button>
            </td>
        </tr>

    </table>
</form>
