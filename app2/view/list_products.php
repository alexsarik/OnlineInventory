<?php
/**
 * Created by PhpStorm.
 * User: markc
 * Date: 12/01/2017
 * Time: 22:43
 */

#$page = isset($_GET['page']) ? $_GET['page'] : 1;
// set number of records per page
#$records_per_page = 3;
// calculate for the query LIMIT clause
#$from_record_num = ($records_per_page * $page) - $records_per_page;
?>

<section>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Inventario</a></li>
        <li class="breadcrumb-item active">Ver Productos</li>
    </ol>

    <div class='right-button-margin'>
        <a href='index.php?c=product&a=create' class='btn btn-success pull-right'>Añadir Producto</a>
    </div>

    <h2>Lista de Productos</h2>
    <p>Mostrando <?php echo Product::countAll(); ?> producto(s).</p>
    <div class="table-default" style="overflow-x: scroll">
        <table class="table table-hover table-responsive table-bordered">
            <thead>
            <th>Serial</th>
            <th>Descripción</th>
            <th>Modelo</th>
            <th>Ubicación</th>
            <th>Precio Compra (€)</th>
            <th>Precio Venta (€)</th>
            <th>Cantidad (Uds.)</th>
            <th>Acciones</th>
            </thead>
            <tbody>
            <?php
            if (!empty($products)) {
                foreach ($products as $item) {
                    $product = new Product();
                    foreach ($item as $property => $value) {
                        $product->$property = $value;
                    }
                    $row = "<tr id='" . $product->id . "'>";
                    $row .= "<td>" . $product->serial . "</td>";
                    $row .= "<td>" . $product->description . "</td>";
                    $row .= "<td>" . $product->model . "</td>";
                    $row .= "<td>" . $product->location . "</td>";
                    $row .= "<td>" . $product->purchase_price . "</td>";
                    $row .= "<td>" . $product->sale_price . "</td>";
                    $row .= "<td>" . $product->quantity . "</td>";
                    $row .= "<td style='white-space:nowrap'>";
                    $row .= "<a href='index.php?c=product&a=details&id=" . $product->id . "' class='btn btn-primary left-margin'><span class='glyphicon glyphicon-list'></span> Detalles</a>";
                    $row .= "<a href='index.php?c=product&a=update&id=" . $product->id . "' class='btn btn-info left-margin'><span class='glyphicon glyphicon-list'></span> Modificar</a>";
                    $row .= "<a href='index.php?c=product&a=delete&id=" . $product->id . "' class='btn btn-danger delete-object' delete-id='" . $product->id . "'>
                                 <span class='glyphicon glyphicon-list'></span> Eliminar</a>";
                    $row .= "</td>";
                    $row .= "</tr>";

                    echo $row;
                }
            } else {
                #Mostrar error si no hay productos
            }
            ?>

            </tbody>
        </table>
    </div>
</section>