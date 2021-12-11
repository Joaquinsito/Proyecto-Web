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
    <form action="consultasp.php" method="POST">
        <h1>Consulta</h1>
        <hr>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-5 col-form-label">Id Paciente</label>
            <div class="col-sm-6">
                <input type="number" name="idPaciente" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripción</label>
            <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group row" style="text-align: center;">
            <div class="col-sm-12">
                <input type="submit" name="btn" value="Registrar" class="btn btn-primary">
            </div>
        </div>
    </form>
</body>
<script src="../js/bootstrap.bundle.min.js"></script>

</html>


<?php
if (isset($_POST['btn'])) {
    $date = date('Y-m-d H:i:s', time());
    $idPaciente = $_POST['idPaciente'];
    $idDoctor = $_SESSION['idDoctor'];
    $descripcion = $_POST['descripcion'];
    include '../conectarse.php';
    $conn = conectarse();
    $sql = "insert into historialclinico (idPaciente, fecha, descripcion, idDoctor) values
         ('$idPaciente', '$date', '$descripcion', '$idDoctor');";
    if ($conn->query($sql)) {
        echo "<script>alert('Consulta creada')</script>";
        echo "<script>window.location.href='verHistorialPaciente.php'</script>";
    } else {
        echo "<script>alert('Error al crear')</script>";
        echo "<script>window.location.href='consultasp.php'</script>";
    }
}

?>