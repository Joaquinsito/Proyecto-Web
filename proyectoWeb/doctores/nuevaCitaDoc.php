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

    <form action="insertCita.php" method="POST">
        <h1>Nueva Cita</h1>
        <hr><br>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Id Paciente</label>
            <div class="col-sm-6">
                <input type="number" name="idPaciente" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Fecha</label>
            <div class="col-sm-6">
                <input type="date" name='fecha' class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Hora</label>
            <div class="col-sm-6">
            <select name="hora" id="" class="col-sm-7 form-control" required>
                    <option value="12:00:00">12:00</option>
                    <option value="01:00:00">01:00</option>
                    <option value="02:00:00">02:00</option>
                    <option value="03:00:00">03:00</option>
                    <option value="04:00:00">04:00</option>
                    <option value="05:00:00">05:00</option>
                    <option value="06:00:00">06:00</option>
                    <option value="07:00:00">07:00</option>
                    <option value="08:00:00">08:00</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Consultorio</label>
            <div class="col-sm-6">
                <input type="number" name='consultorio' class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <br>
        <div class="form-group row" style="text-align: center;">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Generar</button>
            </div>
        </div>
    </form>
</body>
<script src="../js/bootstrap.bundle.min.js"></script>

</html>