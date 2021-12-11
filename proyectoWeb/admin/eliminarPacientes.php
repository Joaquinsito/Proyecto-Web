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

    <form action="eliminarPacientes.php" method="POST">
        <h1>Eliminar Paciente </h1>
        <hr><br><br>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-3 col-form-label">Paciente</label>
            <select name="idPaciente" class="col-sm-7 form-control" id="" required>
                <option>
                    <?php
                    include '../conectarse.php';
                    $conn = conectarse();
                    $sql = "select idPaciente, nombre, apellidoPaterno from pacientes;";

                    $result = $conn->query($sql);
                    if ($result !== false && $result->num_rows > 0) {
                        while ($row = $result->fetch_array()) {
                            echo "<option value='" . $row['idPaciente'] . "'>'" . $row['idPaciente'] . "," . $row['nombre'] . "," . $row['apellidoPaterno'] . "";
                            echo "</option>";
                        }
                    }
                    ?>
                </option>
            </select>
        </div><br><br>
        <div class="form-group row" style="text-align: center;">
            <div class="col-sm-12">
                <input type="submit" value="Eliminar" name="btn" class="btn btn-primary">
            </div>
        </div>
    </form>
</body>

</html>

<?php
if (isset($_POST['btn'])) {

    $sql = "delete from pacientes where idPaciente = '" . $_POST['idPaciente'] . "';";

    $sql = "delete from doctores where idDoctor = '" . $_POST['idDoctor'] . "';";
    if ($conn->query($sql)) {
        echo "<script>alert('Paciente Eliminado')</script>";
        echo "<script>window.location.href='consultarDoc.php'</script>";
    } else {
        echo "<script>alert('Error al eliminar')</script>";
        echo "<script>window.location.href='eliminarDoc.php'</script>";
    }
}

?>