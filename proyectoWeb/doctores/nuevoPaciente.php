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
    <link href="../css/formulario.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
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

    <form action="insertPaciente.php" method="POST">
        <h1>Registrar paciente</h1>
        <hr>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-5 col-form-label">Nombre</label>
            <div class="col-sm-6">
                <input type="text" name="nombre" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-5 col-form-label">Apellido Paterno</label>
            <div class="col-sm-6">
                <input type="text" name="ap" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-5 col-form-label">Apellido Materno</label>
            <div class="col-sm-6">
                <input type="text" name="am" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-5 col-form-label">Edad</label>
            <div class="col-sm-6">
                <input type="number" name="edad" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-5 col-form-label">Correo</label>
            <div class="col-sm-6">
                <input type="mail" name="mail" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-5 col-form-label">Contraseña</label>
            <div class="col-sm-6">
                <input type="password" name="password" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row" style="text-align: center;">
            <div class="col-sm-12">
                <input type="submit" value="Registrar" class="btn btn-primary">
            </div>
        </div>
    </form>
</body>
<script src="../js/bootstrap.bundle.min.js"></script>
</html>