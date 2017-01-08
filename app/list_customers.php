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
$db = new DB;
//query customers
$results = $customer->readAll($from_record_num, $records_per_page);
$num = count($results);
//Header
$page_title = "Ver Clientes";
include_once "header.php";
//button add client
echo "<div class='left-button-margin'>";
	echo "<a href='create_customer.php' class='btn btn-success pull-right'> Añadir Cliente</a>";
echo "</div>";







?>

<?php
include_once "footer.php";
?>