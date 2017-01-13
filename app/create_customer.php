 <?php
ini_set('display_errors',1);
// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// set number of records per page
$records_per_page = 3;
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

include_once "config/database2.php";
include_once "objects/customer.php";

$customer = new Customer();

$page_title = "Añadir Cliente";
include_once "header.php";

echo "<div class='right-button-margin'>";
	echo "<a href='list_customers.php' class='btn btn-primary pull-right'> Ver Clientes </a>";
echo "</div>";
?>


<!-- HTML form for creating a customer -->
<form action='create_customer.php' method='post'>
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Nombre</td>
            <td><input type='text' width='30' name='name' class='form-control' autofocus/></td>
        </tr>
 
 
        <tr>
            <td>Descripción</td>
            <td><input type='text' width='150' name='description' class='form-control'></input type='text'></td>
        </tr>
 
        <tr>
            <td>Num. Contacto</td>
            <td><input type='text' width='150' name='contactNum' class='form-control'></input type='text'></td>
        </tr>
 
 		<tr>
            <td>Email</td>
            <td><input type='text' width='150' name='email' class='form-control'></input type='text'></td>
        </tr>

        <tr>
            <td>Dirección</td>
            <td><input type='text' name='address' class='form-control' /></td>
        </tr>

        <tr>
            <td>Ciudad</td>
            <td><input type='text' name='city' class='form-control' /></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-success">Añadir</button>
            </td>
        </tr>
 
    </table>
</form>

<?php

if($_POST){

	$customer->name = $_POST['name'];
	$customer->description = $_POST['description'];
	$customer->contactNum = $_POST['contactNum'];
	$customer->email = $_POST['email'];
	$customer->city = $_POST['city'];
	$customer->address = $_POST['address'];

	if($customer->create()){
		echo "<div class='alert alert-success'>";
			echo "Cliente añadido.";
		echo "</div>";
	}else{
		echo "<div class='alert alert-danger'>";
			echo "No se ha podido añadir el cliente.";
		echo "</div>";
	}
}

include_once "footer.php";
?>