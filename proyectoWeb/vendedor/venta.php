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
    <title>Farmacia</title>
    <link href="../css/menu.css" rel="stylesheet" type="text/css">
    <link href="../css/formulario.css" rel="stylesheet" type="text/css">
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

    <form action="venta.php" method="POST">
        <h1>Ventas</h1>
        <hr><br>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-3 col-form-label">Producto</label>
            <select name="idProducto" class="col-sm-7 form-control" required>
                <option>
                    <?php
                    include '../conectarse.php';
                    $conn = conectarse();
                    $sql = "select * from productos;";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_array()) {
                            echo "<option value='" . $row['idProducto'] . "'>" . $row['idProducto'] . "," . $row['nombreProducto'] . "";
                            echo "</option>";
                        }
                    }
                    ?>
                </option>
            </select><br>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-3 col-form-label">Cantidad</label>
            <div class="col-sm-7">
                <input type="number" name="cantidad" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <br><br>
        <div class="form-group row" style="text-align: center;">
            <div class="col-sm-12">
                <input type="submit" value="Vender" name="btn" class="btn btn-primary" required>
            </div>
        </div>
    </form>
</body>

</html>

<?php
if (isset($_POST['btn'])) {
    $cantidad = $_POST['cantidad'];
    $date = date('Y-m-d H:i:s', time());
    $vendedor = $_SESSION['idVendedor'];
    $idProducto = $_POST['idProducto'];
    $sql = "select precio,stock from productos where idProducto = '" . $_POST['idProducto'] . "';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            $precio = $row['precio'];
            $stock = $row['stock'];
        }
    }

    if ($cantidad > $stock) {
        echo "<script>alert('Error stock insuficiente')</script>";
        echo "<script>window.location.href='venta.php'</script>";
    } else {
        $nuevostock = $stock - $cantidad;

        $sql = "update productos set stock = '" . $nuevostock . "' where idProducto = '" . $idProducto . "';";
        if ($conn->query($sql)) {
            echo "<script>alert('Stock modificado')</script>";
        } else {
            echo "<script>alert('Error al modificar')</script>";
        }


        $total = $cantidad * $precio;
        $sql = "insert into ventas (idProducto, idVendedor, fecha, cantidad, total) values
            ('" . $idProducto . "', '" . $vendedor . "', '" . $date . "', '" . $cantidad . "', '" . $total . "');";
        if ($conn->query($sql)) {
            echo "<script>alert('Venta realizada')</script>";
        } else {
            echo "<script>alert('Error al vender')</script>";
        }
    }
}

?>