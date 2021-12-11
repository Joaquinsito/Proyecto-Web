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
	<title>Consultar</title>
	<link href="../css/menu.css" rel="stylesheet" type="text/css">
	<link href="../css/home.css" rel="stylesheet" type="text/css">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<nav id="menu">
		<ul>
			<li><a href="farmacia.php">Home</a></li>
			<li><a href="insertarProductp.php">Insertar productos</a></li>
			<li><a href="eliminarproducto.php">Eliminar productos</a></li>
			<li><a href="consultarproducto.php">Consultar productos</a></li>
			<li><a href="venta.php">Vender</a></li>
			<li><a href="ventasrealizadas.php">Ventas</a></li>
			<li><a href="../exit.php">Salir</a></li>
		</ul>
	</nav>
	<div id="cuerpo">
		<h1>Productos</h1>
		<hr>
		<div class="row">
			<div class="col-sm-7" style="border-right: 1px solid #AEAEAE;">
				<h2>Productos disponibles</h2>
				<br>
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th>Id Producto</th>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Precio</th>
							<th>Stock</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include '../conectarse.php';
						$conn = conectarse();
						$sql = "select * from productos;";
						$result = $conn->query($sql);
						if ($result !== false && $result->num_rows > 0) {
							while ($row = $result->fetch_array()) {
								echo "<tr>";
								echo "<td>" . $row[0] . "</td>";
								echo "<td>" . $row[1] . "</td>";
								echo "<td>" . $row[2] . "</td>";
								echo "<td>" . $row[3] . "</td>";
								echo "<td>" . $row[4] . "</td>";
								echo "</tr>";
							}
						} else {
							echo "0 Resultados";
						}
						?>
					</tbody>
				</table>
			</div>
			<div class="col-sm-5">
				<h2>Modificar producto</h2>
				<br>
				<form action="updateProducto.php" method="POST">
					<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">Id Producto</label>
						<div class="col-sm-7">
							<input type="number" name="idProducto" class="form-control" id="colFormLabel" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">Nombre</label>
						<div class="col-sm-7">
							<input type="text" name="nombreProducto" class="form-control" id="colFormLabel" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">Descripción</label>
						<div class="col-sm-7">
							<input type="text" name="descripcion" class="form-control" id="colFormLabel" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">Precio</label>
						<div class="col-sm-7">
							<input type="number" name="precio" class="form-control" id="colFormLabel" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="colFormLabel" class="col-sm-4 col-form-label">Stock</label>
						<div class="col-sm-7">
							<input type="number" name="stock" class="form-control" id="colFormLabel" required>
						</div>
					</div>
					<br>
					<div class="form-group row" style="text-align: center;">
						<div class="col-sm-12">
							<input type="submit" value="Actualizar" class="btn btn-primary">
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</body>

</html>