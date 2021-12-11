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
    <nav>
        <ul>
            <li><a href="pagadmin.php">Home</a></li>
            <li><a href="altaDoctor.php">Registrar Doctor</a></li>
            <li><a href="consultarDoc.php">Consultar Doctor</a></li>
            <li><a href="eliminarDoc.php">Eliminar Doctor</a></li>
            <li><a href="eliminarPacientes.php">Eliminar Paciente</a></li>
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
        <div id="d1" class="col-lg-3">
        <img src="../img/doctor.png" class="bd-placeholder-img rounded-circle" width="140" height="140" >
            <br><br>
            <h4>Registrar Doctor</h4>
            <br>  
            <p><a class="btn btn-secondary" href="altaDoctor.php">Ir a &raquo;</a></p>
        </div>
        <div id="d1" class="col-lg-3">
            <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="../img/buscar.png">
            <br> <br>
            <h4>Consultar Doctor</h4>
            <br>
            <p><a class="btn btn-secondary" href="consultarDoc.php">Ir a &raquo;</a></p>
        </div>
        <div id="d1" class="col-lg-3">
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="../img/eliminar.png">
            <br><br>
            <h4>Eliminar Doctor</h4>
            <br> 
            <p><a class="btn btn-secondary" href="eliminarDoc.php">Ir a &raquo;</a></p>
        </div>
        <div id="d1" class="col-lg-3">
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="../img/eliminar2.png">
            <br> <br>
            <h4>Eliminar Paciente</h4>
            <br>
            <p><a class="btn btn-secondary" href="eliminarPacientes.php">Ir a &raquo;</a></p>
        </div>

    </div><!-- /.row -->

</body>
<script src="../js/bootstrap.bundle.min.js"></script>

</html>