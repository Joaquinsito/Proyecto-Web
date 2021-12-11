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
	<div id="cuerpo">
		<h1>Consulta doctor</h1>
		<hr>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th>Id Doctor</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Especialidad</th>
					<th>Edad</th>
					<th>Mail</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include '../conectarse.php';
				$conn = conectarse();
				$sql = "select * from doctores";
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

</html>