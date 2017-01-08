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

$page_title = "Añadir Cliente";
include_once "header.php";
?>

<?php
include_once "footer.php";
?>