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

    <!-- jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 

</head>
<body>

    <!-- container -->
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toogle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Multi Vendor</a>
                </div>
                
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                    <!-- TENGO QUE VER COMO HACER PARA QUE LA CLASS ACTIVE DEPENDA DE LA PAGINA EN LA QUE ESTOY -->
                        <li><a href="index.php">Inventario<span class="sr-only">(current)</span></a>
                        </li>
                        <li><a href="list_customers.php">Clientes</a>
                        </li>
                        <li>
                            <a href="#">Proveedores</a>
                        </li>
                        <li><a href="#">Ventas</a>
                        </li>
                        <li role="separator" class="divider"></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><a href="#"> <?php echo isset($username) ? $username : 'Usuario'; ?><span style="margin-left: 5px;" class="caret"></span></a></li>
                        <ul class="dropdown-menu">
                            <li><a href="#">Perfil</a></li>
                            <li><a href="#">Salir</a></li>
                        </ul>
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