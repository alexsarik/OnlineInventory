
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
<form action='index.php?c=sale&a=create' method='post'>

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Cliente</td>
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
            <td></td>
            <td>
                <button type="submit" class="btn btn-success" name="action" value="create">Crear</button>
            </td>
        </tr>

    </table>
</form>
