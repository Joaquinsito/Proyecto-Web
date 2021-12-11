<?php
session_start();
$valid_session = isset($_SESSION['id']) ? $_SESSION['id'] === session_id() : FALSE;
if(!$valid_session){
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
    <title>Farmacia</title>
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
    <h1>Ventas realizadas</h1>
	<hr><br>

    <table class="table">
		<thead class="thead-dark">
			<tr>
				<th>Id Producto</th>
                <th>Nombre Producto</th>
				<th>Id Vendedor</th>
				<th>Fecha</th>
				<th>Cantidad</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include '../conectarse.php';
				$conn=conectarse();
				$sql = "select ventas.idProducto, productos.nombreProducto, ventas.IdVendedor, ventas.fecha, ventas.cantidad, ventas.total from ventas 
                inner join productos where ventas.idProducto = productos.idProducto;";
				$result=$conn->query($sql);
				if ($result !== false && $result->num_rows > 0) {
					while($row = $result->fetch_array()) {
						echo "<tr>";
						echo "<td>".$row[0]."</td>";
						echo "<td>".$row[1]."</td>";
						echo "<td>".$row[2]."</td>";
						echo "<td>".$row[3]."</td>";
						echo "<td>".$row[4]."</td>";
                        echo "<td>".$row[5]."</td>";
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