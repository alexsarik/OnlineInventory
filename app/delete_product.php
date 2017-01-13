<?php
//tengo que comprobar si el numero de filas que quedan despues de eliminar el producto, es inferior al numero de filas que tendria que haber en la pagina del mismo y si es cierto envio por get $page-1

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