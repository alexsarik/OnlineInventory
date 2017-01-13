<?php
//will crash if not set to true and has errors 
ini_set('display_errors',1);
// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
// set number of records per page
$records_per_page = 3;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
//include db and customer
include_once "config/database2.php";
include_once "objects/customer.php";
//preapre the obhects
$customer = new Customer();
 
//query customers
$results = $customer->readAll($from_record_num, $records_per_page);
$num = count($results);
//Header
$page_title = "Ver Clientes";
include_once "header.php";

//button add client
echo "<div class='right-button-margin'>";
	echo "<a href='create_customer.php' class='btn btn-success pull-right'> Añadir Cliente</a>";
echo "</div>";

// display the products if there are any
if($num > 0){
    echo "<div style='overflow:hidden;overflow-x:scroll;'>";
    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>Descripción</th>";
            echo "<th>Num. Contacto</th>";
            echo "<th>Email</th>";
            echo "<th>Ciudad</th>";
            echo "<th>Dirección</th>";
            echo "<th>Acciones</th>";
        echo "</tr>";
        
        foreach ($results as $key => $row) {
            # code...
            
            echo "<tr>";
                echo "<td style='white-space:nowrap;'>".$row['name']."</td>";
                echo "<td style='width:230px;'>".$row['description']."</td>";
                echo "<td style='white-space:nowrap;'>".$row['contact_num']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['city']."</td>";
                echo "<td style='white-space:nowrap;'>".$row['address']."</td>";
                
                echo "<td style='white-space:nowrap;'>";
                    // read one, edit and delete button will be here
                    // read product button
                    echo "<a href='read_one_customer.php?id=".$row['id']."' class='btn btn-primary left-margin'>";
                        echo "<span class='glyphicon glyphicon-list'></span> Detalles";
                    echo "</a>";
 
                    // edit product button
                    echo "<a href='update_customer.php?id=".$row['id']."' class='btn btn-info left-margin'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Modificar";
                    echo "</a>";
 
                    // delete product button
                    echo "<a delete-id='".$row['id']."' class='btn btn-danger delete-object2'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Borrar";
                    echo "</a>";
                echo "</td>";
 
            echo "</tr>";
        }
       
    echo "</table>";
    echo "</div>";

    // the page where this paging is used
    $page_url = "list_customers.php?";
     
    // count all products in the database to calculate total pages
    $total_rows = $customer->countAll();
     
    // paging buttons here
    include_once 'paging.php';
    
    // paging buttons will be here
}

include_once "footer.php";
?>