<?php
//will crash if not set to true and has errors
ini_set('display_errors',1);
// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
// set number of records per page
$records_per_page = 3;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
// include database and object files
include_once 'config/database2.php';
include_once 'objects/product.php';

$product = new Product($db);
 
// query products
$db = new DB;
$results = $product->readAll($from_record_num, $records_per_page);

$num = count($results);

//Header
$page_title = "Inventario";
include_once "header.php";
//button add product
echo "<div class='right-button-margin'>";
    echo "<a href='create_product.php' class='btn btn-success pull-right'>Añadir Producto</a>";
echo "</div>";

// display the products if there are any
if($num>0){
    echo "<div style='overflow:hidden;overflow-x:scroll;'>";
    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>Serial</th>";
            echo "<th>Descripción</th>";
            echo "<th>Modelo</th>";
            echo "<th>Ubicación</th>";
            echo "<th>Precio Compra (€)</th>";
            echo "<th>Precio Venta (€)</th>";
            echo "<th>Cantidad (Uds.)</th>";
            echo "<th>Acciones</th>";
        echo "</tr>";
        
        foreach ($results as $key => $row) {
            # code...
            
            echo "<tr>";
                echo "<td style='white-space:nowrap;'>".$row['serial']."</td>";
                echo "<td style='width:230px;'>".$row['description']."</td>";
                echo "<td style='white-space:nowrap;'>".$row['model']."</td>";
                echo "<td>".$row['location']."</td>";
                echo "<td>".$row['purchase_price']."</td>";
                echo "<td style='white-space:nowrap;'>".$row['sale_price']."</td>";
                echo "<td style='text-align:right;'>".$row['quantity']."</td>";
                echo "<td style='white-space:nowrap;'>";
                    // read one, edit and delete button will be here
                    // read product button
                    echo "<a href='read_one.php?id=".$row['id']."' class='btn btn-primary left-margin'>";
                        echo "<span class='glyphicon glyphicon-list'></span> Detalles";
                    echo "</a>";
 
                    // edit product button
                    echo "<a href='update_product.php?id=".$row['id']."' class='btn btn-info left-margin'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Modificar";
                    echo "</a>";
 
                    // delete product button
                    echo "<a delete-id='".$row['id']."' class='btn btn-danger delete-object'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Borrar";
                    echo "</a>";
                echo "</td>";
 
            echo "</tr>";
        }

       
 
    echo "</table>";
    echo "</div>";
    // the page where this paging is used
    $page_url = "index.php?";
     
    // count all products in the database to calculate total pages
    $total_rows = $product->countAll();
     
    // paging buttons here
    include_once 'paging.php';

    
    // paging buttons will be here
}
 
// tell the user there are no products
else{
    echo "<div class='alert alert-info'>No products found.</div>";
}
?>



<?php

//Footer
include_once "footer.php";
?>