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
    <title>Actualizar Datos</title>
    <link href="../css/menu.css" rel="stylesheet" type="text/css">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
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
    <div id="cuerpo">
        <form action="actualizar.php" method="POST">
            <h1>Actualizar datos</h1>
            <hr>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Id Paciente</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Edad</th>
                        <th>Mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../conectarse.php';
                    $conn = conectarse();
                    $sql = "select * from pacientes where idPaciente = '" . $_SESSION['idPaciente'] . "'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_array()) {
                            echo "<tr>";
                            echo "<td>" . $row[0] . "</td>";
                            echo "<td>" . $row[1] . "</td>";
                            echo "<td>" . $row[2] . "</td>";
                            echo "<td>" . $row[3] . "</td>";
                            echo "<td>" . $row[4] . "</td>";
                            echo "<td>" . $row[5] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 Resultados";
                    }
                    ?>
                </tbody>
            </table>
            <br><br>
            <div class="row">
                <div class="col" style="border-right: 1px solid #333;">
                    <h2>Actualizar mail</h2>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-4 col-form-label">Nuevo correo</label>
                        <div class="col-sm-7">
                            <input type="mail" name="nuevomail" class="form-control" id="colFormLabel" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h2>Actualizar Contraseña</h2>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-4 col-form-label">Nueva contraseña</label>
                        <div class="col-sm-7">
                            <input type="password" name="nuevapass" class="form-control" id="colFormLabel" required>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row" style="text-align: center;">
                <input type="submit" style="margin: auto; display:block;" name="btn" value="  Actualizar  " class="btn btn-primary">
            </div>
        </form>
    </div>

</body>
<script src="../js/bootstrap.bundle.min.js"></script>
</html>


<?php
if (isset($_POST['btn'])) {
    $mail = $_POST['nuevomail'];
    $pass = $_POST['nuevapass'];


    $sql = "update pacientes set correo = '" . $mail . "', password = '" . $pass . "' where idPaciente = '" . $_SESSION['idPaciente'] . "'";
    if ($conn->query($sql)) {
        echo "<script>alert('Sus datos han sido actualizados')</script>";;
        echo "<script>window.location.href='actualizar.php'</script>";
    } else {
        echo "<script>alert('Error al crear')</script>";
        echo "<script>window.location.href='actualizar.php'</script>";
    }
}

?>