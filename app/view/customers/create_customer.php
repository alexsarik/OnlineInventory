<?php
/**
 * Created by PhpStorm.
 * User: markc
 * Date: 14/01/2017
 * Time: 11:24
 */
?>

<!-- HTML form for creating a customer -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?c=customer&a=list_customers">Clientes</a></li>
    <li class="breadcrumb-item active">Añadir Cliente</li>
</ol>
<h2>Añadir Cliente</h2>
<form action='index.php?c=customer&a=create' method='post'>

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Nombre</td>
            <td><input type='text' width='30' name='name' class='form-control' autofocus/></td>
        </tr>


        <tr>
            <td>Persona de Contacto</td>
            <td><input type='text' width='150' name='description' class='form-control'> </td>
        </tr>

        <tr>
            <td>Dirección</td>
            <td><input type='text' width='150' name='address' class='form-control'> </td>
        </tr>

        <tr>
            <td>Ciudad</td>
            <td><input type='text' width='150' name='city' class='form-control'> </td>
        </tr>

        <tr>
            <td>Código Postal</td>
            <td><input type='number' width='150' name='postal_code' class='form-control'> </td>
        </tr>

        <tr>
            <td>Email</td>
            <td><input type='email' name='email' class='form-control' /></td>
        </tr>

        <tr>
            <td>Num. Contacto</td>
            <td><input type='tel' name='contact_num' class='form-control' /></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-success" name="action" value="create">Añadir</button>
            </td>
        </tr>

    </table>
</form>
