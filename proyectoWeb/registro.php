<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="css/menu.css" rel="stylesheet" type="text/css">
    <link href="css/formulario.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body background="gray">
    <nav id="menu">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="registro.php">Registrarse</a></li>
            <li><a href="login.php">Log in</a></li>
        </ul>
    </nav>

    <form action="registro.php" method="POST">
        <h1>Registrarse</h1>
        <hr> <br>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Nombre</label>
            <div class="col-sm-6">
                <input type="text" name="nombre" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Apellido Paterno</label>
            <div class="col-sm-6">
                <input type="text" name="ap" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Apellido Materno</label>
            <div class="col-sm-6">
                <input type="text" name="am" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Edad</label>
            <div class="col-sm-6">
                <input type="number" name="edad" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Correo</label>
            <div class="col-sm-6">
                <input type="mail" name="mail" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Contraseña</label>
            <div class="col-sm-6">
                <input type="password" name="password" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="form-group row" style="text-align: center;">
            <div class="col-sm-12">
                <input type="submit" value="Registrar" name="btn" class="btn btn-primary">
            </div>
        </div>
    </form>
</body>
<script src="js/bootstrap.bundle.min.js"></script>
</html>

<?php
if (isset($_POST['btn'])) {
    $nombre = $_POST['nombre'];
    $aPaterno = $_POST['ap'];
    $aMaterno = $_POST['am'];
    $edad = $_POST['edad'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];


    include 'conectarse.php';
    $conectarse = conectarse();
    $sql = "insert into pacientes (nombre, apellidoPaterno, apellidoMaterno, edad, correo, password) values 
        ('$nombre', '$aPaterno', '$aMaterno', '$edad', '$mail', '$password');";

    if ($conectarse->query($sql)) {
        $sql = "select idPaciente from pacientes where nombre = '" . $nombre . "' and apellidoPaterno = '" . $aPaterno . "' and correo = '" . $mail . "';";
        $result = $conectarse->query($sql);
        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                echo "<script>alert('Tu id es: " . $row[0] . "')</script>";
            }
        }
        echo "<script>window.location.href='login.php'</script>";
    } else {
        echo "<script>alert('Error al Guardar')</script>";
        echo "<script>window.location.href='registro.php'</script>";
    }
}
?>