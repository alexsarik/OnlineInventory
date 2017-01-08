<?php
if($_POST){
	include_once "config/database2.php";
	include_once "objects/product.php";

	$product = new Product();

	$product->id = $_POST['object_id'];

	if($product->delete()){
		echo "Producto eliminado.";
	}else{
		echo "No ha sido posible eliminar el producto.";
	}
}
?>	