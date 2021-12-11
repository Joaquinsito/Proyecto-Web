<?php
session_start();
$valid_session = isset($_SESSION['id']) ? $_SESSION['id'] === session_id() : FALSE;
if(!$valid_session){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia</title>
    <link href="../css/menu.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
        }

        #d1 {
            text-align: center;

        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }

        }
    </style>
</head>
<body>
<nav id="menu">
        <ul>
            <li><a href="farmacia.php">Home</a></li>
            <li><a href="insertarProductp.php">Insertar productos</a></li>
            <li><a href="eliminarproducto.php">Eliminar productos</a></li>
            <li><a href="consultarproducto.php">Consultar productos</a></li>
            <li><a href="venta.php">Vender</a></li>
            <li><a href="ventasrealizadas.php">Ventas</a></li>
            <li><a href="../exit.php">Salir</a></li>
        </ul>
    </nav>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../img/fondo2.jpg" class="d-block h-100 w-100 bd-placeholder-img" alt="...">
                <div class="container">
                    <div class="carousel-caption text-start">
                        <?php
                        $nombre = $_SESSION['nombre'];
                        echo "<h1 style='text-align: center'>Bienvenido $nombre </h1>";
                        ?>
                        <hr style="border-color: white;">
                        <p>Elige la opción que desees realizar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div id="d1" class="col-lg-4">
            <img src="../img/producto.png" class="bd-placeholder-img rounded-circle" width="160" height="160">
            <br><br>
            <h4>Registrar Producto</h4>
            <br>
            <p><a class="btn btn-secondary" href="insertarProductp.php">Ir a &raquo;</a></p>
        </div>
        <div id="d1" class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="160" height="160" src="../img/producto2.png">
            <br> <br>
            <h4>Modificar Producto</h4>
            <br>
            <p><a class="btn btn-secondary" href="consultarproducto.php">Ir a &raquo;</a></p>
        </div>
        <div id="d1" class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="160" height="160" src="../img/producto3.png">
            <br><br>
            <h4>Eliminar Producto</h4>
            <br>
            <p><a class="btn btn-secondary" href="eliminarproducto.php">Ir a &raquo;</a></p>
        </div>
    </div><!-- /.row -->
    <hr>
    <divn class="row">
    <div id="d1" class="col-lg-6">
            <img class="bd-placeholder-img rounded-circle" width="160" height="160" src="../img/venta.png">
            <br> <br>
            <h4>Realizar venta</h4>
            <br>
            <p><a class="btn btn-secondary" href="venta.php">Ir a &raquo;</a></p>
        </div>
        <div id="d1" class="col-lg-6">
            <img class="bd-placeholder-img rounded-circle" width="160" height="160" src="../img/ventas.png">
            <br> <br>
            <h4>Ventas realizadas</h4>
            <br>
            <p><a class="btn btn-secondary" href="ventasrealizadas.php">Ir a &raquo;</a></p>
        </div>
    </div>
</body>
</html>