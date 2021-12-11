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
			<li><a href="paciente.php">Home</a></li>
			<li><a href="actualizar.php">Actualizar Datos</a></li>
			<li><a href="generarCitas.php">Generar cita</a></li>
			<li><a href="citasDisponibles.php">Ver Citas</a></li>
			<li><a href="../exit.php">Salir</a></li>
		</ul>
	</nav>
	<div id="cuerpo">
	<h1>Citas disponibles</h1>
	<hr>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th>Id Doctor</th>
				<th>Nombre</th>
				<th>Apellido Materno</th>
				<th>Especialidad</th>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Consultorio</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$idPaciente = $_SESSION['idPaciente'];
			include '../conectarse.php';
			$conn = conectarse();
			$sql = "select citas2.IdDoctor, doctores.nombre, doctores.apellidoPaterno, doctores.especialidad, citas2.fecha, citas2.hora, citas2.consultorio from citas2 
                inner join doctores on citas2.IdDoctor = doctores.idDoctor where citas2.idPaciente = '" . $idPaciente . "'";
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
					echo "</tr>";
				}
			} else {
				echo "No tienes ninguna cita programada";
			}
			?>
		</tbody>
	</table>
	</div>
</body>

</html>