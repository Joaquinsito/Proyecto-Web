<?php
session_start();
$valid_session = isset($_SESSION['id']) ? $_SESSION['id'] === session_id() : FALSE;
if (!$valid_session) {
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
    <title>Document</title>
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
            <li><a href="paciente.php">Home</a></li>
            <li><a href="actualizar.php">Actualizar Datos</a></li>
            <li><a href="generarCitas.php">Generar cita</a></li>
            <li><a href="citasDisponibles.php">Ver Citas</a></li>
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
        <img src="../img/modificar.png" class="bd-placeholder-img rounded-circle" width="180" height="180" >
            <br><br>
            <h4>Actualizar datos</h4>
            <br>  
            <p><a class="btn btn-secondary" href="actualizar.php">Ir a &raquo;</a></p>
        </div>
        <div id="d1" class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="180" height="180" src="../img/cita.png">
            <br> <br>
            <h4>Nueva cita</h4>
            <br>
            <p><a class="btn btn-secondary" href="generarCitas.php">Ir a &raquo;</a></p>
        </div>
        <div id="d1" class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" width="180" height="180" src="../img/cita2.png">
            <br><br>
            <h4>Citas programadas</h4>
            <br> 
            <p><a class="btn btn-secondary" href="citasDisponibles.php">Ir a &raquo;</a></p>
        </div>
        <div id="d1" class="col-lg-3">
    </div><!-- /.row -->
</body>
<script src="../js/bootstrap.bundle.min.js"></script>

</html>