<?php
ini_set('display_errors', 1);

$id = isset($_GET['id']) ? $_GET['id'] : die('Error: ID no existe');

include_once "config/database2.php";
include_once "objects/product.php";

//Preparo los objetos
$product = new Product();

$product->id = $id;

$product->readOne();

$page_title = "Ver Detalles Producto";
include_once "header.php";

// boton ver productos
echo "<div class='right-button-margin'>";
 

    echo "<a href='update_product.php?id=".$id."' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-edit'></span> Modificar Producto";
    echo "</a>";

    echo "<a href='index.php' class='btn btn-primary pull-right'>";
        echo "<span class='glyphicon glyphicon-list'></span> Ver Productos";
    echo "</a>";


echo "</div>";

// HTML table for displaying a product details
echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
        echo "<td><strong>Serial</strong></td>";
        echo "<td style='width:70%;text-align:right;'>{$product->serial}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td><strong>Descripción</strong></td>";
        echo "<td style='width:70%;text-align:right;'>{$product->description}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td><strong>Modelo</strong></td>";
        echo "<td style='width:70%;text-align:right;'>{$product->model}</td>";
    echo "</tr>";
 	
    echo "<tr>";
    	echo "<td><strong>Ubicación</strong></td>";
    	echo "<td style='width:70%;text-align:right;'>{$product->location}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td><strong>Precio Compra (€)</strong></td>";
        echo "<td style='width:70%;text-align:right;'>{$product->purchasePrice}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td><strong>Precio Venta (€)</strong></td>";
        echo "<td style='width:70%;text-align:right;'>{$product->salePrice}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td><strong>Cantidad (Uds.)</strong></td>";
        echo "<td style='width:70%;text-align:right;'>{$product->quantity}</td>";
    echo "</tr>";

echo "</table>";

include_once "footer.php";		
?>
