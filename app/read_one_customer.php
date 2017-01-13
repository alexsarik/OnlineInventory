<?php
ini_set('display_errors', 1);

$id = isset($_GET['id']) ? $_GET['id'] : die('Error: ID no existe');

include_once "config/database2.php";
include_once "objects/customer.php";

$customer = new Customer;

$customer->id = $id;

$customer->readOne();

$page_title = "Cliente";
include_once "header.php";
// boton ver customeros
echo "<div class='right-button-margin'>";
 

    echo "<a href='update_customer.php?id=".$id."' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-edit'></span> Modificar Cliente";
    echo "</a>";

    echo "<a href='list_customers.php' class='btn btn-primary pull-right'>";
        echo "<span class='glyphicon glyphicon-list'></span> Ver Clientes";
    echo "</a>";


echo "</div>";

// HTML table for displaying a customer details
echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
        echo "<td><strong>Nombre</strong></td>";
        echo "<td style='width:70%;text-align:right;'>{$customer->name}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td><strong>Descripción</strong></td>";
        echo "<td style='width:70%;text-align:right;'>{$customer->description}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td><strong>Num. Contacto</strong></td>";
        echo "<td style='width:70%;text-align:right;'>{$customer->contactNum}</td>";
    echo "</tr>";
 	
    echo "<tr>";
    	echo "<td><strong>Email</strong></td>";
    	echo "<td style='width:70%;text-align:right;'>{$customer->email}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td><strong>Dirección</strong></td>";
        echo "<td style='width:70%;text-align:right;'>{$customer->address}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td><strong>Ciudad</strong></td>";
        echo "<td style='width:70%;text-align:right;'>{$customer->city}</td>";
    echo "</tr>";
 

echo "</table>";

include_once "footer.php";		
?>
