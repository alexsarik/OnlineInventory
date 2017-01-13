<?php

include_once "config/database2.php";
include_once "objects/customer.php";

$customer = new Customer();

$customer->id = $_POST['object_id'];

	if($customer->delete()){
		echo "Producto eliminado.";
	} else{
		echo "No ha sido posible eliminar el producto.";
	}
?>
