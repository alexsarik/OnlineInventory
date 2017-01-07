<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $page_title; ?></title>

    <!-- some custom CSS -->
    <style>
        body{
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .left-margin{
            margin:0 .5em 0 0;
        }

        .right-button-margin{
            margin: 0 0 1em 0;
            overflow: hidden;
        }

        /* some changes in bootstrap modal */
        .modal-body {
            padding: 20px 20px 0px 20px !important;
            text-align: center !important;
        }

        .modal-footer{
            text-align: center !important;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
</head>
<body>
    <!-- container -->
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-togle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toogle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Multivendor</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Inventario<span class="sr-only">(current)</span></a>
                        </li>
                        <li><a href="#">Clientes</a>
                        </li>
                        <li>
                            <a href="#">Proveedores</a>
                        </li>
                        <li><a href="#">Ventas</a>
                        </li>
                    </ul>
                    <ul class="navbar-right nav navbar-nav">
                        <li><a href="#">Salir</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php

        // show page header
        echo "<div class='page-header'>";
        echo "<h1>{$page_title}</h1>";
        echo "</div>";
        ?>