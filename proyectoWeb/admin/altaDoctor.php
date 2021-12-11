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
    <form action="altaDoctor.php" method="POST">
        <h1>Agregar nuevo doctor</h1>
        <hr>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Nombre</label>
            <div class="col-sm-6">
                <input type="text" name="nombre" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Apellido Paterno</label>
            <div class="col-sm-6">
                <input type="text" name="ap" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Apellido Materno</label>
            <div class="col-sm-6">
                <input type="text" name="am" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Especialidad</label>
            <select name="especialidad" class="col-sm-6 form-control" id="" required>
                <option value="Nutriologo">Nutriologo</option>
                <option value="Cardiologo">Cardiologo</option>
                <option value="Cirujano">Cirujano</option>
                <option value="Pediatra">Pediatra</option>
                <option value="Medico General">Medico General</option>
                <option value="Estomatologo">Estomatologo</option>
                <option value="Urologo"> Urologo</option>
                <option value="Psiquiatra">Psiquiatra</option>
                <option value="Oncologo">Oncologo</option>
            </select><br>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Edad</label>
            <div class="col-sm-6">
                <input type="number" name="edad" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Correo electrónico</label>
            <div class="col-sm-6">
                <input type="mail" name="mail" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Contraseña</label>
            <div class="col-sm-6">
                <input type="password" name="pass" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row" style="text-align: center;">
            <div class="col-sm-12">
                <input type="submit" value="Registrar" name="btn" class="btn btn-primary">
            </div>
        </div>
    </form>
</body>

</html>

<?php
if (isset($_POST['btn'])) {

    include "../conectarse.php";
    $conn = conectarse();

    $nombre = $_POST['nombre'];
    $ap = $_POST['ap'];
    $am = $_POST['am'];
    $especialidad = $_POST['especialidad'];
    $edad = $_POST['edad'];
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    $sql = "insert into doctores (nombre, apellidoPaterno, apellidoMaterno, especialidad, edad, correo, passwordDoc) values
        ('" . $nombre . "', '" . $ap . "', '" . $am . "', '" . $especialidad . "', '" . $edad . "', '" . $mail . "', '" . $pass . "');";

    if ($conn->query($sql)) {
        echo "<script>alert('Doctor agregado')</script>";
        echo "<script>window.location.href='consultarDoc.php'</script>";
    } else {
        echo "<script>alert('Error al agregar')</script>";
        echo "<script>window.location.href='altaDoctor.php'</script>";
    }
}

?>