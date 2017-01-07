<?php
ini_set('display_errors',1);
// include database and object files
include_once 'config/database2.php';
include_once 'objects/product.php';

// pass connection to objects
$product = new Product();
//$category = new Category($db);

// set page headers
$page_title = "Añadir Producto";
include_once "header.php";

// contents will be here
echo "<div class='right-button-margin'>";
echo "<a href='index.php' class='btn btn-default pull-right'>Ver Productos</a>";
echo "</div>";
 
?>
<!-- HTML form for creating a product -->
<form action='create_product.php' method='post'>
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Serial</td>
            <td><input type='text' width='30' name='serial' class='form-control' /></td>
        </tr>
 
 
        <tr>
            <td>Descripción</td>
            <td><input type='text' width='150' name='description' class='form-control'></input type='text'></td>
        </tr>
 
        <tr>
            <td>Modelo</td>
            <td><input type='text' width='150' name='model' class='form-control'></input type='text'></td>
        </tr>
 
 		<tr>
            <td>Ubicación</td>
            <td><input type='text' width='150' name='location' class='form-control'></input type='text'></td>
        </tr>

        <tr>
            <td>Precio de Compra</td>
            <td><input type='number' name='purchasePrice' class='form-control' /></td>
        </tr>

        <tr>
            <td>Precio de Venta</td>
            <td><input type='number' name='salePrice' class='form-control' /></td>
        </tr>
 		
 		<tr>
            <td>Cantidad</td>
            <td><input type='number' name='quantity' class='form-control' /></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Añadir</button>
            </td>
        </tr>
 
    </table>
</form>

<?php

// if the form was submitted - PHP OOP CRUD Tutorial
if($_POST){
 
    // set product property values
    $product->serial = $_POST['serial'];
    $product->description = $_POST['description'];
    $product->model = $_POST['model'];
    $product->location = $_POST['location'];
    $product->salePrice = $_POST['salePrice'];
    $product->purchasePrice = $_POST['purchasePrice'];
 	$product->quantity = $_POST['quantity'];

    if($product->create()){
        echo "<div class='alert alert-success'>";
            echo "Product was created.";
        echo "</div>";
    }
 
    // if unable to create the product, tell the user
    else{
        echo "<div class='alert alert-danger'>";
            echo "Unable to create product.";
        echo "</div>";
    }
}


//Footer
include_once "footer.php";
?>