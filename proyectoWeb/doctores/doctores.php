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
            <li><a href="doctores.php">Home</a></li>
            <li><a href="nuevoPaciente.php">Alta Paciente</a></li>
            <li><a href="verPacientes.php">Ver Pacientes</a></li>
            <li><a href="nuevaCitaDoc.php">Alta Citas</a></li>
            <li><a href="vercitas.php">Ver Citas</a></li>
            <li><a href="verHistorialPaciente.php">Historial Pacientes</a></li>
            <li><a href="consultasp.php">Nueva consulta</a></li>
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
                        <p>Elige la opci??n que desees realizar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div id="d1" class="col-lg-4">
            <img src="../img/paciente.png" class="bd-placeholder-img rounded-circle" width="160" height="160">
            <br><br>
            <h4>Registrar Paciente</h4>
            <br>
            <p><a class="btn btn-secondary" href="nuevoPaciente.php">Ir a &raquo;</a></p>
        </div>
        <div id="d1" class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="160" height="160" src="../img/buscar.png">
            <br> <br>
            <h4>Ver Pacientes</h4>
            <br>
            <p><a class="btn btn-secondary" href="verPacientes.php">Ir a &raquo;</a></p>
        </div>
        <div id="d1" class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="160" height="160" src="../img/historial.png">
            <br><br>
            <h4>Historial clinico</h4>
            <br>
            <p><a class="btn btn-secondary" href="verHistorialPaciente.php">Ir a &raquo;</a></p>
        </div>
    </div><!-- /.row -->
    <hr>
    <divn class="row">
    <div id="d1" class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="160" height="160" src="../img/cita.png">
            <br> <br>
            <h4>Nueva cita</h4>
            <br>
            <p><a class="btn btn-secondary" href="nuevaCitaDoc.php">Ir a &raquo;</a></p>
        </div>
        <div id="d1" class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="160" height="160" src="../img/cita2.png">
            <br> <br>
            <h4>Ver citas</h4>
            <br>
            <p><a class="btn btn-secondary" href="vercitas.php">Ir a &raquo;</a></p>
        </div>
        <div id="d1" class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="160" height="160" src="../img/consulta.png">
            <br> <br>
            <h4>Nueva consulta</h4>
            <br>
            <p><a class="btn btn-secondary" href="consultasp.php">Ir a &raquo;</a></p>
        </div>
    </div>
</body>

<script src="../js/bootstrap.bundle.min.js"></script>

</html>