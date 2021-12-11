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
            <li><a href="paciente.php">Home</a></li>
            <li><a href="actualizar.php">Actualizar Datos</a></li>
            <li><a href="generarCitas.php">Generar cita</a></li>
            <li><a href="citasDisponibles.php">Ver Citas</a></li>
            <li><a href="../exit.php">Salir</a></li>
        </ul>
    </nav>
    <form action="generarCitas.php" method="POST">
        <h1>Agendar nueva cita</h1>
        <hr><br>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-3 col-form-label">Doctor</label>
            <select name="idDoctor" class="col-sm-7 form-control" id="" required>
                <option>
                    <?php
                    include '../conectarse.php';
                    $conn = conectarse();
                    $sql = "select idDoctor, nombre, especialidad from doctores;";

                    $result = $conn->query($sql);
                    if ($result !== false && $result->num_rows > 0) {
                        while ($row = $result->fetch_array()) {
                            echo "<option value='" . $row['idDoctor'] . "'>'" . $row['idDoctor'] . "," . $row['nombre'] . "," . $row['especialidad'] . "";
                            echo "</option>";
                        }
                    }

                    ?>
                </option>
            </select>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-3 col-form-label">Fecha</label>
            <div class="col-sm-7">
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
        <br><br>
        <div class="form-group row" style="text-align: center;">
            <div class="col-sm-12">
                <button type="submit" name="btn" class="btn btn-primary">Generar</button>
            </div>
        </div>
    </form>
</body>
<script src="../js/bootstrap.bundle.min.js"></script>

</html>


<?php
if (isset($_POST['btn'])) {
    $idDoctor = $_POST['idDoctor'];
    $date = $_POST['fecha'];
    $idPaciente = $_SESSION['idPaciente'];
    $consultorio = rand(1, 10);
    $hora = $_POST['hora'];

    $sql = "insert into citas2 (idDoctor, idPaciente, fecha, hora ,consultorio) values
    ('$idDoctor', '$idPaciente', '$date', '$hora' ,'$consultorio');";

    if ($conn->query($sql)) {
        echo "<script>alert('Cita creada')</script>";
        echo "<script>window.location.href='citasDisponibles.php'</script>";
    } else {
        echo "<script>alert('Error al crear')</script>";
        echo "<script>window.location.href='citasDisponibles.php'</script>";
    }
}

?>