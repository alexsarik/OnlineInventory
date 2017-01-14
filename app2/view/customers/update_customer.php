<?php
/**
 * Created by PhpStorm.
 * User: markc
 * Date: 14/01/2017
 * Time: 12:43
 */


?>


<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?c=customer&a=list_customers">Clientes</a></li>
    <li class="breadcrumb-item active">Modificar Cliente</li>
</ol>
<h2>Modificar Cliente</h2>

<form action='index.php?c=customer&a=update&id=<?= $customer->id ?>'  method='post'>
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="name" value="<?= $customer->name ?>" class="form-control"></td>
        </tr>
        <tr>
            <td>Descripción</td>
            <td><input type='text' name='description' value='<?= $customer->description ?>' class='form-control'/></td>
        </tr>
        <tr>
            <td>Dirección</td>
            <td><input type='text' name='address' value='<?= $customer->address ?>' class='form-control'/></td>
        </tr>
        <tr>
            <td>Ciudad</td>
            <td><input type='text' name='city' value='<?= $customer->city ?>' class='form-control'/></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type='text' name='email' value='<?= $customer->email ?>'
                       class='form-control'/></td>
        </tr>
        <tr>
            <td>Num. Contacto</td>
            <td><input type='tel' name='contact_num' value='<?= $customer->contact_num ?>' class='form-control'/></td>
        </tr>
        
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary" name="action" value="update">Actualizar</button>
            </td>
        </tr>
    </table>
</form>

