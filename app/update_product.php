<?php

// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

// include database and object files
include_once 'config/database2.php';
include_once 'objects/product.php';

// prepare objects
$product = new Product();

// set ID property of product to be edited
$product->id = $id;

// read the details of product to be edited
$product->readOne();

// set page header
$page_title = "Modificar Producto";
include_once "header.php";

// contents will be here
echo "<div class='right-button-margin'>";
echo "<a href='index.php' class='btn btn-default pull-right'>Ver Productos</a>";
echo "</div>";
 
// if the form was submitted
if($_POST){

    // set product property values
	$product->serial = $_POST['serial'];
	$product->description = $_POST['description'];
	$product->model = $_POST['model'];
	$product->location = $_POST['location'];
	$product->purchasePrice = $_POST['purchasePrice'];
	$product->salePrice = $_POST['salePrice'];
	$product->quantity = $_POST['quantity'];

    // update the product
	if($product->update()){

		echo "<div class='alert alert-success alert-dismissable'>";
			echo "Producto modificado correctamente.";
		echo "</div>";
 	}

    // if unable to update the product, tell the user
	else{
		echo "<div class='alert alert-danger alert-dismissable'>";
			echo "No ha sido posible modificar el producto.";
		echo "</div>";
	}
}
?>

<!-- HTML Form -->
<form action='update_product.php?id=<?php echo $id; ?>' method='post'>

	<table class='table table-hover table-responsive table-bordered'>

		<tr>
			<td>Serial</td>
			<td><input type='text' name='serial' value='<?php echo $product->serial; ?>' class='form-control' /></td>
		</tr>

		<tr>
			<td>Descripción</td>
			<td><input type='text' name='description' value='<?php echo $product->description; ?>' class='form-control'/></td>
		</tr>

		<tr>
			<td>Modelo</td>
			<td><input type='text' name='model' value='<?php echo $product->model; ?>' class='form-control' /></td>
		</tr>

		<tr>
			<td>Ubicación</td>
			<td><input type='text' name='location' value='<?php echo $product->location; ?>' class='form-control' /></td>
		</tr>


		<tr>
			<td>Precio Compra (€)</td>
			<td><input type='number' name='purchasePrice' value='<?php echo $product->purchasePrice; ?>' class='form-control' /></td>
		</tr>

		<tr>
			<td>Precio Venta (€)</td>
			<td><input type='number' name='salePrice' value='<?php echo $product->salePrice; ?>' class='form-control' /></td>
		</tr>

		<tr>
			<td>Cantidad (Uds.)</td>
			<td><input type='number' name='quantity' value='<?php echo $product->quantity; ?>' class='form-control' /></td>
		</tr>



		<tr>
			<td></td>
			<td>
				<button type="submit" class="btn btn-primary">Actualizar</button>
			</td>
		</tr>

	</table>
</form>

<?php
// set page footer
include_once "footer.php";
?>