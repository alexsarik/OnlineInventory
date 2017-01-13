<?php

// get ID of the customer to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once "config/database2.php";
include_once "objects/customer.php";

$customer = new Customer();

$customer->id = $id;

$customer->readOne();

$page_title = "Modificar Cliente";
include_once "header.php";

// contents will be here
echo "<div class='right-button-margin'>";
echo "<a href='list_customers.php' class='btn btn-default pull-right'>Ver Clientes</a>";
echo "</div>";

// if the form was submitted
if($_POST){

    // set customer property values
	$customer->name = $_POST['name'];
	$customer->description = $_POST['description'];
	$customer->contactNum = $_POST['contactNum'];
	$customer->email = $_POST['email'];
	$customer->address = $_POST['address'];
	$customer->city = $_POST['city'];
	
    // update the customer
	if($customer->update()){

		echo "<div class='alert alert-success alert-dismissable'>";
			echo "customero modificado correctamente.";
		echo "</div>";
 	}

    // if unable to update the customer, tell the user
	else{
		echo "<div class='alert alert-danger alert-dismissable'>";
			echo "No ha sido posible modificar el customero.";
		echo "</div>";
	}
}
?>



<!-- HTML Form -->
<form action='update_customer.php?id=<?php echo $id; ?>' method='post'>

	<table class='table table-hover table-responsive table-bordered'>

		<tr>
			<td>Nombre</td>
			<td><input type='text' name='name' value='<?php echo $customer->name; ?>' class='form-control' /></td>
		</tr>

		<tr>
			<td>Descripción</td>
			<td><input type='text' name='description' value='<?php echo $customer->description; ?>' class='form-control'/></td>
		</tr>

		<tr>
			<td>Email</td>
			<td><input type='email' name='email' value='<?php echo $customer->email; ?>' class='form-control' /></td>
		</tr>

		<tr>
			<td>Num. Contacto</td>
			<td><input type='telnet' name='contactNum' value='<?php echo $customer->contactNum; ?>' class='form-control' /></td>
		</tr>


		<tr>
			<td>Dirección</td>
			<td><input type='text' name='address' value='<?php echo $customer->address; ?>' class='form-control' /></td>
		</tr>

		<tr>
			<td>Ciudad</td>
			<td><input type='text' name='city' value='<?php echo $customer->city; ?>' class='form-control' /></td>
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
include_once "footer.php";
?>