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
			<h1 style="text-align: center;">Citas</h1>
			<hr><br>

		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th>Id Doctor</th>
					<th>Id Paciente</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Edad</th>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Consultorio</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include '../conectarse.php';
				$conn = conectarse();
				$sql = "select citas2.idDoctor, citas2.idPaciente, pacientes.nombre, pacientes.apellidoPaterno, pacientes.apellidoMaterno, pacientes.edad, citas2.fecha, citas2.hora, citas2.consultorio from citas2 inner join pacientes on 
				citas2.idPaciente = pacientes.idPaciente where idDoctor = '" . $_SESSION['idDoctor'] . "'";
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
						echo "<td>" . $row[6] . "</td>";
						echo "<td>" . $row[7] . "</td>";
						echo "<td>" . $row[8] . "</td>";
						echo "</tr>";
					}
				} else {
					echo "0 Resultados";
				}
				?>
			</tbody>
		</table>
	</div>
</body>
<script src="../js/bootstrap.bundle.min.js"></script>

</html>

<?php


?>