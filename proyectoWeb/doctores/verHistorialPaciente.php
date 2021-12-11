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
    <link href="../css/home.css" rel="stylesheet" type="text/css">
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
    <div id="cuerpo">
        <h1 style="text-align: center;">Historial Clinico</h1>
        <hr>
        <form action="verHistorialPaciente.php" method="POST">
            <div class="form-group row justify-content-center">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Id Paciente</label>
                <div class="col-sm-3">
                    <input type="number" name="idPaciente" class="form-control" id="colFormLabel">
                </div class="col-sm-3">
                <div>  <input type="submit" name="btn" class="btn btn-primary"> </div>
               
            </div>
        </form>
        <br>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Id Paciente</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th>Id Doctor</th>
                    <th>Especialidad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['btn'])) {
                    $idPaciente = $_POST['idPaciente'];
                    include '../conectarse.php';
                    $conn = conectarse();
                    $sql = "select historialclinico.idPaciente, pacientes.nombre, pacientes.apellidoPaterno, pacientes.edad, historialclinico.fecha, historialclinico.descripcion, historialclinico.idDoctor, doctores.especialidad FROM historialclinico 
                inner join pacientes on historialclinico.idPaciente = pacientes.idPaciente 
                inner join doctores on historialclinico.idDoctor = doctores.idDoctor where historialclinico.idPaciente = '" . $idPaciente . "'";
                    $result = $conn->query($sql);
                    if ($result !== false && $result->num_rows > 0) {
                        while ($row = $result->fetch_array()) {
                            echo "<tr>";
                            echo "<td>" . $row[0] . "</td>";
                            echo "<td>" . $row[1] . "</td>";
                            echo "<td>" . $row[2] . "</td>";
                            echo "<td>" . $row[3] . "</td>";
                            echo "<td>" . $row[4] . "</td>";
                            echo "<td>" . $row[5] . "</td>";
                            echo "<td>" . $row[6] . "</td>";
                            echo "<td>" . $row[7] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 Resultados";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script src="../js/bootstrap.bundle.min.js"></script>

</html>